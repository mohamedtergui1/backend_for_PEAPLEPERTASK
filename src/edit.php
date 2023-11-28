<?php
require("cnx.php");



if(isset($_POST['id_user'])){
    $id=$_POST['id_user'];
    $qeury = "SELECT users.id as id, username, password, email, regions.nom as region ,city.nom as city  ,id_region , city_id FROM users INNER JOIN city INNER JOIN regions
    on users.city_id=city.id and users.id_region=regions.id WHERE users.id=$id";
    $user=mysqli_query($cnx,$qeury);
    $user=mysqli_fetch_assoc($user);
}

$qeury_region ="SELECT * from regions where id <> $id ";
$region_res=mysqli_query($cnx,$qeury_region);

$qeury_city ="SELECT id, nom FROM city  where id <> $id";
$city_res=mysqli_query($cnx,$qeury_city);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
    
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
        
        <div>
            <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                   edit user
                </h2>
                <form class="mt-8 space-y-6" action="UsersManagement.php" method="post">
                    <input  name="id" type="hidden" value="<?=$id?>" name="id">
                    <div>
                        <label  for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input  name="email" type="email" value="<?=$user['email']?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                        <input  name="username" type="text" value="<?=$user['username']?>" id="password" placeholder="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input  name="password" type="password" value="<?=$user['password']?>" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="flex items-start">
                    <label for="remember" class="font-medium text-gray-500 dark:text-gray-400">region</label>
                        <div class="flex items-center h-5">

                        <select name="region" id="" required>
            <option selected  value="<?=$user['id_region']?>"><?=$user['region']?></option>
            <?php
            while($res_fetch=mysqli_fetch_assoc($region_res)):
            $region_nom=$res_fetch['nom'];
            $region_id=$res_fetch['id'];
            ?>
             <option value="<?=$region_id?>"><?=$region_nom?></option>
             <?php endwhile; ?>
        </select>
        
                        </div>
                        <div class="ms-3 text-sm">
                        <label for="remember" class="font-medium text-gray-500 dark:text-gray-400">city</label>
                        </div>
                        <select name="city" id="" required>
        <option selected  value="<?=$user['city_id']?>"><?=$user['city']?></option>
        <?php
            while($res_fetch=mysqli_fetch_assoc($city_res)):
            $city_nom=$res_fetch['nom'];
            $city_id=$res_fetch['id'];
            ?>
             <option value="<?=$city_id?>"><?=$city_nom?></option>
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

</body>
</html>