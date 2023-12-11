<?php  

session_start();
require_once("../src/dashboard/cnx.php");


function iput($a){
      $a=trim($a);
      $a=htmlspecialchars($a);
      return $a;
}
  if(isset($_POST["id"])&&isset($_POST["price"])&&isset($_POST["date"])&&isset($_SESSION["id_user"])){
    $id=iput($_POST["id"]);
    $price=iput($_POST["price"]);
    $date=iput($_POST["date"]);
    $id_user=$_SESSION["id_user"];
    

    $qeury="INSERT INTO offres ( Offresprice, delay, projectsID,  freelancer_id, status)  VALUES (? , ? , ? ,?, 'pending')";
    $stmt=mysqli_prepare($cnx,$qeury);
    mysqli_stmt_bind_param($stmt,"dsii",$price,$date,$id, $id_user);
    mysqli_stmt_execute($stmt);
    if($stmt){
        echo "1";
    }else echo "0";

  }
