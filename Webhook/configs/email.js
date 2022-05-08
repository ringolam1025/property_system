const nodemailer = require('nodemailer');
const fs = require('fs');
const moment = require('moment');

const mailTransport = nodemailer.createTransport({
    service: 'Gmail',
    auth: {
        user: 'hkmyhome20@gmail.com',
        pass: 'rR@0051087',
    },
});

const from = '"MyHome HK" <hkmyhome20@gmail.com>';
const errorRecipient = 'hkmyhome20@gmail.com';

module.exports = {
    send: function(to, subj, body) {
      mailTransport.sendMail(
        {
          from: from,
          to: to,
          subject: subj,
          html: body,
        },
        function(err) {
          if (err) {
            console.log('Unable to send email: ' + err);
          }
        },
      );
    },
    emailError: function(message, filename, exception) {
      var body =
        '<h1>Meadowlark Travel Site Error</h1>' + 'message:<br><pre>' + message + '</pre><br>';
      if (exception) body += 'exception:<br><pre>' + exception + '</pre><br>';
      if (filename) body += 'filename:<br><pre>' + filename + '</pre><br>';
      mailTransport.sendMail(
        {
          from: from,
          to: errorRecipient,
          subject: 'Meadowlark Travel Site Error',
          html: body,
          generateTextFromHtml: true,
        },
        function(err) {
          if (err) {
            console.log('Unable to send email: ' + err);
          }
        },
      );
    },
    sendAppointmentConfirmation: (to, appointmentInfo, intentData) => {
        const subject = "MyHome Appointment Confirmation";
        var body = fs.readFileSync("./_template/appointment.html","utf-8");
        body = body.replace("{APT_PROPERTY_NAME}", appointmentInfo.pty_displayName);
        body = body.replace("{APT_DATE}", moment(intentData.appointment_date).format('YYYY-MM-DD'));
        body = body.replace("{APT_TIME}", moment(intentData.appointment_time).format('h:mm a'));
        body = body.replace("{APT_AGENT_NAME}", appointmentInfo.agent_eName_firstName+" "+appointmentInfo.agent_eName_lastName);
        body = body.replace("{APT_AGENT_TITLE}", appointmentInfo.agent_title);
        body = body.replace("{APT_AGENT_PHONE}", appointmentInfo.agent_phone + "(" + appointmentInfo.agent_mobile + ")");
        body = body.replace("{APT_AGENT_EMAIL}", appointmentInfo.agent_email);
        module.exports.send(to, subject, body);
    },
    sendAppointmentNotification: (to, appointmentInfo, intentData, bookingID) => {
      const subject = "New Booking";
      var body = fs.readFileSync("./_template/notification.html","utf-8");
      body = body.replace("{APT_PROPERTY_NAME}", appointmentInfo.pty_displayName);
      body = body.replace("{APT_DATE}", moment(intentData.appointment_date).format('YYYY-MM-DD'));
      body = body.replace("{MYHOME_PATH}", bookingID);

      //{}
     
      module.exports.send(to, subject, body);
  },

};