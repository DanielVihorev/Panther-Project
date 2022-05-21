<?php

//The function makes sure that all the forms of the function all filled if not we will return to the sign up function
function emptyInputSignup($name , $email , $username , $pwd , $pwdRepeat)
{
    $result;

    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $return = false;
    }
    return $result;
}

//The function makes sure that user id is valid
function invaildUid($username)
{
    $result;

    if(preg_match("/^[a-zA-Z0-9]*$/" , $username))
    {
        $result = true;
    }
    else
    {
        $return = false;
    }
    return $result;
}
// The function runs and check that the email is vaild and has @ and everthing else in it 
function invaildEmail($email)
{
    $result;

    if(!filter_var($email ,FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $return = false;
    }
    return $result;
}
// The function make sure that the passwrods really matchs one another 
function pwdMatch($pwd, $pwdRepeat )
{
    $result;

    if($pwd !== $pwdRepeat)
    {
        $result = true;
    }
    else
    {
        $return = false;
    }
    return $result;
}

// The function check and makes sure that the user id exists in the database
function UidExists($conn , $username ,$email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); //Makes the code more scure that user w'ont write code and crack my server and users details
    if(!mysqli_stmt_prepare($stmt, $sel)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }
    //mysqli_stmt_bind_param(the statment ,the type of the data am i submitting to )
    mysqli_stmt_bind_param($stmt, "ss" , $username ,$email );
    //executes the statemeent
    mysqli_stmt_execute($stmt);

    //Show the result of the statment that returned 
    $resultDate = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultDate)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//The function creates the user
function createUser($conn, $name , $email , $username , $pwd )
{
    $sql = "INSERT INTO users (usersName , usersEmail , usersUid , usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn); //Makes the code more scure that user w'ont write code and crack my server and users details
    if(!mysqli_stmt_prepare($stmt, $sel)){
        header("location: ../signup.php?error=none");
        exit();
    }

    //The password is being encrypted using hash
    $hashedPwd = password_hash($pwd , PASSWORD_DEFAULT);

    //mysqli_stmt_bind_param(the statment ,the type of the data am i submitting to )
    mysqli_stmt_bind_param($stmt, "ssss" , $name , $email , $username , $hashedPwd ); // Inserts 4 pieces of data 
    //executes the statemeent
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
    
}

//The function Check if the username and password fields in the login page is empty and returns true or false 
function emptyInputLogin($username , $pwd)
{
    $result;

    if(empty($username) || empty($pwd) ){
        $result = true;
    }
    else{
        $return = false;
    }
    return $result;
}

function LoginUser($conn, $username, $pwd)
{
    $uidExists = UidExists($conn , $username , $username);

    if($UidExists == false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwsHashed = $uidExists["usersPwd"];
    $checkPwd == password_verify($pwd , $pwsHashed);

    //This statment checks if the passwrod that user filled in the field matchs the password in the db
    if($checkPwd === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    else if ($checkPwd === true) //if the password matchs the user is being connected 
    {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}