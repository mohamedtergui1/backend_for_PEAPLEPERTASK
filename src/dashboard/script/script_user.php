<?php 
session_start();
if(isset($_SESSION['id_admin'])){
    if($_SESSION['role']!='admin'&&$_SESSION['id_admin']!=50){
        header("Location:../sign_in.php");
    }
  }
  else{
    header("Location:.../../sign_in.php");
  }
  require("../cnx.php");
  
  if (
    isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"]) &&
    isset($_POST["region"]) &&
    isset($_POST["city"]) &&
    isset($_FILES['image'])
) {
    $username_POST = $_POST["username"];
    $password_POST = $_POST["password"];
    $email_POST = $_POST["email"];
    $city_POST = $_POST["city"];
    $region_POST = $_POST["region"];

    $password_POST = password_hash($password_POST, PASSWORD_DEFAULT);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $destination_path = "../../../images/users/" . $image;

   
    $add_user_query = "INSERT INTO users(username, password, email, city_id, id_region,image) VALUES ('$username_POST', '$password_POST', '$email_POST', $city_POST, $region_POST,'$image_tmp')";
    $run_add_query = mysqli_query($cnx, $add_user_query);

    if ($run_add_query) {
        // Move the uploaded file
        $bool = move_uploaded_file($image_tmp, $destination_path);
        if ($bool) {
            header('Location: ../UsersManagement.php');
            exit();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error: " . mysqli_error($cnx);
    }
}

else if(isset($_POST['id'])&&isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['region'])&&isset($_POST['city'])){
    $id_edit=$_POST['id'];
    $emailedit=$_POST['email'];
    $username_edit=$_POST['username'];
    $password_edit=$_POST['password'];
    $city_edit=$_POST['city'];
    $region_edit=$_POST['region'];
    $run_edit_qeury=mysqli_query($cnx,"UPDATE users SET username='$username_edit',password='$password_edit',email='$emailedit',city_id=$city_edit,id_region= $region_edit WHERE id= $id_edit");
    header('Location:../UsersManagement.php');
}
 
else if (isset($_GET['id_delete_user'])){
    $id=$_GET['id_delete_user'];
    $delete_qeury="DELETE FROM users WHERE id=$id";
    $run_qeury=mysqli_query($cnx,$delete_qeury);
    header('Location:../UsersManagement.php');
}
else if (isset($_GET['delete_all'])){
    if($_GET['delete_all']='true'){
    $delete_qeury="DELETE FROM users ";
    $run_qeury=mysqli_query($cnx,$delete_qeury);
    header('Location:../UsersManagement.php');
    }
}


?>