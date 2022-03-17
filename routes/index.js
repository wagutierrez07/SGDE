var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Login  | SGDE' });
});

router.get('/register', function(req, res, next) {
  res.render('auth/register', { title: 'Registro | SGDE' });
});

module.exports = router;
