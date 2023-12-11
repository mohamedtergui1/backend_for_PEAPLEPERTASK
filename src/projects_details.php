<?php    
session_start();
require("./dashboard/cnx.php");
$tags=mysqli_query($cnx,"SELECT tag,id FROM tags");


if (isset($_SESSION['role']) && isset($_SESSION['id_user'])) {
  $id = $_SESSION['id_user'];

  $qeury = "SELECT * FROM users WHERE  id = $id";
  $res = mysqli_query($cnx, $qeury);
  $row = mysqli_fetch_array($res);

  $username = $row['username'];
  $image = $row['image'];
  $name_user = $username;
  $status = "log-out";
  $username_link = "#";
  $status_link = "dashboard/script/script.php";
  $image_user = $row["image"];
  if (empty($image_user)) {
    $image_user = "no_photo.png";
  }
  $status_image = "block";

  // $status_image="block";
} else {
  $name_user = "sign up";
  $status = "Sign In";
  $username_link = "sign_in.php";
  $status_link = "sign_in.php";
  $image_user = "";
  $status_image = "hidden";
}


?>
<!doctype html>
<html>

<head>
  <title>search</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/output.css">
  <!-- <link rel="stylesheet" href="input.css">
  <link rel="stylesheet" href="style.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>
  

</head>

<body class="overflow-x-hidden dark:bg-slate-900">
  <!-- Header -->
  <?php
  include("./include/header.php");
  ?>
  <section>
    <?php

if(isset($_GET["id"])):
    $id = $_GET["id"];
    $project= mysqli_query($cnx,"SELECT  projectNAME,users.image as img , users.username as username , 
    projrctDescription, categoriesID, souscategoriesID
   , usersID,  projects.image as image_ FROM projects INNER JOIN users on users.id =  projects.usersID  WHERE projects.id=$id");
    while($row = mysqli_fetch_assoc($project)):
        $name= $row["projectNAME"];
        $image_project = $row["image_"];
        $image_user= $row["img"];
        $description=   $row["projrctDescription"];
        $usename= $row["username"];
?>
   
      <div  class="flex justify-around h-48 gap-5 border-b-2 align-middle p-14" > 
        <span>
          project name 
        </span>
         <p>
       <?=$name?>
         </p>
      </div>
      <div  class="flex justify-around h-48 gap-5 border-b-2 align-middle p-14"> 
        <span>
       project description
        </span>
         <p>
         <?=$description?>
         </p>
      </div>
      <div  class="flex justify-around h-48 gap-5 border-b-2 align-middle p-14"> 
        <span>
       project image
        </span>
        <img src="../images/projects/<?=$image_project?>" alt="">
         
      </div>
      <div  class="flex justify-around h-48 gap-5 border-b-2 align-middle p-14"> 
        <span>
       user name
        </span>
        
         <p>
         <?=$usename?>
         </p>
      </div>
      <div  class="flex justify-around h-48 gap-5 border-b-2 align-middle p-14"> 
        <span>
       user image
        </span>
        <img src="../images/users/<?=$image_user?>" alt="">
         
      </div>
<?php endwhile;  endif; ?>

   </section>




  <?php
  include("./include/footer.php");
  ?>