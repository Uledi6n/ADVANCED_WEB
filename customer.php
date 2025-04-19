<?php
$server="localhost";
$user="root";
$pass="";
$dcfgnvbc o
b="regstratio4 ndb";

$con=new mysqli($server,$user,$pass,$db);


if($con->connect_error){
    die("connection failed".connect_error);
}else{
    if(isset($_POST['submit1'])){
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $telphone=mysqli_real_escape_string($con,$_POST['telphone']);
        $password=mysqli_real_escape_string($con,$_POST['password']);

        $sql1="SELECT * FROM customertb WHERE email='$email' AND password='$password';";
        $result=mysqli_query($con,$sql1);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                echo "your email or telphone number already exist";
            }else{
                $sql="INSERT INTO customertb(email,telphone,password) VALUES('$email','$telphone','$password')";
                mysqli_query($con,$sql);
            }
        }
    }else if(isset($_POST['submit2'])){
        $comment=mysqli_real_escape_string($con,$_POST['comment']);
        $paymentNo=mysqli_real_escape_string($con,$_POST['paymentNo']);

        $sql1="SELECT * FROM comment WHERE paymentNo='$paymentNo';";
        $result=mysqli_query($con,$sql1);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                echo "your email or telphone number already exist";
            }else{
                $sql="INSERT INTO comment(comment,paymentNo) VALUES('$comment','$paymentNo')";
                mysqli_query($con,$sql);
            }
        }
        header('location: home.html?message=submit successfully');
    }
}
?>