<?php  

require_once("../src/dashboard/cnx.php");



if($_POST['id_prjct']  && isset($_POST['id_tag'])){
        $tag=$_POST['id_tag'];
        $id_prjct=$_POST['id_prjct'];

    $check =  mysqli_query($cnx,"SELECT * FROM pivot_tags WHERE id_tag='$tag'  and id_project = '$id_prjct'");

         if(mysqli_num_rows($check)>0){
            echo "0";
         }
   else {  $res = mysqli_query($cnx,"INSERT INTO pivot_tags (id_tag, id_project) VALUES ($tag,$id_prjct)");
            if($res) echo "1";}
   

}