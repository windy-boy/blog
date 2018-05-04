var express = require('express');
var router = express.Router();
const crypto=require('crypto');

const db=require('../util/db.js');

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

router.get('/login',(req,res)=>{
  res.render('page/login.ejs',{title:"登陆",active:'login'})
})

router.get('/register',(req,res)=>{
    res.render('page/register.ejs',{title:"注册",active:'register'})
})


// 注册功能
router.post('/doregister',(req,res)=>{
    let userName = req.body.userName;
    let psw = req.body.psw;
    //  1:注册成功   -1:注册失败  -2:用户名重名
    db.findDoc('user',{userName},(err,userArr)=>{
        if(err){
            console.log(err);
            res.json({type:-1,msg:err});
            return
        }
        if(userArr&&userArr.length>0){
            res.json({type:-2,msg:'用户名已经重名,另起一个新的名字'});
        }else {
            var md5=crypto.createHash('md5');
            var recrectPsw=md5.update(psw).digest('hex');
            db.insertDoc('user',[{userName,psw:recrectPsw}],(err,r)=>{
                if(err){
                    console.log(err);
                    res.json({type:-1,msg:err});
                    return
                }
                res.json({type:1,msg:'注册成功'});
            })
        }
    })
})


module.exports = router;
