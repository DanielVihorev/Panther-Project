<?php

$host = 'localhost' ;
$user = 'root' ;
$pass = '';
$db_name = 'blog';

$conn = new mysqli($host , $user , $pass ,$db_name );

if ($conn->connect_error){
    die('Database connection error: ' . $conn->connect_error);/*The error that pops on the screen of the error that expected*/
} else{
    echo "Db connection Successfully Made !";
}