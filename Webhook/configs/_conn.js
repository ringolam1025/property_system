var mysql = require('mysql');
var db_config = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'myHome'
  };
var conn = mysql.createConnection(db_config);    
conn.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});

conn.on('error', function(err) {
    console.log(err.code);
    // if(err.code === 'PROTOCOL_CONNECTION_LOST') {
    //     conn.connect(function(err) {
    //         if (err) throw err;
    //         console.log("Re-Connected!");
    //     });
    // }
});

module.exports = conn;