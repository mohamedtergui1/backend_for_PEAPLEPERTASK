<?php
session_start();
if(isset($_SESSION['id_admin'])){
    $id_session = $_SESSION['id_admin'];
    if($_SESSION['role']!='admin'&&$_SESSION['id_admin']!=50){
        header("Location:../sign_in.php");
    }
  }
  else{
    header("Location:../sign_in.php");
  }
  require("cnx.php");

  $qeury = "SELECT id, username , image from users where id = $id_session";
  $resi=mysqli_query($cnx,$qeury);
   $row=mysqli_fetch_assoc($resi);
  $image=$row['image'];
  $username=$row['username'];

if (isset($_POST['id'])){
    $id=$_POST['id'];
    $qeury="SELECT  projectNAME, projrctDescription, categoriesID, souscategoriesID, usersID FROM projects WHERE id=$id";
    $result=mysqli_query($cnx,$qeury);
    $rows=mysqli_fetch_assoc($result);
    $projectNAME=$rows["projectNAME"];
    $usersID=$rows["usersID"];
    $souscategoriesID=$rows["souscategoriesID"];
    $categoriesID=$rows["categoriesID"];
    $projrctDescription=$rows["projrctDescription"];
   

}
$query_users = "SELECT  id , username FROM users WHERE id <> $usersID";
$result_user = mysqli_query($cnx, $query_users);
$qeury_category = "SELECT id,name FROM categories WHERE id<>$categoriesID";
$result_category = mysqli_query($cnx, $qeury_category);
$qeury_subcategory = "SELECT id,souscategoriesNAME FROM souscategories WHERE id<>$souscategoriesID";
$result_sub_category = mysqli_query($cnx, $qeury_subcategory);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../dist/output.css" rel="stylesheet">

    
</head>
<body class="dark:bg-slate-900">
    
     <!-- header -->
  <?php
  include("header_dashbord.php");
  ?>
  <div class="flex flex-row justify-start  dark:bg-gray-900 ">
    <!-- end header -->
    <!-- side bar -->
    <?php
    include("sidbarOFdashboard.php");
    ?>
    <!-- end side bar -->
    <div class="flex-grow flex flex-col pb-10 dark:bg-gray-900 dark:text-white">

 

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
        
        <div class="justify-self-center">
            <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                   edit project
                </h2>
                <form class="mt-8 space-y-6" action="script/script_project.php" method="post">
                    <input  name="id" type="hidden" value="<?=$id?>" name="id">
                    <div>
                        <label  for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAME</label>
                        <input  name="name" type="text" value="<?=$projectNAME?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESCRIPTION</label>
                        <input  name="description" type="text" value="<?= $projrctDescription?>" id="password" placeholder="DESCRIPTION" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    
                    



                    <div class="flex items-start">
                    <label for="remember" class="font-medium text-gray-500 dark:text-gray-400">sub category</label>
                        <div class="flex items-center h-5">
                            
                        <select class="border-2 shadow  w-40 dark:text-black  h-10" name="sub_category" required>
                    
                        <option selected value="<?=$souscategoriesID?>"><?php 
                            $subcategory_name=mysqli_fetch_assoc(mysqli_query($cnx,"SELECT souscategoriesNAME FROM souscategories where id=$souscategoriesID"))["souscategoriesNAME"];
                            echo $subcategory_name;
                        ?></option>
                    <?php
                      
                    while ($res_fetch = mysqli_fetch_assoc($result_sub_category)):
                        $sub_category_nom = $res_fetch['souscategoriesNAME'];
                        $sub_category_id = $res_fetch['id'];
                        ?>
                        <option value="<?= $sub_category_id ?>">
                            <?= $sub_category_nom ?>
                        </option>
                    <?php endwhile; ?>

                </select>
          
                        </div>
                        <div class="ms-3 text-sm">
                        <label for="remember" class="font-medium text-gray-500 dark:text-gray-400"> category</label>
                        </div>
                        <select class="border-2 shadow h-10 w-40 dark:text-black  " name="category" required>
                        <option selected value="<?=$categoriesID?>"><?php 
                            $category_name=mysqli_fetch_assoc(mysqli_query($cnx,"SELECT name FROM categories where id=$categoriesID"))["name"];
                            echo $category_name;
                        ?></option>

                    <?php
                    while ($res_fetch = mysqli_fetch_assoc($result_category)):
                        $category_nom = $res_fetch['name'];
                        $category_id = $res_fetch['id'];
                        ?>
                        <option value="<?=$category_id?>">
                            <?=$category_nom?>
                        </option>
                    <?php endwhile; ?>

                </select>
                    </div>
                    <div class="flex items-start">
                    <select class="border-2 shadow    dark:text-black w-2/3 h-10" name="user" required>
                    <option selected value="<?=$usersID?>"><?php 
                            $username=mysqli_fetch_assoc(mysqli_query($cnx,"SELECT username FROM users where id=$usersID"))["username"];
                            echo $username;
                        ?></option>
                    <?php
                    while ($res_fetch = mysqli_fetch_assoc($result_user)):
                        $user_nom = $res_fetch['username'];
                        $user_id = $res_fetch['id'];
                        ?>
                        <option value="<?= $user_id ?>">
                            <?= $user_nom ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                    </div>
                    <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">submit</button>
                    
                </form>
            </div>
        </div>
    </div>
</section>
    </div>
 
    <script src="../../javascript/jquery.js"></script>
  <script src="../../javascript/dashboard.js"></script>
</body>
</html>