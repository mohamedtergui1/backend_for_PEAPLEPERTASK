<?php

require("./cnx.php");
if(isset($_GET['search'])){
    
        $search = $_GET['search'];
      $res=  mysqli_query($cnx,"SELECT nom from city WHERE nom like '$search%'");
      if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $tab[]=$row['nom'];
        }
        if(sizeof($tab)>0){
            echo json_encode($tab);
        }
       
      }else{
        echo "no result found";
      }
    
}