<?php  


require_once("../src/dashboard/cnx.php");
$status=true;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $email= htmlspecialchars($email);
    $password = $_POST["password"];
    $password= htmlspecialchars($password);
    $fname=$_POST["fname"];
    $fname= htmlspecialchars($fname);
    $lname=$_POST["lname"];
    $lname= htmlspecialchars($lname);
    $region=$_POST["region"];
    $city=$_POST["city"];
    $image="";
    $role = $_POST['role'];
    $role= htmlspecialchars($role);
    if(isset($_FILES["image"]["name"])){
    $image=$_FILES["image"]["name"];
    $image_tmp=$_FILES["image"]["tmp_name"];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
     $fileType = $_FILES["image"]["type"];
    if (in_array($fileType, $allowedTypes)){
        $destination_path = "../images/users/".$image;
        $bool = move_uploaded_file($image_tmp, $destination_path);
    }else {
        echo" put a image please<br>";
        $status=false;
    }
   }
   $qeury="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($cnx,$qeury);
    

    if($city==""){
        echo "enter your city <br>";
        $status=false;
    } 
    if($region==""){
        echo "enter your city <br>";
        $status=false;
        
    } 
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "this is not format email <br>";
        $status=false;
        
    }
    else if(mysqli_num_rows($result)>0 ){
        echo "this email is allready exist go to sign in page !! <br>";
        $status=false;
    }
    
     if(strlen($password)<7){
         echo "password is week <br>"; $s2=0;
         $status=false;
    }
    



     if(!preg_match('/[A-Za-z]/',$fname)){
      echo "please enter valide firstname <br>";
      $status=false;
    } 
    



    
    
     if(!preg_match('/[A-Za-z]/',$lname)){
        echo "please enter valide lastname <br>";
        $status=false;
    } 
   


   if( $status) {
    session_start();

    $_SESSION['complet_regester']="";
    $_SESSION['complet_regester']="done";
    if ($_SESSION['complet_regester']=="done"){
    

        $password = password_hash($password, PASSWORD_DEFAULT);
       
        
    
    
        $add_user_query = "INSERT INTO users(username, password, email, city_id, id_region, image ,role) VALUES 
        ('$fname $lname', '$password', '$email', $city, $region,'$image','$role')";
        $run_add_query = mysqli_query($cnx, $add_user_query);
    
        if ($run_add_query) {
              
                $id= mysqli_fetch_assoc(mysqli_query($cnx,"SELECT id FROM users WHERE email = '$email'"))["id"];
                $_SESSION['role'] = $role;
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
