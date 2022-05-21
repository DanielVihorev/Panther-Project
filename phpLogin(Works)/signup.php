<?php

 include_once 'header.php';

?>

    <section class ="signup-form">
        <h2>Sign Up</h2>
        <div class ="signup-form-form">
            <form class= "" action="includes/signup.inc.php" method="post" > <!-- means that the site a phph file that runs and the user don't see it -->
                <input type= "text" name="name" placeholder="Write Your Full Name Here" >
                <input type= "text" name="email" placeholder="Put your best Email Here" >
                <input type= "text" name="uid" placeholder="Type the Username that you want to use" >
                <input type= "password" name="pwd" placeholder="Type you Password Here" >
                <input type= "password" name="pwdrepeat" placeholder="Type you Password Again Here" >
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <!-- The function runs the error on the screen -->
        <?php 
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill In All Fields</p>";
                }
                else if($_GET["error"] == "invaildUid"){
                    echo "<p>Choose a proper username!</p>";
                }
                else if($_GET["error"] == "invaildEmail"){
                    echo "<p>Choose a proper email!</p>";
                }
                else if($_GET["error"] == "passwordsDontMatch"){
                    echo "<p>Make Sure That the passwords are matching!</p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong , try again!</p>";
                }
                else if($_GET["error"] == "UserNameisAlreadyTaken"){
                    echo "<p>UserName Already Taken!</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p>You have Signed Up!</p>";
                }
            }
        ?>
    </section>

<?php

include_once 'footer.php';

?>