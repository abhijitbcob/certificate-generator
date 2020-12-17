<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link rel="stylesheet" href="download.css">
</head>

<body>
    <?php 

if(isset($_SESSION["photo"])){   ?>
    <div class="container">
        <p>Preview</p>
        <div class="preview">

            <img src="<?php echo $_SESSION['photo']; ?>" alt="certificate image">


        </div>
        <button id="download"><a href="<?php echo $_SESSION['pdf']; ?>" download>Download</a></button>
        <button id="new"><a href="index.php">Create New</a></button>

    </div>
    <?php
    unset($_SESSION["photo"]);
    unset($_SESSION["pdf"]);
 
}else{
    header("Location: index.php");
}

?>

</body>

</html>