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
 

$qeury = "SELECT  categories.name as name, COUNT(souscategories.categoriesID)  as number_of_sub_catgoty , categories.id as  id
FROM categories
LEFT JOIN souscategories ON categories.id = souscategories.categoriesID
GROUP BY categories.id
ORDER BY categories.id desc
;
";
$qeury_CATEGORY = "SELECT souscategories.id as id_sub ,name,souscategoriesNAME FROM categories INNER JOIN souscategories
ON categories.id = souscategories.categoriesID 
ORDER BY souscategories.id desc
 ";
$categories = mysqli_query($cnx, $qeury);
$categoriesA = mysqli_query($cnx, $qeury);
$Subcategories = mysqli_query($cnx, $qeury_CATEGORY);



mysqli_close($cnx);
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
    <div class="fixed w-full bg-slate-500 z-50"  style="height:80vh; width:40vh; top: 25%; left:2%; z-indzx:100" id="search" >
           
        </div>
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

            <section class="flex flex-col py-8 flex-grow dark:bg-gray-900 dark:text-white">
                <h1 class="text-3xl text-center font-bold">Category Management</h1>
                <div class="flex p-4 gap-6 justify-center flex-col">
                    <div
                        class=" shadow-sm rounded-lg gap-2 bg-slate-500 p-5  flex flex-col md:flex-row justify-around items-center ">
                        <div class=" shadow-sm rounded-lg gap-2 bg-slate-500 p-5  flex flex-col items-center">
                            <h2 class="text-xl font-semibold text-white">Add Category</h2>
                            <div class="flex   gap-4">


                                <form method="post" action="script/script_category.php" enctype="multipart/form-data"  >
                                    <input id="value_add_cetegory" name="nom_cetegoty_add"
                                        class=" rounded-md p-1  border-2 dark:text-black" type="text"
                                        placeholder="name of category" required>
                                    <input type="file" name="image" enctype="multipart/form-data">
                                    <input id="btn_add_cetegory" type="submit" name="submit"
                                        class="bg-gray-50 p-2 rounded-md cursor-pointer dark:text-black">
                                        
                                </form>
                            </div>
                        </div>

                    </div>
                    <div id="parent_of_categories" class="flex flex-col border">
                        <ul
                            class="flex  text-center text-white items-center bg-slate-500 dark:bg-gray-800 dark:text-white">
                            <li class="w-2/3  text-xs md:text-lg p-4 ">NAME OF CATEGORY</li>
                            <li class="w-1/3 text-xs md:text-lg p-4 ">NUMBER OF SUB CATEGORIES</li>
                            <li class="w-1/3 text-xs md:text-lg p-4 ">
                                &nbsp;
                            </li>
                        </ul>
                        <?php
                        while ($row = mysqli_fetch_assoc($categories)):
                            $id_category = $row['id'];
                            $name_category = $row['name'] 
                             ?>
                        <ul class="category flex text-center items-center dark:bg-gray-700 dark:text-white">
                            <li class="w-2/3 text-xs md:text-lg p-4 category_old_value"><?=$name_category?></li>
                            <li class="w-1/3 text-xs md:text-lg p-4 ">
                            <?=$row['number_of_sub_catgoty']?>
                            </li>
                            <li class="w-1/3 text-xs flex justify-around md:text-lg p-4">
                                     <input type="hidden" class="edit_category_hidden" name="id_vluei_idcategory" value="<?=$id_category?>">
                                     <input   type="submit" class="btn_edit_category  text-blue-500 cursor-pointer" value="Edit">
                                <form onsubmit="return confirm('Are you sure you want to delete this category?');" method="get" action="script/script_category.php" >
                                <input type="hidden"  name="id_cate" value="<?=$id_category?>">
                                    <input type="submit" class="text-red-500 btn_delete_category cursor-pointer " value="Delete">
                                </form>
                            </li>
                          </ul>
                          <?php
                        endwhile;
                        ?>
                    </div>
                </div>
                <h1 class="text-3xl text-center font-bold mt-5">Sub Category Management</h1>
                <div class="flex p-4 gap-6 justify-center flex-col">
                    <div class=" shadow-sm rounded-lg gap-2 bg-slate-500 p-5  flex flex-col items-center">
                        <h2 class="text-xl font-semibold text-white">Add Sub Category</h2>
                        <div class="flex   gap-4">
                            <form method="GET" action="script/script_category.php">
                                <input id="value_add_cetegory" name="nom_cetegoty_"
                                    class=" rounded-md p-1  border-2 dark:text-black" type="text"
                                    placeholder="name of sous category" required>
                                <select name="categorie_select"
                                    class="dark:bg-gray-50 bg-gray-50 p-2 rounded-md cursor-pointer text-black dark:text-black"
                                    id="">
                                    <?php
                                    while ($rowA = mysqli_fetch_assoc($categoriesA)) {
                                        echo "<option value=\"".$rowA['id']."\">
                                                    ".$rowA['name']." 
                                                    </option>";
                                     }
                                    ?>
                                </select>
                                <input id="btn_add_cetegory" type="submit" value="ADD"
                                    class="bg-gray-50 p-2 rounded-md cursor-pointer dark:text-black">
                            </form>
                        </div>
                    </div>
                    <div id="parent_of_categories" class="flex flex-col border">
                        <ul
                            class="flex  text-center text-white items-center bg-slate-500 dark:bg-gray-800 dark:text-white">
                            <li class="w-2/3  text-xs md:text-lg p-4 ">NAME OF Sub CATEGORY</li>
                            <li class="w-1/3 text-xs md:text-lg p-4 ">NAME OF CATEGORY</li>
                            <li class="w-1/3 text-xs md:text-lg p-4 ">
                                &nbsp;
                            </li>
                        </ul>

                        <?php
                        while ($rowB = mysqli_fetch_assoc($Subcategories)) :
                            $id_sub_category = $rowB['id_sub'];
                            ?>
                        <ul class="category flex text-center items-center dark:bg-gray-700 dark:text-white">
                            <li class="w-2/3 text-xs md:text-lg p-4 name_subcategory"><?=$rowB['souscategoriesNAME']?></li>
                            <li class="w-1/3 text-xs md:text-lg p-4">
                            <?= $rowB['name'] ?> 
                            </li>
                            <li class="w-1/3 text-xs flex justify-around md:text-lg p-4">
                                    <input class="hidden_input_id_value_subcategry" type="hidden" value="<?= $id_sub_category ?>">
                                    <input type="submit" class="btn_edit_sub_category  text-blue-500 cursor-pointer" value="Edit">
                                
                                <form onsubmit="return confirm('Are you sure you want to delete this sub category?');" action="script/script_category.php?id_sub_cetegoty=<?= $id_sub_category ?>"method="POST">
                                    <input type="submit" class="text-red-500 btn_delete_category cursor-pointer " value="Delete">
                                </form>
                            </li>
                          </ul>
                       <?php  
                       endwhile;
                        ?>
                    </div>

            </section>
        </div>
        <!-- modal edit category -->
        <dialog id="edit_caregory" class="  sm:w-2/3 w-full h-2/3  dark:bg-gray-800 dark:text-white">
            <div id="clse_btn_category_esdit" class="flex justify-end p-6 ">
                <svg class="cursor-pointer" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3L8.75 10.5M14.5 18L8.75 10.5M8.75 10.5L14.5 3L3 18" stroke="#FF0909"
                        stroke-width="7" />
                </svg>
            </div>
            <div class="flex flex-col justify-center items-center w-full h-2/3">
                <div class="flex  flex-col justify-items-center content-between gap-5 w-2/3 h-2/3 ">
                    <h1 class="text-center text-lg lg:text-2xl text-blue-600">EDIT CATEGORY</h1>
                    <form class="flex flex-col gap-2 w-5/6 sm:w-2/3 m-auto" action="script/script_category.php" method="GET">
                        <input type="hidden" name="edit_category_new_id" id="hidden_input_edit_category_from">
                        <input type="text" name="edit_category_new_name" id="input_submit_edit_cztegory" placeholder="enter new name"
                            class="border h-12 dark:text-black px-1 lg:text-lg">
                        <button type="submit" id="btn_submit_edit_cztegory"
                            class="bg-blue-600 border px-2 w-1/2 m-auto py-1">submit</button>
                    </form>
                </div>
            </div>
        </dialog>
        <!-- end modal edit category -->
        <!-- madal edit sub category -->
        <dialog id="edit_subcaregory" class="  sm:w-2/3 w-full h-2/3  dark:bg-gray-800 dark:text-white">
            <div id="clse_btn_sub_category_edit" class="flex justify-end p-6 ">
                <svg class="cursor-pointer" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3L8.75 10.5M14.5 18L8.75 10.5M8.75 10.5L14.5 3L3 18" stroke="#FF0909"
                        stroke-width="7" />
                </svg>
            </div>
            <div class="flex flex-col justify-center items-center w-full h-2/3">
                <div class="flex  flex-col justify-items-center content-between gap-5 w-2/3 h-2/3 ">
                    <h1 class="text-center text-lg lg:text-2xl text-blue-600">EDIT SUB CATEGORY</h1>
                    <form class="flex flex-col gap-2 w-5/6 sm:w-2/3 m-auto" action="script/script_category.php" method="GET">
                        <input type="hidden" name="edit_sub_category_new_id" id="hidden_input_edit_subcategory_from">
                        <input type="text" name="edit_sub_category_new_name" id="input_submit_edit_sub_category" placeholder="enter new name"
                            class="border h-12 dark:text-black px-1 lg:text-lg">
                        <button type="submit" id="btn_submit_edit_cztegory"
                            class="bg-blue-600 border px-2 w-1/2 m-auto py-1">submit</button>
                    </form>
                </div>
            </div>
        </dialog>

        
        <!-- en modal sub category -->
        <script src="../../javascript/jquery.js"></script>
        <script src="../../javascript/dashboard.js"></script>
        <script src="../../javascript/dashCategories.js"></script>
       
   <script>
    $(document).ready(function () {
    $("#search").hide();
    $("#input_search").keyup(function(){
      let search =  $("#input_search").val().trim();
       
           status.open('GET', `test.php?search=${search}`, true);
        //    status.setRequestHeader()
              status.send();
       
    })


      var status = new XMLHttpRequest();

        status.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // console.log(this.response);
        var resultat=JSON.parse(this.response);
        $("#search").html("");
        // console.log(resultat); 
        $("#search").show();
        console.log()
        if(resultat.length>0){
        resultat.forEach(res => { 
            $("#search").append( 
           ` <h1><a  href="www.google?city=${res}" > ${res}</a></h1>` 
        ); 
        })} else $("#search").html("<h1> N o result found </h1>");
       
    }
};
// $('#text_btn').hover(function(){
     
//     status.open('GET', 'test.php', true);
//     status.send();

// })


})
   </script>

    </body>

</html>