<?php     
    require_once("../src/dashboard/cnx.php");
 
    if (isset($_POST["id_project_offers"])){
      $id = $_POST["id_project_offers"];
    

     $sql = "SELECT offres.id as id , Offresprice , delay,  users.username as name, users.image as image,offres.freelancer_id as id_free , status FROM offres 
     INNER JOIN users on users.id=offres.freelancer_id WHERE offres.projectsID=$id";
     $result = mysqli_query($cnx,$sql);
     if (mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_assoc($result)){
            $tab[]=$row;
           }
           echo json_encode($tab);
    
    }


    }
    

 