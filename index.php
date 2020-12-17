<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Certificate Generator</h1>
        <form action="certificate_generate.php" method="post">

            <label for="name">Name</label><br>
            <input type="text" name="name" required autocomplete="off"><br>

            <label for="course">Course</label><br>
            <input type="text" name="course" required autocomplete="off"><br>

            <input type="submit" class="display" value="Generate" name="submit">
        </form>
        <?php 

            session_start();
        
            if(isset($_SESSION["status"])){
                echo "<p style='color:red;'>Please enter string value!</p>";
                unset($_SESSION["status"]);
            }
        
        ?>


    </div>
</body>

</html>