//  dao层
const mongoClient = require('mongodb').MongoClient;


const config = require('../config.js');

//  connect DB
function __connectDb(callback) {
    mongoClient.connect(config.dbUrl, (err, client) => {
        if (err) {
            callback('数据库连接失败', null, null);
            console.log(err);
            return
        }
        let db = client.db(config.dbName);
        callback(null, db, client);
    })
}

//  insert database methods
// 自己封装 增加的方法
exports.insertDoc = function (collectionName, dataArr, callback) {
    __connectDb((err, db, client) => {
        if (err) {
            callback(err, null);
            console.log(err);
            return
        }
        // set collection
        let collection = db.collection(collectionName);
        //    arguments ==>  arr
        // dataArr ==>  [{},{},{}]
        collection.insertMany(dataArr, (err, r) => {
            if (err) {
                callback('数据插入失败', null)
                console.log(err);
                return
            }
            callback(null, r)
            client.close();
        })
    });
};

// es6 剩余参数
//  普通查询(3个参数)   分页查询(四个参数)
exports.findDoc = function (collectionName, query, C, D) {
    //  通过参数数量控制是做分页查询的还是普通的查询
    if (arguments.length == 3) {
        var callback = C;
        var skipNumber = 0;
        var limitNumber = 0;
        // D ==> null
    } else if (arguments.length == 4) {
        // 分页查询   {  page:0,pageNumber:10  }  ==> 一页十条数据
        //   {skipNumber:page*pageNumber,limitNumber:pageNumber}
        var callback = D;
        var skipNumber = C.skipNumber || 0;
        var limitNumber = C.limitNumber || 10;

    } else {
        throw new Error('findDoc 方法只能够为三个或者四个')
        return
    }


    __connectDb((err, db, client) =>  {
        if (err) {
            callback(err, null);
            console.log(err);
            return
        }
        // set collection
        let collection = db.collection(collectionName);
        // query => {age:100}
        collection.find(query)
            .limit(limitNumber)
            .skip(skipNumber)
            .sort({age: 1})
            .toArray(function (err, docArr) {
                if (err) {
                    callback('数据查找失败', null);
                    console.log(err);
                    return
                }
                callback(null, docArr)
                client.close()
            })
    });
};

//改
exports.updateDoc=function (collectionName, query, updateContent ,callback) {
    __connectDb((err,db,client)=>{
        if(err){
            callback(err,null)
            return;
        }
        let collection=db.collection(collectionName)
        // {age:{$gte:500}}
        collection.update(query,updateContent,{multi:true},(err,r)=>{
            if (err){
                callback('修改失败',null)
                console.log(err);
                client.close()
                return
            }
            callback(null,r)
        })
    })
}

//删除
exports.removeDoc=function (collectionName,query,callback) {
    __connectDb((err,db,client)=>{
        if(err){
            callback(err,null)
            return;
        }
        let collection=db.collection(collectionName)
        // {age:{$gte:500}}
        collection.remove(query,(err,r)=>{
            if (err){
                callback('删除失败',null)
                console.log(err);
                client.close()
                return
            }
            callback(null,r)
        })
    })
}


//  基本完成 ==>  模块化


