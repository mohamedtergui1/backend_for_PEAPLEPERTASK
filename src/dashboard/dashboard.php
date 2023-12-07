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
 

$qeury = "SELECT COUNT(id) as n_users FROM users";
$number_of_users = mysqli_query($cnx, $qeury);
$number_of_users = mysqli_fetch_assoc($number_of_users)["n_users"];
$qeury = "SELECT COUNT(id) as n_freelancers from users WHERE role = 'freelancer'";
$number_of_freelancer = mysqli_query($cnx, $qeury);
$number_of_freelancer = mysqli_fetch_assoc($number_of_freelancer)["n_freelancers"];
$qeury = "SELECT COUNT(id) as n_projects FROM projects ";
$number_of_project = mysqli_query($cnx, $qeury);
$number_of_project = mysqli_fetch_assoc($number_of_project)["n_projects"];
$qeury = "SELECT COUNT(id) as n_testimonials FROM temoignages";
$number_of_testimonials = mysqli_query($cnx, $qeury);
$number_of_testimonials = mysqli_fetch_assoc($number_of_testimonials)["n_testimonials"];
$qeury = "SELECT city.nom as city , COUNT(projects.id) as number_of_projects FROM city INNER JOIN projects INNER JOIN users ON
    city.id=users.city_id and users.id=projects.usersID
    GROUP BY city.id";
$statstique_project_by_city = mysqli_query($cnx, $qeury);
$qeury = "SELECT city.nom as city , COUNT(users.id) as number_users FROM users INNER JOIN city ON  users.city_id = city.id
    GROUP BY city.id";
$statstique_users_by_city = mysqli_query($cnx, $qeury);
$qeury = "SELECT city.nom AS city , COUNT(users.id) as number_of_freelnacer FROM  city INNER JOIN users
ON   users.city_id = city.id WHERE role = 'freelancer'
GROUP BY city.id ";
$statstique_freelancer_by_city = mysqli_query($cnx, $qeury);
$qeury="SELECT (COUNT(users.id)/(SELECT COUNT(id)  from users WHERE role = 'user')) as pourcentage from users WHERE role = 'freelancer'";
$pourcentage =mysqli_fetch_assoc(mysqli_query($cnx,$qeury))["pourcentage"];

?>
<!doctype html>
<html>

<head>
  <title>dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../dist/output.css" rel="stylesheet">

</head>

<body class="overflow-x-hidden  ">
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

      <section class="flex flex-col">
        <h1 class="text-4xl text-center font-bold">DashBoard</h1>
        <!-- start statistique section -->

        <section class="  flex flex-wrap justify-center gap-2 py-7  ">
          <div
            class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold ">number of users</h4>
            <p class="font-bold text-4xl">
              <?= $number_of_users ?>
            </p>
            <span>users/freelancers</span>
           
             
           <span class="text-custom-green"> <?= $pourcentage."%"?></span>
       
          </div>
          <div
            class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold ">number of freelancer</h4>
            <p class="font-bold text-4xl">
              <?= $number_of_freelancer ?>
            </p>
            <span>freelancers/users</span>
           
             
              <span class="text-custom-green"> <?= $pourcentage."%"?></span>
          
           
          </div>
          <div
            class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold "> number of project</h4>
            <p class="font-bold text-4xl">
              <?= $number_of_project ?>
            </p>
            <span class="text-custom-green">
              +10%
            </span>
          </div>
          <div
            class="shadow-lg text-center  w-2/3 sm:w-2/5 bg-gray-50 flex flex-col  gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold ">number of testimonials</h4>
            <p class="font-bold text-4xl">
              <?= $number_of_testimonials ?>
            </p>
            <span class="text-red-600">
              -0.08%
            </span>
          </div>

        </section>
        <!-- end statistique section -->

      </section>

      <section class="flex justify-center gap-8 flex-col p-2  dark:bg-gray-900 dark:text-white">
        <h3 class="text-center text-xl font-bold"> project By City</h3>
        <div class="flex flex-col border dark:text-black dark:bg-slate-400  ">
          <ul class="flex justify-around bg-slate-500 text-white py-3">
            <li class="font-bold">CITY</li>
            <li class="font-bold">TOTAL PEOJECTS</li>
          </ul>

          <?php
          while ($row1 = mysqli_fetch_assoc($statstique_project_by_city)):
            $city = $row1['city'];
            $number_of_projects = $row1['number_of_projects'];
            ?>
            <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">

              <li class="w-1/2">
                <?= $city ?>
              </li>
              <li class="w-1/2">
                <?= $number_of_projects ?>
              </li>

            </ul>
          <?php endwhile; ?>

        </div>
      </section>



      <section class="flex justify-center gap-8 flex-col p-2 dark:bg-gray-900 dark:text-white">
        <h3 class="text-center text-xl font-bold"> Users By City</h3>

        <div class="flex flex-col border dark:text-black ">
          <ul class="flex justify-around bg-slate-500 text-white py-3">

            <li class="font-bold">CITY</li>
            <li class="font-bold">TOTAL USERS</li>
          </ul>
          <?php
          while ($row2 = mysqli_fetch_assoc($statstique_users_by_city)):
            $city2 = $row2['city'];
            $number_users2 = $row2['number_users'];
            ?>
              <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">

           
              <li class="w-1/2">
                <?= $city2 ?>
              </li>
              <li class="w-1/2">
                <?= $number_users2 ?>
              </li>
              </ul>
            <?php endwhile; ?>
          </ul>
        </div>
      </section>
      <section class="flex justify-center gap-8 flex-col p-2 dark:bg-gray-900 dark:text-white">
        <h3 class="text-center text-xl font-bold"> freelancers By City</h3>
        <div class="flex flex-col border dark:text-black ">
          <ul class="flex justify-around bg-slate-500 text-white py-3">
            <li class="font-bold">CITY</li>
            <li class="font-bold">TOTAL freelancers</li>
          </ul>
          <?php 
          while($row3=mysqli_fetch_assoc($statstique_freelancer_by_city)):
            $city3=$row3['city'];
            $number_of_freelnacer=$row3['number_of_freelnacer'];

        
          ?>
          <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
            <li class="w-1/2"><?=$city3?></li>
            <li class="w-1/2"><?=$number_of_freelnacer?></li>
          </ul>
    <?php
    endwhile; ?>

        </div>
      </section>
    </div>

  </div>



  <script src="../../javascript/jquery.js"></script>
  <script src="../../javascript/dashboard.js"></script>
  <script src="../../javascript/script.js"></script>
</body>

</html>