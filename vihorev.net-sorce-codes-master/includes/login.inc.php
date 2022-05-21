<?php

//Gets the data from the form 
if(isset($_POST["submit"])){
    
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //The statment runs the function and returenes true if the username or password is empty
    if(emptyInputLogin($username , $pwd) !== false ) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    LoginUser($conn, $username, $pwd);
}
else{
    header("location: ../login.php");
    exit();
}