<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Assistant" rel="stylesheet">
    <link rel="stylesheet" href="Menu%20Bar%20Function/Style.css" >
    <title>Navagation</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h4>Vihorev</h4>
        </div>
        
         <!-- displays my links -->
        <ul class="vihorev-links">
            <li>
                <a href="Side%20Bar%20Function/index.html">Home</a>
            </li>
            <li>
                <a href="Blog/index.html">Blog</a>
            </li>
            <li>
                <a href="Drag%20and%20Drop%20Function/index.html">Build My Page</a>
            </li>
            <li>
                <a href="#">Projects</a>
            </li>
            <!-- This part of the code checks if the user loged in -->
            <?php 
                if(isset($_SESSION["useruid"])){
                    echo "<li><a href='profile.php'>Profile Page</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                }
                else{
                    echo "<li><a href='login.php'>Log In</a></li>";
                    echo "<li><a href='signup.php'>Sign Up</a></li>";
                }
            ?>
            
            <li>
                <a href="#">Support</a>
            </li>
        </ul>

        <!-- makes the contect responsive for the phone -->
        <div class = "burger"> 
            <div class = "line1"></div>
            <div class = "line2"></div>
            <div class = "line3"></div>
        </div>
    </nav>

    <script src="app.js"></script>
</body>

</html>


