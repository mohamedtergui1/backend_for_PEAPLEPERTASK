<?php
    require("cnx.php");
    if(isset($_GET["id"])){
    $id=$_GET["id"];
    $qeury="DELETE from categories where id=$id ;";
    $resultat = mysqli_query($cnx,$qeury);
        echo"succes";
    } else {echo"eroorr";}
    header('Location:CategoryManagement.php');
    mysqli_close($cnx);
?>