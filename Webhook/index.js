'use strict';
//const conn = require('./configs/_conn');
const custFunction = require('./configs/custom_function');
const emailService = require('./configs/email');
const timeslot = require('./configs/timeslot');
const statistic = require('./configs/statistic');

const {WebhookClient, Card, Suggestion, Payload} = require('dialogflow-fulfillment');
const express = require('express');
const bodyParser = require('body-parser');
const { format } = require('date-fns');
const moment = require('moment');

const expressApp = express();
expressApp.use(bodyParser.json());
expressApp.use(bodyParser.urlencoded({extended: true}));

process.env.DEBUG = 'dialogflow:debug';

async function confirmAppointment(agent){
  var FBPayload = [];
  try {
    const ApptIntentData = agent.getContext('appointment').parameters;
    const cust_email = agent.parameters.email; 
    const cust_phone = agent.parameters.phone;

    const sql = "SELECT CONCAT('Room ',pty.room, ', ', pty.property_eName, ', Block ',pty.block, ', ', p.phase_eName, ', ', e.estate_eName) as pty_displayName, pty.property_id as property_id, a.agent_id, a.agent_title, a.agent_eName_firstName, a.agent_eName_lastName, a.agent_mobile, a.agent_phone, a.agent_email, a.agent_year_of_service FROM tbl_property pty INNER JOIN tbl_phase p ON p.phase_id = pty.phase_id INNER JOIN tbl_estate e ON e.estate_id = p.estate_id INNER JOIN tbl_sub_district sd ON sd.sub_district_id = e.sub_district_id INNER JOIN tbl_agent a ON a.agent_id = pty.agent_id WHERE pty.property_id = '"+ApptIntentData.propertyID+"'";
    var appointmentInfo = await custFunction.getDataFromMySQL(sql);
    appointmentInfo = appointmentInfo[0];

    const appointment_time = agent.parameters.appointment_time;
    const appointment_date = agent.parameters.appointment_date;

    var insertId = await timeslot.makeBooking(ApptIntentData, appointmentInfo);
    const bookingID = await custFunction.getDataFromMySQL("SELECT * FROM tbl_booking WHERE pkey = '"+insertId+"'");

    emailService.sendAppointmentConfirmation(cust_email, appointmentInfo, ApptIntentData, bookingID[0].booking_id);
    emailService.sendAppointmentNotification(appointmentInfo.agent_email, appointmentInfo, ApptIntentData, bookingID);

    FBPayload.push({text: "Thanks for your information, the confirmation email has sent to your email."});
    FBPayload.push({text: "You still can browse other properties. "});
    // FBPayload.push({
    //   text: "Are you interested to become our member?",
    //   quick_replies:[{content_type: 'text', title: 'Yes', payload: 'Yes'},
    //                 {content_type: 'text', title: 'No, thanks', payload: 'No'}]
    // });
    const context = {'name': 'userContact', 'lifespan': 2, 'parameters': {'appointment_date': appointment_date, 'appointment_time': appointment_time}};
    agent.setContext(context);
    agent.add(new Payload(agent.FACEBOOK, FBPayload));

  } catch (error) {
    FBPayload.push({text: "Sorry. Something wrong please try again."});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));
    console.log(error);
  }
}

async function selectAppointmentDate(agent){
  var FBPayload = [];
  var propertyID = "";
  var intentData = "";
  var appointment_date = "";
  var appointment_time = "";

  try {
    if (agent.getContext('propertydetails')){
      // console.log(agent.getContext('propertydetails').parameters);
      intentData = agent.getContext('propertydetails').parameters;
      propertyID = intentData.property_id;

    }else{
      // console.log(agent.parameters);
      propertyID = agent.parameters.property_id;      
    }

    appointment_time = moment(agent.parameters.appointment_time).format("h:mm a")
    appointment_date = moment(agent.parameters.appointment_date).calendar(null,{
      sameDay: '[Today]',
      nextDay: '[Tomorrow]',
      nextWeek: 'dddd',
      lastDay: '[Yesterday]',
      lastWeek: '[Last] dddd',
      sameElse: 'DD/MM/YYYY'
    });
    FBPayload.push({
      text: "Are you confirm the booking on "+appointment_date+" at "+appointment_time+"?",
      quick_replies:[{content_type: 'text', title: 'Yes', payload: 'Yes'},
                    {content_type: 'text', title: 'No', payload: 'No'}]
    });
    const context = {'name': 'appointment', 'lifespan': 2, 'parameters': {'propertyID': propertyID, 'appointment_date': agent.parameters.appointment_date, 'appointment_time': agent.parameters.appointment_time}};
    agent.setContext(context);
    agent.add(new Payload(agent.FACEBOOK, FBPayload));

  } catch (error) {
    console.log(error);    
    FBPayload.push({text: "Sorry. Something wrong please try again."});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));
  }
}

async function makeAppointment(agent){
  var FBPayload = [];
  var propertyID = "";
  var intentData = "";
  var timeslotOpt = [];
  try {        
    if (agent.getContext('propertydetails')){
      //console.log(agent.getContext('propertydetails').parameters);
      intentData = agent.getContext('propertydetails').parameters;
      propertyID = intentData.property_id;

    }else{
      //console.log(agent.parameters);
      propertyID = agent.parameters.property_id;
    }

    const sql = "SELECT CONCAT('Room ',pty.room, ', ', pty.property_eName, ', Block ',pty.block, ', ', p.phase_eName, ', ', e.estate_eName) as pty_displayName, pty.property_id as property_id, a.agent_id, a.agent_title, a.agent_eName_firstName, a.agent_eName_lastName, a.agent_mobile, a.agent_phone, a.agent_email, a.agent_year_of_service FROM tbl_property pty INNER JOIN tbl_phase p ON p.phase_id = pty.phase_id INNER JOIN tbl_estate e ON e.estate_id = p.estate_id INNER JOIN tbl_sub_district sd ON sd.sub_district_id = e.sub_district_id INNER JOIN tbl_agent a ON a.agent_id = pty.agent_id WHERE pty.property_id = '"+propertyID+"'";
    var propertyInfo = await custFunction.getDataFromMySQL(sql);
    propertyInfo = propertyInfo[0];
    console.log(sql);

    FBPayload.push({text: "This agent can at your service"});
    FBPayload.push({
      attachment:{
        type:"template",
        payload:{
          template_type:"generic",
          elements:[
            {
              title: propertyInfo.agent_eName_firstName + " " + propertyInfo.agent_eName_lastName,
              image_url:"http://ringohome.asuscomm.com:8000/assets/agent/agent1.png",
              subtitle: propertyInfo.agent_title + " (Serviced for "+propertyInfo.agent_year_of_service+" Yr)",
              // default_action: {
              //   type: "web_url",
              //   url: "https://petersfancybrownhats.com/view?item=103",
              //   webview_height_ratio: "tall",
              // },
              buttons:[                
                {
                  type: 'phone_number',
                  payload: propertyInfo.agent_mobile,
                  title: `Call agent (Mobile)`,
                },
                {
                  type: 'phone_number',
                  payload: propertyInfo.agent_phone,
                  title: `Call agent (Office)`,
                }
              ]              
            }
          ]
        }
      }
    });
    var companySetting = await custFunction.getDataFromMySQL("SELECT * FROM tbl_company_setting");
    companySetting = companySetting[0];

    for (let a=1; a<=3; a++){
      const day = moment().add(a, 'day').format('YYYY-MM-DD');
      const displayDay = moment().add(a, 'day').calendar(null,{
        sameDay: '[Today]',
        nextDay: '[Tomorrow]',
        nextWeek: 'dddd',
        lastDay: '[Yesterday]',
        lastWeek: '[Last] dddd',
        sameElse: 'DD/MM/YYYY'
      });
      var intervals = timeslot.getTimeIntervals(day, day, companySetting.booking_session);
      for (let t=0; t<intervals.length; t++){
        let flag = await timeslot.checkTimeslotAvailable(day, intervals[t],propertyInfo.agent_id);
        if (!flag && timeslotOpt.length<10){
          timeslotOpt.push({content_type:"text", title:displayDay+" at "+intervals[t], payload:day+" "+intervals[t]});
        }        
      }
    }
    FBPayload.push({text: "Available timeslot for this agent", quick_replies:timeslotOpt});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));

  } catch (error) {
    console.log(error);
    
    FBPayload.push({text: "Sorry. Something wrong please try again."});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));
  }
}

async function CalStampDuty(agent){  
  console.log(agent.getContext('propertydetails').parameters);
  var FBPayload = [];

  try {
    const intentData = agent.getContext('propertydetails').parameters;
    const propertyID = intentData.property_id;
    const needBSD = intentData.needBSD;
    const buyerType = intentData.buyerType;
    const SSDType = intentData.SSDType;
  
    var BSDAmt = 0;
    var SSDAmt = 0;
    var firstTimeAmt = 0;
    var totalStampDuty = 0;

    var scale = 0;
    if (buyerType+'' == 'Commercial'){
      scale = 1;
    }else if (buyerType+'' == 'Residential'){
      scale = 2;
    }

    const sql = "SELECT CONCAT('Room ',pty.room, ', ', pty.property_eName, ', Block ',pty.block, ', ', p.phase_eName, ', ', e.estate_eName) as pty_displayName, pty.property_id as property_id,   pty.sales_price, stamp.from, stamp.to, stamp.rate, stamp.exceed, stamp.basePrice, stamp.rate_type FROM tbl_property pty INNER JOIN tbl_phase p ON p.phase_id = pty.phase_id INNER JOIN tbl_estate e ON e.estate_id = p.estate_id INNER JOIN tbl_sub_district sd ON sd.sub_district_id = e.sub_district_id LEFT JOIN tbl_stamp_duty stamp ON stamp.from < pty.sales_price AND stamp.to > pty.sales_price WHERE stamp.scale = '"+scale+"' AND pty.property_id = '"+propertyID+"'";
    console.log(sql); 
    var propertyInfo = await custFunction.getDataFromMySQL(sql);
    propertyInfo = propertyInfo[0];
    console.log(propertyInfo);
    

    if (needBSD) BSDAmt = propertyInfo.sales_price*(15/100);
    switch (SSDType) {
      case 1:
        // 20%
        SSDAmt = propertyInfo.sales_prices*(20/100);
        break;
      case 2:
        // 15%
        SSDAmt = propertyInfo.sales_prices*(15/100);
        break;
      case 3:
      case 4:
        // 10%
        SSDAmt = propertyInfo.sales_prices*(10/100);
        break;
      case 5:
      case 6:
        // 00%
        SSDAmt = 0;
        break;
    }
    
    if (propertyInfo.exceed>0){
      firstTimeAmt = propertyInfo.basePrice+(propertyInfo.sales_price*(propertyInfo.rate/100));
    }else{
      if (propertyInfo.rate_type+'' == 'amount'){
        firstTimeAmt = propertyInfo.basePrice;
      }else{
        firstTimeAmt = propertyInfo.sales_price*(propertyInfo.rate/100);
      }
    }
    totalStampDuty = BSDAmt + SSDAmt + firstTimeAmt;
    
    FBPayload.push({text: "The Stamp Duty details of "+propertyInfo.pty_displayName+" as below:"});
    FBPayload.push({text: "The base Stamp Duty is $"+custFunction.formatNumber(firstTimeAmt)});
    if (BSDAmt>0){
      FBPayload.push({text: "The Buyer's Stamp Duty (BSD) is $"+custFunction.formatNumber(BSDAmt)});
    }
    if (SSDAmt>0){
      FBPayload.push({text: "The Special Stamp Duty (SSD) is $"+custFunction.formatNumber(SSDAmt)});
    }
    FBPayload.push({text: "The total is $"+custFunction.formatNumber(totalStampDuty)});

    FBPayload.push({
      text: "Next step",
      quick_replies:[{content_type:"text",title:"Make appointment",payload:"ask make appointment"}]
    });
    // agent.setContext({'name':'propertyDetails','lifespan': 10, 'parameters':{'property_id':propertyID}});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));
  } catch (error) {
    console.log(error);
    FBPayload.push({text: "Sorry. Something wrong please try again."});
    agent.add(new Payload(agent.FACEBOOK, FBPayload));
  }
  
}

function recommendProperty (agent){
  console.log(agent.parameters);
  var location = agent.parameters.location;
  var tranType = agent.parameters.tranType;
  var budget_from = agent.parameters.budget_from;
  var budget_to = agent.parameters.budget_to;
  var propertyRequirement = agent.parameters.propertyRequirement;
  var sizeType = agent.parameters.sizeType;
  var propertySize_from = agent.parameters.propertySize_from;
  var propertySize_to = agent.parameters.propertySize_to;
  var operatorCondition = agent.parameters.operatorCondition;

  var username = (agent.getContext('username'))?' '+agent.getContext('username').parameters.username:'';  

  var possibleResponse = [
    `${username}we think you may like`,
    `${username}we have find some property for you`,
    `Thanks for your waiting${username}, suggested property`
  ];
  var NoResultResponse = [
    `Sorry${username}, we have no property is meet your requirement.`,
  ]; 

  var sql = "";
  var addition = "";
  var selectSQL = "CONCAT('Room ',pty.room, ', ', pty.property_eName, ', Block ',pty.block, ', ', p.phase_eName, ', ', e.estate_eName) as pty_displayName, pty.property_id as property_id, actual_size, building_size";

  if (location+'' != ''){
    addition += "sd.subDistrict_eName LIKE '%"+location+"%'";
  }

  if (tranType+'' != ''){
    var budget_from = ((budget_from+'' != '')?budget_from:0);
    var budget_to = ((budget_to+'' != '')?budget_to:0);
    var operator = ((operatorCondition+'' != '' && operatorCondition+'' == 'below')?'<':((operatorCondition+'' != '' && operatorCondition+'' == 'more')?'>':''));
    var priceFieldName = ((tranType+'' != '' && tranType+'' == 'Sales')?'pty.sales_price':'pty.rent_price');
    
    if (operator+'' != '' && (budget_from != 0 || budget_to != 0)){
      addition += ((addition+'' != '')?' AND ':'') + "(" + priceFieldName+operator+budget_from+" AND "+priceFieldName+"!=0)"; // Handle less than, more than
    }else if (budget_from != 0 && budget_to != 0){
      addition += ((addition+'' != '')?' AND ':'') + "(" + priceFieldName+">="+budget_from+" AND "+priceFieldName+"<="+budget_to+")"; // Handle a range price
    }
    addition += ((addition+'' != '')?' AND ':'') + priceFieldName+"!=0"; // Handle the inqiry price should not be 0
    selectSQL += ((selectSQL+'' != '')?', ':'') + ((tranType+'' == 'Sales')?priceFieldName:'CONCAT('+"ROUND("+priceFieldName+",0)"+',"/Month")') + " as price";
    
    if (tranType+'' == 'Sales'){
      selectSQL += ((selectSQL+'' != '')?', ':'') + "(SELECT mr.morgtgage_id FROM tbl_mortgage_rate mr WHERE pty.sales_price >= mr.mortgage_from AND pty.sales_price <= mr.mortgage_to)";      
    }
    statistic.setNewSearching('tranType', tranType);

    selectSQL += ((selectSQL+'' != '')?', ':'') + "ROUND(" + priceFieldName + "/actual_size, 2) as actual_size_amt";
    selectSQL += ((selectSQL+'' != '')?', ':'') + "ROUND(" + priceFieldName + "/building_size, 2) as building_size_amt";
  }
  
  if (sizeType+'' != ''){
    var propertySize_from = ((propertySize_from+'' != '')?propertySize_from:0);
    var propertySize_to = ((propertySize_to+'' != '')?propertySize_to:0);
    var operator = ((operatorCondition+'' != '' && operatorCondition+'' == 'below')?'<':((operatorCondition+'' != '' && operatorCondition+'' == 'more')?'>':''));
    var fieldName = ((sizeType+'' != '' && sizeType+'' == 'actual_size')?'pty.actual_size':'pty.building_size');

    if (operator+'' != '' && (propertySize_from != 0 || propertySize_to != 0)){
      addition += ((addition+'' != '')?' AND ':'') + "(" + fieldName+operator+propertySize_from+" AND "+fieldName+"!=0)";
    }else if (propertySize_from != 0 && propertySize_to != 0){
      addition += ((addition+'' != '')?' AND ':'') + "(" + fieldName+">="+propertySize_from+" AND "+fieldName+"<="+propertySize_to+")";
    }
    statistic.setNewSearching('sizeType', sizeType);
  }

  if (propertyRequirement+'' != ''){
    addition += ((addition+'' != '')?' AND ':'') + "sd.subDistrict_eName LIKE '%"+location+"%'";
  }
  
  sql = "SELECT "+selectSQL+" FROM tbl_property pty INNER JOIN tbl_phase p ON p.phase_id = pty.phase_id INNER JOIN tbl_estate e ON e.estate_id = p.estate_id INNER JOIN tbl_sub_district sd ON sd.sub_district_id = e.sub_district_id WHERE "+addition+" GROUP BY pty.room, pty.property_eName,pty.block, p.phase_eName, e.estate_eName, pty.property_id ORDER BY pty.created_at DESC, RAND() LIMIT 0,5";
  // console.log(sql);
 
  return custFunction.getDataFromMySQL(sql).then((results) => {
    //console.log(results);
    var DBResult = new Array();
    var pick = 0;
    var facebookPayload = new Array();
    if (results.length>0) {      
      pick = Math.floor( Math.random() * possibleResponse.length );      
      results.map(function(item, index, array) {
        const tmp = {
          title: item.pty_displayName,
          image_url: `http://ringohome.asuscomm.com:8000/assets/property/${item.property_id}/p1.jpg`,
          subtitle: location + 
                    "\n$" + custFunction.formatNumber(item.price) + 
                    "\nSaleable:" + item.actual_size + " ($" + custFunction.formatNumber(item.actual_size_amt) + "/sq.ft)" +
                    "\nGross:" + item.building_size + " ($" + custFunction.formatNumber(item.building_size_amt) + "/sq.ft)",
          default_action: {
            type: 'web_url',
            url: `http://ringohome.asuscomm.com:8000/property/${item.property_id}`,
            webview_height_ratio: "tall",
          },
          buttons: [
            {
              type: 'postback',
              payload: `ask mortgage ${item.property_id}`,
              title: `Mortgage`,
            },
            {
              type: 'postback',
              payload: `ask stamp duty ${item.property_id}`,
              title: `Stamp Duty`,
            },            
            {
              type: 'postback',
              payload: `ask make appointment ${item.property_id}`,
              title: `Make appointment`,
            },
          ],        
        };
        DBResult.push(tmp);
      });
      facebookPayload = [
        {
          text: possibleResponse[pick]
        },
        {
          attachment: {
            type: 'template',
            payload: {
              template_type: 'generic',
              elements: DBResult,
            },        
          },
        }
      ];
    }else{
      pick = Math.floor( Math.random() * NoResultResponse.length );
      facebookPayload = [
        {
          text: NoResultResponse[pick]
        }
      ];
    }
    agent.add(new Payload(agent.FACEBOOK, facebookPayload));
  })
}

async function PropertyMortgage (agent){
  var username = (agent.getContext('username'))?agent.getContext('username').parameters.username:'Guest';
  var property_id = agent.parameters.property_id;
  var loanYear = agent.parameters.duration;
  var loadRatio = agent.parameters.loanratio;  
  const response = await custFunction.getPossibleResponse([
    `${username}, the mortgage details as below`,
    `Please reference the image for the details, ${username}`
  ]); 
  var mortgageDetails = await custFunction.getTotalSpend(property_id, loanYear, loadRatio);
  const chartDetails = {
    type: "png",
    options: {
      chart: {type: 'bar'},
      // colors: ['#058DC7','#ED561B', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'], 
      colors: ['#058DC7','#ED561B', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'], 
      title: {text: mortgageDetails.property_name},
      subtitle: {text: "Breakdown of different bank Mortgage Plan"},
      xAxis: {categories: mortgageDetails.bankList,crosshair: true},
      yAxis: {
          min: 0,
          title: {text: 'Total spend ($)'},
      },
      legend: {
          align: 'right',
          x: 0, y: 0,
          verticalAlign: 'bottom',              
          floating: false,
          backgroundColor: 'white',
          borderColor: '#CCC',
          borderWidth: 1,
          shadow: false
      },
      credit:{enabled: false},
      tooltip: {
          headerFormat: '<b>{point.x:,,.1f}</b><br/>',
          pointFormat: '{series.name}: "{point.y:,,.1f}"<br/>Total: {point.stackTotal:,,.1f}'
      },
      plotOptions: {
        bar: {
          dataLabels: {
              enabled: true
          }
        }
      },
      series: [            
        {
          name: 'Monthly Payment',
          data: mortgageDetails.monthlyPepaymentList
        },
        {
          name: 'First installment',
          data: mortgageDetails.firstInstallList
        },
        {
          name: 'Total Morgtate',
          data: mortgageDetails.totalMorgtateList
        },
        {
          name: 'Total interest',
          data: mortgageDetails.totalInerestList
        }
      ]
  }
  };
  const pngPath = await custFunction.genChart(mortgageDetails.property_id, chartDetails, agent.session.split("/")[4]);
  var FBPayload = [];
  FBPayload.push({text: response});
  FBPayload.push({text: "The price is $"+mortgageDetails.property_price+" , and the loan raito is "+mortgageDetails.loanRatio});
  if ((loadRatio.replace("%", ""))>60){
    FBPayload.push({text: "Because of your loan ratio is higher than 60%, you also need to purchase Mortgage Insurance"});
  }  
  //FBPayload.push({attachment: {type: "image",payload: {url: pngPath}}});
  FBPayload.push({text: pngPath});
  FBPayload.push({
    text: "Next step",
    quick_replies:[{content_type:"text",title:"Stamp Duty",payload:"ask stamp duty"},
                  {content_type:"text",title:"Make appointment",payload:"ask make appointment"}]
  });
  agent.setContext({'name':'propertyDetails','lifespan': 10, 'parameters':{'property_id':mortgageDetails.property_id}});
  agent.add(new Payload(agent.FACEBOOK, FBPayload));
}

async function TestSendEmail (agent){
  console.log("Email");

  try {
    //emailService.sendAppointmentConfirmation('ringoching93@gmail.com');  
    //timeslot.makeBooking();
    // const comSet = await custFunction.getCompanySetting();
    // console.log(comSet);
    const booking_id = await timeslot.genBookingID();
    console.log(booking_id);
    
  } catch (error) {
    console.log(error);
  }
}




// ============================================================
function WebhookProcessing(req, res) {
    const agent = new WebhookClient({request: req, response: res});
    //console.log(agent);
    let intentMap = new Map();
    intentMap.set('SearchProperty', recommendProperty);
    intentMap.set('PropertyMortgage', PropertyMortgage);
    intentMap.set('StampDutyIsFirsttime', CalStampDuty);
    intentMap.set('MakeAppointment', makeAppointment);
    intentMap.set('MakeAppointmentInputDate', selectAppointmentDate);

    intentMap.set('MakeAppointmentInputDateYes', confirmAppointment);

    intentMap.set('TestSendEmail', TestSendEmail);

    agent.handleRequest(intentMap);
}

expressApp.post('/', function (req, res) {
    WebhookProcessing(req, res);
});

const PORT = 8888;
expressApp.listen(PORT, function () {  
  console.info(`listening on port ${PORT}!`)
});