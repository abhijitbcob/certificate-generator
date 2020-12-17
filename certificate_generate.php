<?php
session_start();
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $course=$_POST["course"];

    if(!is_numeric($name) && !is_numeric($course)){
        //header('content-type: image/jpeg');
        $image = imagecreatefromjpeg('template.jpg');
        $color = imagecolorallocate($image, 0, 0, 0);  //this line for support of GD library on localhost not for hosting server
        putenv('GDFONTPATH=' . realpath('.'));
        $font1 = "fonts/cac_champagne.ttf";
        $font2 = "fonts/Montserrat-Medium.ttf";

        $date = date('d-m-Y');
        imagettftext($image, 230, 0, 1000, 1290, $color, getenv ("GDFONTPATH")."\\".$font1, $name); //omit 'getenv..' when in hosting sever
        imagettftext($image, 35, 0, 900, 1580, $color, getenv ("GDFONTPATH")."\\".$font2, $course);
        imagettftext($image, 32, 0, 780, 1950, $color, getenv ("GDFONTPATH")."\\".$font2, $date);

        $file=time();
        $file_path="certificate/".$file.".jpg";
        $file_path_pdf="pdf/".$file.".pdf";
        imagejpeg($image,$file_path);
        imagedestroy($image);

        //making PDF
        require('fpdf.php');
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->Image($file_path,0,0,210,150);
        $pdf->Output($file_path_pdf,"F");
        $_SESSION["photo"]=$file_path;
        $_SESSION["pdf"]=$file_path_pdf;

        header("Location:download.php");

    }else{
        $_SESSION["status"]="yes";
        Header("Location: index.php");
        die();
    }

    
}else{
    header("Location: index.php");
}


?>
