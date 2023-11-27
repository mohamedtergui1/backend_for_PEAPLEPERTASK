<?php
require("cnx.php");
$qeury = "SELECT users.id as id, username, password, email, regions.nom as region ,city.nom as city FROM users INNER JOIN city INNER JOIN regions
   on users.city_id=city.id and users.id_region=regions.id ORDER BY users.id desc ";
$res_qeury = mysqli_query($cnx, $qeury);

$qeury_region ="SELECT * from regions";
$region_res=mysqli_query($cnx,$qeury_region);

$qeury_city ="SELECT id, nom FROM city";
$city_res=mysqli_query($cnx,$qeury_city);

// add user
if(isset($_GET["username"])&&isset($_GET["password"])&&isset($_GET["email"])&&isset($_GET["region"])&&isset($_GET["city"])){
     $username_get=$_GET["username"];
     $password_get=$_GET["password"];
     $email_get=$_GET["email"];
     $city_get=$_GET["city"];
     $region_get=$_GET["region"];
       $add_user_qeury="INSERT INTO users( username, password, email, city_id, id_region) VALUES ('$username_get','$password_get','$email_get',$city_get,$region_get)";
       $run_add_qeury=mysqli_query($cnx,$add_user_qeury);
       header('Location:UsersManagement.php');
}
else if (isset($_GET['id_delete_user'])){
    $id=$_GET['id_delete_user'];
    $delete_qeury="DELETE FROM users WHERE id=$id";
    $run_qeury=mysqli_query($cnx,$delete_qeury);
    header('Location:UsersManagement.php');
}
else if (isset($_GET['delete_all'])){
    if($_GET['delete_all']='true'){
    $delete_qeury="DELETE FROM users ";
    $run_qeury=mysqli_query($cnx,$delete_qeury);
    header('Location:UsersManagement.php');
    }
}



mysqli_close($cnx);
?>

<!doctype html>
<html>

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">

</head>

<body class="overflow-x-hidden  dark:bg-gray-900 dark:text-white">
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
        <section class="flex-grow lg:w-9/12 flex flex-col gap-14 px-2 ">
            <h1 class="font-bold text-4xl text-center mt-5">Users Management</h1>

            <!-- This is an example component -->
            <div class="w-full overflow-x-scroll">
                <div class="max-w-2xl mx-auto">

                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                        <thead class="bg-gray-100 dark:bg-gray-700 ">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    username
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    password
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    email
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    region
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    city
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    <span class="sr-only cursor-pointer " id="btn_add_user"><svg
                                                            class="h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                                            className="w-6 h-6">
                                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                                d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                        </svg>
                                                    </span>
                                                </th>
                                                <th scope="col "
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    <form
                                                        onsubmit="return confirm('Are you sure you want to delete all user?');"
                                                        method="get">
                                                        <input type="hidden" name="delete_all" value="true">
                                                        <input class="sr-only cursor-pointer text-red-500" type="submit"
                                                            value="Delete All">
                                                    </form>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                            <?php
                                            while ($row = mysqli_fetch_assoc($res_qeury)):
                                                $id = $row['id'];
                                                $username = $row['username'];
                                                $email = $row['email'];
                                                $password = $row['password'];
                                                $region = $row['region'];
                                                $city = $row['city'];
                                                ?>
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white username">
                                                        <?= $username ?>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white password">
                                                        <?= $password ?>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white email">
                                                        <?= $email ?>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white region">
                                                        <?= $region ?>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white city">
                                                        <?= $city ?>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">


                                                        <input type="hidden" class="id_user" value="<?= $id ?>">
                                                        <b
                                                            class="text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit</b>

                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap ">
                                                        <form
                                                            onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                            action="UsersManagement.php"
                                                            class="text-red-500 dark:text-red-500 hover:underline ">
                                                            <input type="hidden" name="id_delete_user" value="<?= $id ?>">
                                                            <input class="cursor-pointer" type="submit" value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            endwhile;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- jkbij -->


        </section>
    </div>

    <dialog id="add_user" class="w-3/4 h-5/6 dark:bg-gray-800">
        
            <div class="w-auto flex justify-end m-2 h-10">

                <svg id="close_btn" className="w-[31px] h-[31px] m-2 text-gray-800 cursor-pointer dark:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                
            </div>
            <h2 class="dark:text-white text-2xl  text-center font-bold">Add User</h2>

     <div class="flex justify-center" >
            <form method="get" class="h-auto w-auto flex-grow flex flex-col gap-6 align-middle p-6  ">
                <input class="border-2 shadow h-10" type="text" placeholder="username" name="username" required>
                <input class="border-2 shadow h-10" type="text" placeholder="password"  name="password" required>
                <input class="border-2 shadow h-10" type="email" placeholder="email"  name="email" required>
          <select class="border-2 shadow h-10 w-40" name="region" required >
          <option selected disabled>region</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($region_res)):
            $region_nom=$res_fetch['nom'];
            $region_id=$res_fetch['id'];
            ?>
             <option value="<?=$region_id?>"><?=$region_nom?></option>
             <?php endwhile; ?>
          
          </select>

          <select class="border-2 shadow h-10 w-40" name="city" required >
          <option selected disabled >city</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($city_res)):
            $city_nom=$res_fetch['nom'];
            $city_id=$res_fetch['id'];
            ?>
             <option value="<?=$city_id?>"><?=$city_nom?></option>
             <?php endwhile; ?>
          
          </select>

           <input class="w-40 bg-blue-500 px-4 py-2" type="submit" value="submit">
           </form>
        </div>
        </div>
       
    </dialog>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/dashUser.js"></script>
</body>

</html>