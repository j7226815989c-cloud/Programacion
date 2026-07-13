const pool = require('./db');

pool.query('SELECT NOW()')
  .then(res => {
    console.log(res.rows);
    process.exit();
  })
  .catch(err => {
    console.error(err);
    process.exit();
  });