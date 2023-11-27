<?php
require("cnx.php");
$qeury_select_project = "SELECT projects.id as id, projectNAME, projrctDescription, users.username ,name as categoryNAME,souscategoriesNAME  FROM projects INNER JOIN categories INNER JOIN souscategories INNER JOIN users ON  projects.categoriesID=categories.id and projects.souscategoriesID=souscategories.id and projects.usersID=users.id";
$res_project = mysqli_query($cnx, $qeury_select_project);

$query_users = "SELECT  id, username FROM users";
$result_user = mysqli_query($cnx, $query_users);;
$qeury_category = "SELECT id,name FROM categories";
$result_category = mysqli_query($cnx, $qeury_category);
$qeury_subcategory = "SELECT id,souscategoriesNAME FROM souscategories";
$result_sub_category = mysqli_query($cnx, $qeury_subcategory);
if (isset($_GET['name_project']) && $_GET['description'] && $_GET['user'] && $_GET['category'] && $_GET['sub_category']) {
    $name_project = $_GET['name_project'];
    $description = $_GET['description'];
    $user = $_GET['user'];
    $category = $_GET['category'];
    $sub_category = $_GET['sub_category'];
    $qeury_add = "INSERT INTO projects(projectNAME, projrctDescription, categoriesID, souscategoriesID, usersID) VALUES ('$name_project',' $description',$category,$sub_category,$user)";
    $run_add = mysqli_query($cnx, $qeury_add);
    header("Location:projects_management.php");
}
else if(isset($_GET['id_delete_project'])){
    $id_project=$_GET['id_delete_project'];
    $qeury_d=" DELETE FROM projects WHERE id= $id_project";
    $run_qeury=mysqli_query($cnx,$qeury_d);
    header("Location:projects_management.php");
}
else if(isset($_GET['delete_all'])){
    if($_GET['delete_all']='true'){
    $qeury_d=" DELETE FROM projects ";
    $run_qeury=mysqli_query($cnx,$qeury_d);
    header("Location:projects_management.php");
}
}
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
            <h1 class="font-bold text-4xl text-center mt-5">Projects Management</h1>

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
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    category
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    sub category
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    user
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                                    <span class="sr-only cursor-pointer " id="btn_add_project"><svg
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
                                                        onsubmit="return confirm('Are you sure you want to delete all projects?');"
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
                                            while ($row_ = mysqli_fetch_assoc($res_project)):
                                                $id = $row_['id'];
                                                $projectNAME = $row_['projectNAME'];
                                                $projrctDescription = $row_['projrctDescription'];
                                                $username = $row_['username'];
                                                $categoryNAME = $row_['categoryNAME'];
                                                $souscategoriesNAME = $row_['souscategoriesNAME'];
                                                ?>

                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td
                                                        class="projectNAME py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white username">
                                                        <?=$projectNAME?>
                                                    </td>
                                                    <td class="projrctDescription py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white password">
                                                        <?=$projrctDescription?>
                                                    </td>


                                                    <td class="username py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white username">
                                                        <?=$username?>
                                                    </td>
                                                    <td class="categoryNAME py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white password">
                                                        <?=$categoryNAME ?>
                                                    </td>


                                                    <td class="souscategoriesNAME py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white password">
                                                        <?= $souscategoriesNAME?>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">


                                                        <input type="hidden" class="id_freelancer" value="<?=$id?>">
                                                        <b
                                                            class="text-blue-600 dark:text-blue-500 hover:underline cursor-pointer edit_freelancer_btn">Edit</b>

                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap ">
                                                        <form
                                                            onsubmit="return confirm('Are you sure you want to delete this project?');"
                                                            method="get"
                                                            class="text-red-500 dark:text-red-500 hover:underline ">
                                                            <input type="hidden" name="id_delete_project"
                                                                value="<?=$id?>">
                                                            <input class="cursor-pointer" type="submit" value="Delete">
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php endwhile; ?>

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
    <dialog id="add_project" class="w-3/4 h-5/6 dark:bg-gray-800">

        <div class="w-auto flex justify-end m-2 h-10">

            <svg id="cls_btn" className="w-[31px] h-[31px] m-1 text-gray-800 cursor-pointer dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>

        </div>
        <h2 class="dark:text-white text-2xl  text-center font-bold">Add Projects</h2>
        <div class="flex justify-center">
            <form method="get" class="h-auto w-auto flex-grow flex flex-col gap-6 align-middle p-6  ">
                <input class="border-2 shadow h-10" type="text" placeholder="name" name="name_project" required>
                <textarea name="description" id="" cols="30" rows="6"></textarea>

                <select class="border-2 shadow h-10 w-40" name="user" required>
                    <option selected disabled>user</option>

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

                <select class="border-2 shadow h-10 w-40" name="category" required>
                    <option selected disabled>category</option>

                    <?php
                    while ($res_fetch = mysqli_fetch_assoc($result_category)):
                        $category_nom = $res_fetch['name'];
                        $category_id = $res_fetch['id'];
                        ?>
                        <option value="<?= $category_id ?>">
                            <?= $category_nom ?>
                        </option>
                    <?php endwhile; ?>

                </select>


                <select class="border-2 shadow h-10 w-40" name="sub_category" required>
                    <option selected disabled>sub category</option>

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
                <input class="w-40 bg-blue-500 px-4 py-2" type="submit" value="submit">
            </form>
        </div>
        </div>

    </dialog>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>

    <script src="../javascript/project.js"></script>

</body>

</html>