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
  
require('../cnx.php');
if (isset($_POST['nom_cetegoty_add']) && isset($_FILES['image'])) {
    print_r($_FILES['image']);
   
    $input_add_cate_value = $_POST['nom_cetegoty_add'];
    $input_add_cate_value= htmlspecialchars($input_add_cate_value);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

   
    if (!empty($image) && is_uploaded_file($image_tmp)) {
      
        $destination_path = "../../../images/categories/". $image;

        $query = "INSERT INTO categories (name, image) VALUES (?, ?)";
        $stmt = mysqli_prepare($cnx, $query);
        mysqli_stmt_bind_param($stmt, "ss", $input_add_cate_value, $image);
        $run_query = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        
        if ($run_query) {
            
           $booll= move_uploaded_file($image_tmp, $destination_path);
            if($booll){
            header('Location:../CategoryManagement.php');
        }
            exit(); 
        } else {
           
            echo "Error: " . mysqli_error($cnx);
        }
    } else {
        echo "Error uploading file.";
    }
}

else if (isset($_GET["id_cate"])) {
    echo"its woek";
    $id_cete = $_GET["id_cate"];
    $qeury = "DELETE from categories where id=$id_cete";
    $resultat = mysqli_query($cnx, $qeury);
    header('Location:../CategoryManagement.php');
}
else if (isset($_GET["id_sub_cetegoty"])) {
    $id_sub_cetegory = $_GET["id_sub_cetegoty"];
    $qeury = "DELETE from souscategories where id=$id_sub_cetegory ;";
    $resultat = mysqli_query($cnx, $qeury);
    header('Location:../CategoryManagement.php');
}

else if (isset($_GET['categorie_select'])&& $_GET['nom_cetegoty_']){
    
    $category_select_id_category = $_GET['categorie_select'];
    $sub_cate_name = $_GET['nom_cetegoty_'];
    $sub_cate_name= htmlspecialchars($sub_cate_name);
    echo $category_select_id_category . $sub_cate_name;
    
    $query = "INSERT INTO souscategories (souscategoriesNAME, categoriesID) VALUES (?, ?)";
    
    $stmt = mysqli_prepare($cnx, $query);
    mysqli_stmt_bind_param($stmt, "si", $sub_cate_name, $category_select_id_category);
    $run_query = mysqli_stmt_execute($stmt);
    
    if ($run_query) {
        header('Location:../CategoryManagement.php');
    } else {
        
        echo "Error: " . mysqli_error($cnx);
    }
    mysqli_stmt_close($stmt);
}
else if ( isset($_GET['edit_category_new_name']) && isset($_GET['edit_category_new_id'])){
          $id_category_want_edit =$_GET['edit_category_new_id'];
          $new_name_category= $_GET['edit_category_new_name'];
          $new_name_category= htmlspecialchars($new_name_category);
          $qeury_update="UPDATE categories  SET name='$new_name_category' WHERE id=$id_category_want_edit";
          $run_qeury_update=mysqli_query($cnx,$qeury_update);
          header('Location:../CategoryManagement.php');
}
else if (isset($_GET['edit_sub_category_new_name'])&& isset($_GET['edit_sub_category_new_id'])){
    $id_sub_cetegory = $_GET['edit_sub_category_new_id'] ;
    $new_name_sub_category =$_GET['edit_sub_category_new_name'];
    $new_name_sub_category= htmlspecialchars($new_name_sub_category);
    $qeury_update = ("UPDATE souscategories  SET souscategoriesNAME='$new_name_sub_category' WHERE id=$id_sub_cetegory");
    $run_qeuryUpdate = mysqli_query($cnx,$qeury_update);
    header('Location:../CategoryManagement.php');
}
mysqli_close($cnx);
?>