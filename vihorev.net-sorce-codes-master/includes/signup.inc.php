<?php

if (isset($_POST["submit"])) {

    echo "It works"; 
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //The statement makes sure that all the forms of the function all filled if not we will return to the sign up function
    if(emptyInputSignup($name , $email , $username , $pwd , $pwdRepeat) !== false ) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    //The statement makes sure that user id is valid
    if(invaildUid($username) !== false ) {
        header("location: ../signup.php?error=invaildUid");
        exit();
    }
    //The statement makes sure that the email is valid
    if(invaildEmail($email) !== false ) {
        header("location: ../signup.php?error=invaildEmail");
        exit();
    }
    //The statement makes sure that the passwords are mathcing eatch other
    if(pwdMatch($pwd, $pwdRepeat ) !== false ) {
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }
    //The statement makes sure the username doesnt already exists in the database
    if(UidExists($conn , $username ,$email) !== false ) {
        header("location: ../signup.php?error=UserNameisAlreadyTaken");
        exit();
    }

    createUser($conn, $name , $email , $username , $pwd );

}
else{
    header("location: ../signup.php");
    exit();
}