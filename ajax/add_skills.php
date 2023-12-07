<?php  

session_start();
require_once("../src/dashboard/cnx.php");

if(isset($_SESSION['role'])){

if($_SESSION['role'] == 'freelancer' && isset($_POST['skill'])){
        $skill=$_POST['skill'];
        $id=$_SESSION['id_user'];

    $check =  mysqli_query($cnx,"SELECT * FROM pivot_skills WHERE id_skill='$skill'  and id_user = '$id'");

         if(mysqli_num_rows($check)>0){
            echo "0";
         }
   else {  $res = mysqli_query($cnx,"INSERT INTO pivot_skills (id_skill, id_user) VALUES ($skill,$id)");
            if($res) echo "1";}
   
}
}