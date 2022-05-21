/*const express = require('express');
const mysql = require('mysql');

//create connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: ''
    //database: 'vihorevdb'
});

//connect

db.connect((err) => { 
    if(err){
        throw err;
    }    
    console.log("MySql Connected...");
});

const app = express();

//Create DB
app.get('/createdb',(req,res) =>{
    let Sql = 'CREATE DATABASE customersdb';
    db.query(sql,(err, result)=> {
        if(err) throw err; 
        console.log(result);  
        res.send('The Database was created :D');
    });
})

//Create Table
app.get('/createposttable',(req,res) =>{
    let Sql = 'CREATE Table posts(id init AUTO_INCREMENT , title VARCHAR(255), body VARCHAR(255), PRIMARY KEY (id) )';
    db.query(sql,(err, result)=> {
        if(err) throw err; 
        console.log(result);
        res.send('Posts Table created');
    });
});

app.listen(3000, ()=> {
    console.log("running on port 3000");
});

*/

//Updated code 11.4 ' JSON added
const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const fs = require('fs');//The function lets me acces another file 
const http = require('http');
const _ = require('lodash');

const app = express();
const port = process.env.PORT || 5000

app.use(bodyParser.urlencoded({ extended: false }));

app.use(bodyParser.json());

//MySql
 const pool = mysql.createPool({
    connectionLimit: 10,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'vihorevdb'
 });

//Get all usernames that registred 
app.get('/users',(req,res) => {

    pool.getConnection((err , connection)=> {
        if(err) throw err
        else console.log(`connected as id ${connection.threadId}`)

        connection.query('SELECT usersName From users', (err, rows) => {
            connection.release() // return the connection to the pool of threads

            if(!err){
                res.send(rows)//return(rows)
                //return(rows);
            }else{
                console.log(err)
            }
        });
    });
});


//Opens Up The Home Page that we set up 
app.get('/home', function(req, res){
    //app.use(express.static(__dirname + '/public'));
    res.sendFile('C:/xampp/htdocs/Vihorev/Menu Bar Function/index.html');
    console.log('File is opened');
});
//app.use("home",express.static("/Menu%20Bar%20Function/index.html")
/*

app.get('/home',(req,res) => {
        res.setHeader('content-type','html/plain')
        res.write(fs.readFile('Menu%20Bar%20Function/index.html','utf-8',function(error,data){console.log(data)}))
        console.log('File is opened');
})

/*

app.get('/home',(req,res) => {

    pool.getConnection((err , connection)=> {
        if(err) throw err
        else console.log(`The User ${connection.threadId} Opened `)
        if(!err){
            fs.readFile('Menu%20Bar%20Function/index.html','utf-8',function(error,data){console.log(data)})
            //return(rows);
        }else{
            console.log(err)
        }
        });
    });
});
*/

//Function That return all of the usernames that registered 
async function getUsernamesFromDB(req,res,next){
    app.get('/users',(req,res) => {

        pool.getConnection((err , connection)=> {
            if(err) throw err
            else console.log(`connected as id ${connection.threadId}`)

            connection.query('SELECT usersName From users', (err, rows) => {
                connection.release() // return the connection to the pool of threads

                if(!err){
                    res.send(rows)
                    //return rows;
                }else{
                    console.log(err)
                }
            });
        });
    });

}

//console.log(__dirname)
//Listen on envoiprment port or 5000
app.listen(port,()=>console.log(`listen on port ${port}`));

