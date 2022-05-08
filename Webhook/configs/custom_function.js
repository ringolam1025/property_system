const conn = require('./_conn');
const fs = require("fs");
const chartExporter = require("highcharts-export-server");
const moment = require('moment');

module.exports = {
    genChart: async (pty_id, chartDetails, session_id) => {
        console.log('called function: genChart',pty_id);
        var outputFile = ""; 
        chartExporter.initPool();
        const path = await chartExporter.export(chartDetails, (err, res) => {
            let imageb64 = res.data;
            outputFile = "C:/xampp/htdocs/myHome/public/assets/chatbot/"+session_id+'-'+pty_id+".png";
            fs.writeFileSync(outputFile, imageb64, "base64", function(err) {
                if (err) console.log(err);
            });
            console.log("Saved image!");
            chartExporter.killPool();            
        })

        fs.watchFile(outputFile, function (curr, prev) {
            //onChanged(curr, prev, path, timer, callback);
            console.log(prev);
        });

        return new Promise((resolve, reject) => {
            
            resolve("http://ringohome.asuscomm.com:8000/assets/chatbot/"+session_id+'-'+pty_id+".png");
        });
    },
    getDataFromMySQL: async (sql) => {
        $outputRes = [];
        return new Promise((resolve, reject) => {
            conn.query(sql, (err, rows, fields) => {
                if (err) reject(err);
                else resolve(JSON.parse(JSON.stringify(rows)));
            });
        });
    },
    sleep: async (ms=0) => {
        return new Promise(r => setTimeout(r, ms));
    },
    calStampDuty: async (sales_price) => {      
        var stamp_dutySQL = 'SELECT * FROM tbl_stamp_duty stamp WHERE stamp.to >=' + sales_price + ' AND stamp.from <= ' + sales_price;
        return new Promise((resolve, reject) => {
            module.exports.getDataFromMySQL(stamp_dutySQL).then((results) => {                
                results.map(function(item, index, array) {
                    var final_sd_amt = 0; 
                    if (item.exceed == 0 && item.basePrice) {
                        final_sd_amt = sales_price*(item.rate/100);
                    }else{
                        final_sd_amt = (item.basePrice+((sales_price-item.exceed)*(item.rate/100)));
                    }
                    resolve(final_sd_amt);
                });
            });
        });        
    },
    getTotalSpend: async (propertyID, loanYear, loadRatio) => {  
        var bankList = new Array();
        var spendList = new Array();
        var firstInstallList = new Array();
        var cashBackList = new Array();
        var totalInerestList = new Array();
        var totalMorgtateList = new Array();
        var monthlyPepaymentList = new Array();

        const OptloanRatio = loadRatio;

        loadRatio = loadRatio.replace("%", "")/100
        const getRateSQL = 'SELECT bank_eName, rate, cash_back FROM tbl_bank_rate';
        const bankRate = await module.exports.getDataFromMySQL(getRateSQL);
        const sql = "SELECT CONCAT('Room ',pty.room, ', ', pty.property_eName, ', Block', pty.block, ', ', p.phase_eName, ', ', e.estate_eName) as pty_displayName, pty.property_id as property_id, pty.* FROM tbl_property pty INNER JOIN tbl_phase p ON p.phase_id = pty.phase_id INNER JOIN tbl_estate e ON e.estate_id = p.estate_id INNER JOIN tbl_sub_district sd ON sd.sub_district_id = e.sub_district_id WHERE property_id LIKE '%"+propertyID+"%'";
        var property = await module.exports.getDataFromMySQL(sql);
        property = property[0];
        const property_price = property.sales_price;
        
        spendList['agentCommission'] = property_price*0.01; // 1% 經紀佣金
        spendList['property_name'] = property.pty_displayName;
        spendList['property_id'] = property.property_id; 
        spendList['property_price'] = property_price;
        spendList['loanRatio'] = OptloanRatio;

        for (var r=0; r<bankRate.length; r++){
            const mortgageInsurance = 0; // 保險費
            const loanDuration = await module.exports.getLoanDuration(loanYear);            
            const monthlyInerest = (bankRate[r].rate/100)/12;

            var firstInstallment = 0;
            var cashBockAmt = 0;
            var inerestAmt = 0;
            var morgageAmt = 0;
            var monthlyPepayment = 0;

            morgageAmt = property_price*loadRatio; // 貸款金額
            cashBockAmt = morgageAmt*(bankRate[r].cash_back/100);

            if (bankRate[r].cash_back > 1){
                morgageAmt = morgageAmt - (morgageAmt*(bankRate[r].cash_back/100));
                // 首期
                firstInstallment = Math.round(property_price*(1-loadRatio))+cashBockAmt;
                // 每月供款
                monthlyPepayment = Math.round((morgageAmt*monthlyInerest*Math.pow((1+monthlyInerest),loanDuration))/(Math.pow((1+monthlyInerest), loanDuration)-1)*100)/100;

            }else{
                // 首期
                firstInstallment = Math.round(property_price*(1-loadRatio));
                // 每月供款
                monthlyPepayment = Math.round((morgageAmt*monthlyInerest*Math.pow((1+monthlyInerest),loanDuration))/(Math.pow((1+monthlyInerest), loanDuration)-1)*100)/100; 
                
            }
            // 總利息 
            inerestAmt = (monthlyPepayment*loanDuration)-morgageAmt;            

            bankList.push(bankRate[r].bank_eName+"<br>$"+Math.round(monthlyPepayment)+"/mon");
            firstInstallList.push(Math.round(firstInstallment));
            cashBackList.push(Math.round(cashBockAmt));
            totalInerestList.push(Math.round(inerestAmt));
            totalMorgtateList.push(Math.round(morgageAmt));
            monthlyPepaymentList.push(Math.round(monthlyPepayment));
        }

        return new Promise((resolve, reject) => {
            spendList['bankList'] = bankList;
            spendList['firstInstallList'] = firstInstallList;
            spendList['cashBackList'] = cashBackList;
            spendList['totalInerestList'] = totalInerestList;
            spendList['totalMorgtateList'] = totalMorgtateList;
            //spendList['monthlyPepaymentList'] = monthlyPepaymentList;
            
            resolve(spendList);
        });
    },
    getPossibleResponse: async (arr) => {
        return new Promise((resolve, reject) => {
            var pick = Math.floor(Math.random() * arr.length);
            resolve(arr[pick]);
        });
    },
    getLoanDuration: async (loanYear) => {
        return new Promise((resolve, reject) => {
            var loanDuration = 0;
            if (loanYear.unit+'' == 'decade'){
                loanDuration = (loanYear.amount*10)*12;
            }else if (loanYear.unit+'' == 'yr'){
                loanDuration = (loanYear.amount)*12;
            }else if (loanYear.unit+'' == 'mo'){
                loanDuration = loanYear.amount;
            }
            resolve(loanDuration);
        });
    },
    getCompanySetting: async () => {
        const sql = "SELECT * FROM tbl_company_setting";
        const companySetting = await module.exports.getDataFromMySQL(sql);

        return new Promise((resolve, reject) => {            
            resolve(companySetting[0]);
        });
    },
    formatNumber: (num) => {        
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },
  };