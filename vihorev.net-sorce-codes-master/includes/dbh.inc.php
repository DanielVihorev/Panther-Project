<?php 

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "vihorevdb";

$conn = mysqli_connect( $serverName , $dbUsername , $dbPassword , $dbName );

if( !$conn) {
    die("Connection Faild" .mysqli_connect_error() );
}