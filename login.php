<?php
$server="localhost";
$user="root";
$pass="";
$db="regstrationdb";

$con=new mysqli($server,$user,$pass,$db);


if($con->connect_error){
    die("connection failed".connect_error);
}else{
    if(isset($_POST['login'])){
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $sql1="SELECT * FROM coding WHERE email='$email' AND password='$password';";
        $result=mysqli_query($con,$sql1);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                header('location:home.html?message=login successfuly');
            }else{
                $sql1="SELECT * FROM illustrator WHERE email='$email' AND password='$password';";
                $result=mysqli_query($con,$sql1);
                if($result){
                    $num=mysqli_num_rows($result);
                    if($num>0){
                        header('location:home.html?message=login successfuly');
                    }else{
                        $sql1="SELECT * FROM studenttb WHERE email='$email' AND password='$password';";
                        $result=mysqli_query($con,$sql1);
                        if($result){
                            $num=mysqli_num_rows($result);
                            if($num>0){
                                header('location:home.html?message=login successfuly');
                            }else{
                                $sql1="SELECT * FROM studenttb WHERE email='$email' AND password='$password';";
                                $result=mysqli_query($con,$sql1);
                                if($result){
                                    $num=mysqli_num_rows($result);
                                    if($num>0){
                                        header('location:home.html?message=login successfuly');
                                    }else{
                                        $sql1="SELECT * FROM customertb WHERE email='$email' AND password='$password';";
                                        $result=mysqli_query($con,$sql1);
                                        if($result){
                                            $num=mysqli_num_rows($result);
                                            if($num>0){
                                                header('location:home.html?message=login successfuly');
                                            }else if(!$num>0){
                                                header('location:login.html?message=invalid email or password');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }   
            }
        }
    }
}
