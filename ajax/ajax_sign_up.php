<?php  


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
    $s5=0;
    $s6=0;
    if($city==""){
        echo "enter your city <br>";
        
    } else $s5=1;
    if($region==""){
        echo "enter your city <br>";
        
    }else $s6=1;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "this is not format email <br>";
        
    }
    else if(mysqli_num_rows($result)>0 ){
        echo "this email is allready exist go to sign in page !! <br>";
        
    }
    else{
        $s1=1;
    }
     if(strlen($password)<7){
         echo "password is week <br>"; $s2=0;
    }
     else {
          $s2=1;
          
     }



     if(!preg_match('/[A-Za-z]/',$fname)){
      echo "please enter valide firstname <br>";
      $s3=0;
    } 
    else   $s3=1; 



    
    
     if(!preg_match('/[A-Za-z]/',$lname)){
        echo "please enter valide lastname <br>";
     $s4=0;
    } 
   else  $s4 =1;


   if($s1+$s2+$s3+$s4+$s5+$s5==6) {
    session_start();

    $_SESSION['complet_regester']="";
    $_SESSION['complet_regester']="done";
    if ($_SESSION['complet_regester']=="done"){
    

        $password = password_hash($password, PASSWORD_DEFAULT);
       
    
    
        $add_user_query = "INSERT INTO users(username, password, email, city_id, id_region,role) VALUES 
        ('$fname $lname', '$password', '$email', $city, $region,'user')";
        $run_add_query = mysqli_query($cnx, $add_user_query);
    
        if ($run_add_query) {
                $id= mysqli_fetch_assoc(mysqli_query($cnx,"SELECT id FROM users WHERE email = '$email'"))["id"];
                $_SESSION['role'] = 'user';
                $_SESSION['id_user'] = $id;
                echo "1";
        } else {
            echo "Error: " . mysqli_error($cnx);
        }
    }
        
}


}


//    else echo "&nbsp;";
    
    // if( $_SESSION['success']="success"){

    //     $url=bin2hex(random_bytes(8));

    // }
