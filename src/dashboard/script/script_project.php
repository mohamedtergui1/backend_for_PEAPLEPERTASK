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
    isset($_POST['name_project']) &&
    isset($_POST['description']) &&
    isset($_POST['user']) &&
    isset($_POST['category']) &&
    isset($_POST['sub_category']) &&
    isset($_FILES['image'])
) {
    $name_project = $_POST['name_project'];
    $description = $_POST['description'];
    $user = $_POST['user'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $query_add = "INSERT INTO projects(projectNAME, projrctDescription, categoriesID, souscategoriesID, usersID,image) VALUES ('$name_project', '$description', $category, $sub_category, $user,'$image')";
    $run_add = mysqli_query($cnx, $query_add);
    $destination_path = "../../../images/offers/" . $image;

    if ($run_add) {
        $bool = move_uploaded_file($image_tmp, $destination_path);
        if ($bool) {
            header('Location:../projects_management.php');
            exit();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error: " . mysqli_error($cnx);
    }
}

    
    else if (isset($_POST['user']) && $_POST['category'] && $_POST['sub_category'] && $_POST['description'] && $_POST['name'] && $_POST['id']){
        $name_project = $_POST['name'];
        $description = $_POST['description'];
        $user = $_POST['user'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
          $id_edit=$_POST['id'];
        $res=mysqli_query($cnx,"UPDATE projects SET projectNAME=' $name_project',
        projrctDescription='$description',categoriesID=$category,souscategoriesID=$sub_category,usersID=$user WHERE id= $id_edit");
         header("Location:../projects_management.php");
    }
    
    else if(isset($_GET['id_delete_project'])){
        $id_project=$_GET['id_delete_project'];
        $qeury_d=" DELETE FROM projects WHERE id= $id_project";
        $run_qeury=mysqli_query($cnx,$qeury_d);
        header("Location:../projects_management.php");
    }
    else if(isset($_GET['delete_all'])){
        if($_GET['delete_all']='true'){
        $qeury_d=" DELETE FROM projects ";
        $run_qeury=mysqli_query($cnx,$qeury_d);
        header("Location:../projects_management.php");
    }
    }else echo "something wrong!";
  
?>