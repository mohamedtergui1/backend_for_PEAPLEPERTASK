<?php  
// session_start();
// $_SESSION['success']="";
require_once("../src/dashboard/cnx.php");
if(isset($_POST["email"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $region=$_POST["region"];
    $city=$_POST["city"];
    $qeury="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($cnx,$qeury);
    $s1=0;
    $s2=0;
    $s3=0;
    $s4=0;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        // echo "this is not format email <br>";
        echo $email."<br>" . $password."<br>" .$fname."<br>" . $lname."<br>" .$city."<br>" .$region  ;
    }
    else if(mysqli_num_rows($result)>0 ){
        echo "this email is allready exist go to sign in page !! <br>";
    }
    else{
        $s1=1;
    }
     if(strlen($password)<7){
         echo "password is week <br>";
    }
     else {
          $s2=1;
     }
     if(!preg_match('/[A-Za-z]/',$fname)){
        echo "please enter valide firstname <br>";
    } 
    else {$s3=1;}
    
     if(!preg_match('/[A-Za-z]/',$lname)){
        echo "please enter valide lastname <br>";
    } 
   else $s4 =1;
   if($s1+$s2+$s3+$s4==4) echo "1";
    
    // if( $_SESSION['success']="success"){
    //     $joind=date("y-m-d");
    //     $url=bin2hex(random_bytes(8));

    // }
}