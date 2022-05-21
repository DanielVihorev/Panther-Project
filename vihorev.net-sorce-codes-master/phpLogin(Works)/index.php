<?php

 include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
    <select class="form-control" name="language"> <!--declaration of a class that hold the form and language selection -->     
    <!--includes the C++ for the https protocol run the buffer that includes errors and exeptions-->
    <option value="c">C</option>
    <option value="cpp">C++</option>
    <option value="csharp">C#</option>
    <option value="java">Java</option>

</body>
</html>

    <section>
        <?php 
            if(isset($_SESSION["useruid"])){
                echo "<p>Hello there !" . $_SESSION["useruid"] . "</p>";
            }
        ?>
    </section>

<?php

include_once 'footer.php';

?>