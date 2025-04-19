<?php
$server="localhost";
$user="root";
$pass="";
$db="editingorderdb";

$con=new mysqli($server,$user,$pass,$db);


$targetDir="C:/xampp/htdocs/orders/";
$targetfile=$targetDir.basename($_FILES['image']['name']);
$uploadOk=1;
$filetype=strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));

if($con->connect_error){
    die("connection failed".connect_error);
}else{
    if(isset($_POST['submit'])){
        $check=filesize($_FILES['image']['tmp_name']);
        if ($check!==false){
            echo "  file is valid-    "  .$_FILES['file']['name'].  "  .  ";
            $uploadOk=1;
        }else{
            header('location: home.html?message=uplod failed');
            $uploadOk=0;
        }
        // check if file already exist;
        if(file_exists($targetfile)){
            header('location: home.html?message=uplod failed');
            $uploadOk=0;
        }
        if($_FILES['image']['size']>10000000){
            header('location: home.html?message=uplod failed');
            $uploadOk=0;
        }
        // allow certain file formats
        $allow=array('jpg','png','jpeg','gif');
        if(!in_array($filetype,$allow)){
            header('location: home.html?message=uplod failed');
            $uploadOk=0;
        }
        if($uploadOk==0){
            header('location: home.html?message=uplod failed');
        }else{
            if(move_uploaded_file($_FILES['image']['tmp_name'],$targetfile)){
                echo "The file". basename($_FILES['image']['name'])."has been uploaded.";
                $image=basename($_FILES['image']['name']);
                $paymentNo=mysqli_real_escape_string($con,$_POST['paymentNo']);
                
                $sql="INSERT INTO ordertb(image,paymentNo) VALUES('$image','$paymentNo')";
                mysqli_query($con,$sql);
                header('location: home.html?message=uplod successfully');
            }else{
            }
        }   
    }
}
