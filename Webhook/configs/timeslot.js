const conn = require('./_conn');
const moment = require('moment');
const custFunction = require('./custom_function');

module.exports = {
  parseIn: (date_time) => {
    var d = new Date();
    d.setHours(date_time.substring(11,13));
    d.setMinutes(date_time.substring(14,16));      
    return d;
  },
  //make list
  getTimeIntervals: (time1, time2, intervalMin) => {
    var arr = [];
    time1 = module.exports.parseIn(time1+" 09:00:00");
    time2 = module.exports.parseIn(time2+" 21:00:00");

    while(time1 <= time2){
      arr.push(time1.toTimeString().substring(0,5));
      time1.setMinutes(time1.getMinutes() + intervalMin);
    }
    return arr;
  },
  checkTimeslotAvailable: async (appointment_date, appointment_time, agent_id) => {
    var flag = false;
    const agentBookingSQL = "SELECT * FROM tbl_booking WHERE agent_id = '"+agent_id+"' AND booked_date = '"+appointment_date+"' AND '" +appointment_time+"' >= booked_start_time AND '"+appointment_time+"' <= booked_end_time";
    var agentBooking = await custFunction.getDataFromMySQL(agentBookingSQL);
    if (agentBooking.length > 0){
      flag = true;
    }
    return flag;
  },
  makeBooking: async (ApptIntentData, appointmentInfo) => {
    const comSet = await custFunction.getCompanySetting();
    console.log(ApptIntentData);

    const property_id = ApptIntentData.propertyID;
    const agent_id = appointmentInfo.agent_id;
    const booked_date = moment(ApptIntentData.appointment_date).format('YYYY-MM-DD');
    const booked_start_time = moment(ApptIntentData.appointment_time).format('H:mm:ss');
    const booked_end_time = moment(ApptIntentData.appointment_time).add(comSet.booking_session,'minutes').format('H:mm:ss');
    const cust_name = ApptIntentData.username;
    const cust_email = ApptIntentData.email;
    const cust_phone = ApptIntentData.phone;
    const created_at = moment().format('YYYY-MM-DD h:mm:ss');
    const booking_id = await module.exports.genBookingID();

    const sql = "INSERT INTO `tbl_booking`(`booking_id`, `property_id`, `agent_id`, `booked_date`, `booked_start_time`, `booked_end_time`, `cust_name`, `cust_email`, `cust_phone`, `created_at`) VALUES ('"+booking_id+"','"+property_id+"','"+agent_id+"','"+booked_date+"','"+booked_start_time+"','"+booked_end_time+"', '"+cust_name+"', '"+cust_email+"', '"+cust_phone+"', '"+created_at+"')";
    return new Promise((resolve, reject) => {       
      conn.query(sql, (err, res, fields) => {        
        if (err) reject(err);        
        else resolve(res.insertId);
      });    
      
  });
  },
  genBookingID: async () => {
    var newBooking_id = "";
    var maxBookingID = await custFunction.getDataFromMySQL("SELECT MAX(booking_id) as booking_id FROM `tbl_booking`");
    const len = 5;
    maxBookingID = maxBookingID[0].booking_id;
    newBooking_id = maxBookingID.replace(/[a-zA-Z]/g, "");
    newBooking_id = newBooking_id.substring(2, newBooking_id.length);

    while(newBooking_id.charAt(0) === '0') newBooking_id = newBooking_id.substr(1);
    if (newBooking_id.length < len){
      var counter = len - newBooking_id.length;
      newBooking_id = parseInt(newBooking_id)+1;
			for (let k=0; k<counter; k++) newBooking_id = "0"+newBooking_id;
    }    
    return new Promise((resolve, reject) => {
      resolve("BK"+moment().format('YY')+newBooking_id);
    });
  }
};