<?php
session_start();
require_once("../src/dashboard/cnx.php");

if (
    isset($_POST['name_project']) &&
    isset($_POST['description']) &&
    isset($_POST['category']) &&
    isset($_POST['sub_category']) &&
    isset($_FILES['image'])
) {
    $user = $_SESSION['id_user'];
    $name = htmlspecialchars($_POST['name_project']);
    $description = htmlspecialchars($_POST['description']);
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif',"webp");
    $fileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    
    if (in_array($fileType, $allowedTypes)) {
        $destination_path = "../images/projects/" . $image;
        $bool = move_uploaded_file($image_tmp, $destination_path);
        
        if (!$bool) {
            die('File upload failed');
        }
    } else {
        die('Invalid file type');
    }

    $query_add = "INSERT INTO projects(projectNAME, projrctDescription, categoriesID, souscategoriesID, usersID, image) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($cnx, $query_add);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiiis", $name, $description, $category, $sub_category, $user, $image);
        mysqli_stmt_execute($stmt);
        echo "1";
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($cnx);
    }
}
?>
