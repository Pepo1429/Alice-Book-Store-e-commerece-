<?php

include 'dbconnection.php';
require 'C:\xampp\composer\vendor\autoload.php';
session_start(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['create']))
{	 
    $fname = $_POST['fname'];
	 $sname = $_POST['sname'];
	 $email = $_POST['email'];
	 $country = $_POST['country'];
     $city = $_POST['city'];
	 $pcode = $_POST['pcode'];
	 $addr = $_POST['addr'];
	 $pass = $_POST['pass'];
     $educ = $_POST['educ'];
     $comp = $_POST['comp'];
	 $status = 'Active';
if(!empty($comp)){
	$status = '';
}
	 $sql = "INSERT INTO user (first_name,surename,email,country,city,post_code,user_addr,pass,education,company,status_user)
	 VALUES ('$fname','$sname','$email','$country','$city','$pcode','$addr','$pass','$educ','$comp','$status')";
	 if (mysqli_query($conn, $sql)) {
        
		echo '<script type="text/javascript">
                        alert("Your is succesfully updated.");
                        window.location.href = "home.php"
                        </script>';
	 } else {
        echo"No";
		echo "Error: " . $sql . "
" . mysqli_error($conn);

	 }
	 mysqli_close($conn);
}

if(isset($_POST['approve'])){
    $email=$_GET['email'];
    $sql="Update user set status_user ='Active' where email ='".$email."'";
    $result=mysqli_query($conn,$sql);
    
    if($result){
       header("location:admin.php#approval");
    }
    else {
      echo"not OK!";
    }
    }

    if(isset($_POST['register']))
{	 
     $fname = $_POST['first_name'];
	 $sname = $_POST['last_name'];
	 $email = $_POST['email'];
	 $pass = $_POST['pass'];
     $position = $_POST['position'];

	 $sql = "INSERT INTO staff (first_name,last_name,position,email,pass)
	 VALUES ('$fname','$sname','$position','$email','$pass')";
	 if (mysqli_query($conn, $sql)) {
        
		echo "New record created successfully !";
	 } else {
        echo"No";
		echo "Error: " . $sql . "
" . mysqli_error($conn);

	 }
	 mysqli_close($conn);
}

if(isset($_POST['update'])){
	$email = $_SESSION['email'];

	 $fname = $_POST['fname'];
	 $sname = $_POST['sname'];
	 $country = $_POST['country'];
     $city = $_POST['city'];
	 $pcode = $_POST['pcode'];
	 $addr = $_POST['addr'];
     $comp = $_POST['company'];
    $sql="Update user set first_name ='$fname',surename = '$sname', country = '$country', city = '$city', user_addr = '$addr', post_code = '$pcode', company = '$comp'  where email ='".$email."'";
    $result=mysqli_query($conn,$sql);
    if($result){
	echo '<script type="text/javascript">
                        alert("Your is succesfully updated.");
                        window.location.href = "home.php"
                        </script>';
    }
    else {
      echo"not OK!";
	  echo "Error: " . $sql . "
" . mysqli_error($conn);

    }
    }

	if(isset($_GET['discount'])){	
		 $email = $_GET['email'];
		 $disc = $_GET['procent'];
		$sql="Update user set disc ='$disc' where email ='".$email."'";
		$result=mysqli_query($conn,$sql);
		if($result){
		echo '<script type="text/javascript">
							alert("Your succesfully set an discount for the user.");
							window.location.href = "admin.php"
							</script>';
		}
		else {
		  echo"not OK!";
		  echo "Error: " . $sql . "
	" . mysqli_error($conn);
	
		}
		}
    

?>