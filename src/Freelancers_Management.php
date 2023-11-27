<?php
require("cnx.php");
$qeury = "SELECT id, freelandersNAME, freelanderCompetences FROM freelances";
$res=mysqli_query($cnx,$qeury);
$query_users="SELECT users.id AS id, username FROM users LEFT JOIN freelances ON users.id = freelances.usersID WHERE freelances.usersID IS NULL 
UNION 
SELECT freelances.usersID AS id, NULL AS username FROM freelances LEFT JOIN users ON freelances.usersID = users.id WHERE users.id IS NULL;";

$result=mysqli_query($cnx,$query_users);


if(isset($_GET['id_delete_freelanxer'])){
    $id=$_GET['id_delete_freelanxer'];
    $qeury="DELETE FROM freelances WHERE id = $id";
    $runQeury=mysqli_query($cnx,$qeury);
    header("Location:Freelancers_Management.php");
}
else if(isset($_GET['name'])&&isset($_GET['competence'])&&isset($_GET['user'])){
    $id_user=$_GET['user'];
    $name=$_GET['name'];
    $competence=$_GET['competence'];
    $qeury_add="INSERT INTO freelances( freelandersNAME, freelanderCompetences, usersID) VALUES ('$name','$competence', $id_user)";
    $Resultat=mysqli_query($cnx,$qeury_add);
    header("Location:Freelancers_Management.php");
}
else if(isset($_GET['new_competence'])&&isset($_GET['new_name'])&&isset($_GET['id_edit_freelancer'])){
    $id_user=$_GET['id_edit_freelancer'];
    $name=$_GET['new_name'];
    $competence=$_GET['new_competence'];
    $query_edit="UPDATE freelances SET freelandersNAME='$name',freelanderCompetences='$competence' WHERE id = $id_user ";
    $run_edit_qeury=mysqli_query($cnx,$query_edit);
    header("Location:Freelancers_Management.php");
}
else if (isset($_GET['delete_all'])){
    if($_GET['delete_all']='true'){
    $delete_qeury="DELETE FROM freelances ";
    $run_qeury=mysqli_query($cnx,$delete_qeury);
    header("Location:Freelancers_Management.php");
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
            <h1 class="font-bold text-4xl text-center mt-5">Freelancers Management</h1>

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
                                                    NAME
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    freelanderCompetences
                                                </th>
                                                
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    <span class="sr-only cursor-pointer " id="btn_add_freelancer"><svg
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
                                                        onsubmit="return confirm('Are you sure you want to delete all freelancers?');"
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
                                            while ($row = mysqli_fetch_assoc($res)):
                                                $id = $row['id'];
                                                $freelandersNAME = $row['freelandersNAME'];
                                                $freelanderCompetences = $row['freelanderCompetences'];
                                               
                                                ?>
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td
                                                        class="freelandersNAME py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white username"><?=$freelandersNAME?></td>
                                                    <td
                                                        class="freelanderCompetences py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white password"><?=$freelanderCompetences?></td>
                                                           
                                                    
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">


                                                        <input type="hidden" class="id_freelancer" value="<?=$id?>">
                                                        <b
                                                            class="text-blue-600 dark:text-blue-500 hover:underline cursor-pointer edit_freelancer_btn">Edit</b>

                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap ">
                                                        <form
                                                            onsubmit="return confirm('Are you sure you want to delete this freelancer?');"
                                                           method="get"
                                                            class="text-red-500 dark:text-red-500 hover:underline ">
                                                            <input type="hidden" name="id_delete_freelanxer" value="<?= $id ?>">
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
<!-- modal add -->
    <dialog id="add_freelancer" class="w-3/4 h-5/6 dark:bg-gray-800">
        
            <div class="w-auto flex justify-end m-2 h-10">

                <svg id="close_btn" className="w-[31px] h-[31px] m-1 text-gray-800 cursor-pointer dark:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                
            </div>
            <h2 class="dark:text-white text-2xl  text-center font-bold">Add Freelancer</h2>
     <div class="flex justify-center" >
            <form method="get" class="h-auto w-auto flex-grow flex flex-col gap-6 align-middle p-6  ">
                <input class="border-2 shadow h-10" type="text" placeholder="name" name="name" required>
                <input class="border-2 shadow h-10" type="text" placeholder="competence"  name="competence" required>
               
          <select class="border-2 shadow h-10 w-40" name="user" required >
          <option selected disabled>user</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($result)):
            $user_nom=$res_fetch['username'];
            $user_id=$res_fetch['id'];
            ?>
             <option value="<?=$user_id?>"><?=$user_nom?></option>
             <?php endwhile; ?>
          
          </select> 

          
           <input class="w-40 bg-blue-500 px-4 py-2" type="submit" value="submit">
           </form>
        </div>
        </div>
       
    </dialog>
    <!-- modal edit -->
    <dialog id="edit_freelancer" class="w-3/4 h-5/6 dark:bg-gray-800">
        
            <div class="w-auto flex justify-end m-2 h-10">

                <svg id="close_btn_edit" className="w-[31px] h-[31px] m-1 text-gray-800 cursor-pointer dark:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                
            </div>
            <h2 class="dark:text-white text-2xl  text-center font-bold">Edit Freelancer</h2>
     <div class="flex justify-center" >
            <form method="get" class="h-auto w-auto flex-grow flex flex-col gap-6 align-middle p-6  ">
                <input id="id_form" name="id_edit_freelancer" type="hidden" value="">
                <input class="border-2 shadow h-10" id="name_form" type="text" placeholder="new name" name="new_name" required>
                <input class="border-2 shadow h-10" id="competence_form" type="text" placeholder="new competence"  name="new_competence" required>

           <input class="w-40 bg-blue-500 px-4 py-2" type="submit" value="submit">
           </form>
        </div>
        </div>
       
    </dialog>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>

   <script src="../javascript/freelancer.js"></script>
   
</body>

</html>