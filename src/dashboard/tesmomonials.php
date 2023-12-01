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
$qeury = "SELECT temoignages.id as id, TemoignagesComment,users.username as user FROM temoignages INNER JOIN users ON users.id=temoignages.usersID";
$testomonials=mysqli_query($cnx,$qeury);

$query_users="SELECT id, username FROM users";

$result=mysqli_query($cnx,$query_users);
if(isset($_GET['user'])&&isset($_GET['comment'])){

    $user=$_GET['user'];
    $comment=$_GET['comment'];

    $query="INSERT INTO temoignages(TemoignagesComment,usersID) VALUES (' $comment',$user)";
    $run_qeury=mysqli_query($cnx,$query);
    header('Location:tesmomonials.php');
}
else if (isset($_GET['id_delete'])){
    $query="DELETE FROM temoignages WHERE id=$_GET[id_delete]";
    $run_qeury=mysqli_query($cnx,$query);
    header('Location:tesmomonials.php');
}
?>
<!doctype html>
<html>

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../dist/output.css" rel="stylesheet">

</head>

<body class="overflow-x-hidden dark:bg-gray-900 ">

    <body class="overflow-x-hidden dark:bg-gray-900 ">
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
            <h3 class="text-center text-xl pt-2 font-bold">testimonials</h3>
            <div class="flex p-4 gap-6 justify-center flex-col">

                    <div
                        class=" shadow-sm rounded-lg gap-2 bg-slate-200  dark:text-black dark:bg-slate-700 p-5  flex flex-col md:flex-row justify-around items-center ">
                        <div class=" shadow-sm rounded-lg gap-2 bg-slate-100 dark:text-white dark:bg-slate-700 p-5  flex flex-col items-center">
                            <h2 class="text-xl font-semibold ">Add testomonials</h2>
                            <div class="flex   gap-4">
                                <form method="GET" >
                                    <input id="value_add_cetegory" name="comment"
                                        class=" rounded-md p-1  border-2 dark:text-black" type="text"
                                        placeholder="name of category" required>
                                        <select class="border-2 shadow h-10 w-40   rounded-md p-1   dark:text-black"  name="user" required >
          <option selected disabled>user</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($result)):
            $user_nom=$res_fetch['username'];
            $user_id=$res_fetch['id'];
            ?>
             <option value="<?=$user_id?>"><?=$user_nom?></option>
             <?php endwhile; ?>
          
          </select> 
                                    <input id="btn_add_cetegory" type="submit" value="ADD"
                                        class="bg-gray-50 p-2 rounded-md cursor-pointer dark:text-black">
                                </form>
                            </div>
                        </div>

                    </div>
                  
                </div>
            <section class="flex justify-center gap-8 flex-col p-2  dark:bg-gray-900 dark:text-white">
        
        <div class="flex flex-col border bg-slate-100 dark:text-black dark:bg-slate-700  ">
          <ul class="flex justify-around bg-slate-50  dark:text-white py-3">
            <li class="font-bold">users</li>
            <li class="font-bold">comment</li>
            <li>vide</li>
          </ul>
           <?php
                while($row=mysqli_fetch_assoc($testomonials)):
                 $TemoignagesComment=$row["TemoignagesComment"];
                 $user=$row["user"];
                 $id=$row["id"];

           ?>
         
            <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
                  
              <li class="w-1/2">
              <?=$user?>
              </li>
              <li class="w-1/2">
              <?=$TemoignagesComment?>
              </li>
              <li class="w-1/2 text-red-500">
               <a href="tesmomonials.php?id_delete=<?=$id?>">Delete</a>
               </li>

            </ul>
          <?php 
             endwhile;
          ?>

        </div>
      </section>
        </div>
        </div>
        <!-- en modal sub category -->
        <script src="../../javascript/jquery.js"></script>
        <script src="../../javascript/dashboard.js"></script>
        
       


    </body>

</html>