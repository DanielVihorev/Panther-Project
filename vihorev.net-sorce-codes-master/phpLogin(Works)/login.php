<?php

 include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Assistant" rel="stylesheet">
    <link rel="stylesheet" href="Sign%20In%20Page/Style.css" >
    <title>Navagation</title>
</head>

    <section class ="login-form">
        <h2>Log In</h2>
        <div class ="user-details">
            <form class= "" action="includes/login.inc.php" method="post" > <!-- means that the site a phph file that runs and the user don't see it -->
            <div class ="input-box">
                <span class = "details">Username</span>
                <input type= "text" name="uid" placeholder="Type you Username/Email" >
            <div class ="input-box">
                <span class = "details">Password</span>
                <input type= "password" name="pwd" placeholder="Type you Password Here" >
                <button type="submit" name="submit">Login In</button>
            </div>
            </form>
        </div>
        <!-- The function runs the error on the screen -->
        <?php 
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill In All Fields</p>";
                }
                else if($_GET["error"] == "wrongLogin"){
                    echo "<p>Make sure that your password matchs the username!</p>";
                }
            }
        ?>
    </section>

</body>
</html>

<?php

include_once 'footer.php';

?>