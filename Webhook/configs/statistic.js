const conn = require('./_conn');
const moment = require('moment');
const custFunction = require('./custom_function');

module.exports = {
  setNewSearching: async (search_category, search_val) => {  
    const session_id = '';
    const date = moment().format('YYYY-MM-DD h:mm:ss');
    const platform = 'chatbot';
    const sql = "INSERT INTO `tbl_search_history`(`session_id`, `search_date`, `search_category`, `search_val`, `platform`, `created_at`) VALUES ('"+session_id+"','"+date+"','"+search_category+"','"+search_val+"','"+platform+"','"+date+"')";
        
    return new Promise((resolve, reject) => {
      
      conn.query(sql, (err, res, fields) => {        
        if (err) reject(err);        
        else resolve(res.insertId);
      });  
    });
  }
};