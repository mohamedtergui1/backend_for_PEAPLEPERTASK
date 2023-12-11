<?php  
 session_start();
require_once("../src/dashboard/cnx.php");
if(isset($_POST["testo"]) && isset($_SESSION['id_user'])){

        $id=$_SESSION['id_user'];
        $comment=$_POST["testo"];
        $re=mysqli_query($cnx,"SELECT * FROM temoignages WHERE usersID=$id");
        if(mysqli_num_rows($re)> 0){

            echo"you don t have permesion to add mora than one testomonilas";

        }else{
           $res = mysqli_query($cnx,"INSERT INTO temoignages (TemoignagesComment,usersID) VALUES ('$comment',$id)");
            if($res){
                echo "added with success";
            }
        }
}


