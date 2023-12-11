<?php  
require_once("../src/dashboard/cnx.php");
 
if (isset($_POST["id_project"])){
    $id = $_POST["id_project"];
    $sql = "DELETE FROM projects WHERE id = $id";
   $res = mysqli_query($cnx, $sql);
   if($res){
    echo"1";
   }
}else echo"0";
  