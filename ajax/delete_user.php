<?php  
require_once("../src/dashboard/cnx.php");
session_start();



if( isset($_POST['id'])&&isset($_SESSION['id_user'])){
    $id=$_SESSION['id_user'];
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($cnx, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $success = mysqli_stmt_execute($stmt);
    
        if ($success) {
            echo '1';
            session_destroy();
        } else {
            echo '0';
        }
    
        mysqli_stmt_close($stmt);
    } else {
        echo '0';
    }
    
      

}
