<?php  

require_once("../src/dashboard/cnx.php");
if(isset($_POST["id_offer"])){
         $id=$_POST["id_offer"];
         $re=mysqli_query($cnx,"UPDATE offres SET status='rejected' WHERE id = $id");
         if($re) echo"success";
}