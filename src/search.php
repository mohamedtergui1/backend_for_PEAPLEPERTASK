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
$qeury = "SELECT projects.id as id, users.image as user_image, projectNAME, projrctDescription, users.username as user,name as categoryNAME,souscategoriesNAME , projects.image as image FROM projects INNER JOIN categories INNER JOIN souscategories INNER JOIN users ON  projects.categoriesID=categories.id and projects.souscategoriesID=souscategories.id and projects.usersID=users.id LIMIT 16";
$projects = mysqli_query($cnx, $qeury);
?>


<!doctype html>
<html>

<head>
  <title>search</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="stylesheet" href="input.css">
  <link rel="stylesheet" href="style.css">
  

</head>

<body class="overflow-x-hidden dark:bg-slate-900">
  <!-- Header -->
  <?php
  include("./include/header.php");
  ?>
  <!-- end Header -->

  <!-- fiha dik l categorie o nav-bar 2 li fih  la list -->
  <section class="dark:bg-slate-900">
    <div class="items-center gap-2 ml-8 h-8 md:hidden dark:bg-slate-800">
      <button id="btnlist" class="flex flex-row">
        <h1>Browse by Category</h1>
        <div class="m-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none">
            <path d="M1 1L7 8.5L13 1" stroke="#05C50D" />
          </svg>
        </div>
      </button>
    </div>

    <ul id="list" class="block justify-around text-xs bg-gray-100 p-3 md:flex lg:flex dark:bg-slate-800">
      <a href="">
        <li class="mt-2">Technology & Programming</li>
      </a>
      <a href="">
        <li class="mt-2">Writing & Translation</li>
      </a>
      <a href="">
        <li class="mt-2">Design</li>
      </a>
      <a href="">
        <li class="mt-2">Digital Marketing</li>
      </a>
      <a href="">
        <li class="mt-2">Video, Photo & Image</li>
      </a>
      <a href="">
        <li class="mt-2">Business</li>
      </a>
      <a href="">
        <li class="mt-2">Music & Audio</li>
      </a>
      <a href="">
        <li class="mt-2">Marketing, Branding & Sales</li>
      </a>
      <a href="">
        <li class="mt-2">Social Media</li>
      </a>
    </ul>
  </section>
  <!-- hadi fiha dik recherche o selecte -->
  <section class="flex flex-col gap-4 lg:flex-row  m-6  ">
    <form class="flex md:justify-start justify-center items-end w-full ">
      <div class="relative  md:w-full  lg:w-full   ">
        <input type="text" id="search" name="hero-field" placeholder="rechrcher"
          class="h-14 w-full drop-shadow-md bg-white rounded-l-lg border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out" />
      </div>
      <button
        class="h-14 w-1/8 inline-flex text-white bg-custom-green++ border-0 py-2 px-6 focus:outline-none bg-custom-green- rounded-r-lg text-lg items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path
            d="M17.707 16.293L20.707 19.293C20.8807 19.4726 20.9877 19.7177 20.9877 19.9877C20.9877 20.54 20.54 20.9877 19.9877 20.9877C19.7177 20.9877 19.4726 20.8807 19.2927 20.7067L19.293 20.707L16.293 17.707C16.1193 17.5274 16.0123 17.2823 16.0123 17.0123C16.0123 16.46 16.46 16.0123 17.0123 16.0123C17.2823 16.0123 17.5273 16.1193 17.7073 16.2933L17.707 16.293ZM9.99999 1.99999C14.4183 1.99999 18 5.58171 18 9.99998C18 14.4183 14.4183 18 9.99999 18C5.58172 18 2 14.4183 2 9.99998C2 5.58171 5.58172 1.99999 9.99999 1.99999ZM9.99999 4.00001C6.68628 4.00001 3.99999 6.6863 3.99999 10C3.99999 13.3137 6.68628 16 9.99999 16C13.3137 16 16 13.3137 16 10C16 6.6863 13.3137 4.00001 9.99999 4.00001Z"
            fill="white" />
        </svg>
      </button>
    </form>
    <form class="flex  md:justify-start justify-center items-end">
      <div class="relative w-1/2  m-auto md:w-full lg:w-full  ">
        <select type="text" id="tags"
          class="h-14 w-full m-auto drop-shadow-md bg-white rounded-md border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out">
          <option value="" selected disabled>filter by tag</option>
          <?php 
                if(mysqli_num_rows($tags) > 0) :
                  while($row_tag = mysqli_fetch_assoc($tags)) :
                   $id= $row_tag['id'];
                   $tag = $row_tag['tag'];
          ?>
          <option value="<?=$id?>" ><?=$tag?></option>
          <?php endwhile; endif;  ?>
        </select>
      </div>
    </form>
  </section>

  <div id="parent" class="w-full px-10  flex flex-wrap justify-center">
    <?php
    if (mysqli_num_rows($projects) > 0):
      while ($project = mysqli_fetch_assoc($projects)):
        $project_id = $project['id'];
        $project_name = $project['projectNAME'];
        $project_image = $project['image'];
        $project_descption = $project['projrctDescription'];
        $project_user = $project['user'];
        $project_category = $project['categoryNAME'];
        $project_sub_cete = $project['souscategoriesNAME'];
        $user_image = $project['user_image'];
        ?>
        <li
          class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-1/5 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2 p-2">
          <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"><img class="w-full h-full"
              src="../images/projects/<?= $project_image ?>" alt=""></div>

          <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between p-2 rounded-md">
            <div class="flex flex-row p-3 items-center gap-0.5">
              <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg">
                <?= $project_name ?>
              </h3>
            </div>
            <div class="flex flex-col gap-y-3">
              <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                  <?= $project_category ?>
                </a>
                <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                  <?= $project_sub_cete ?>
                </a>
                <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                  ...
                </a>
              </div>

              <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                <div class="flex flex-row gap-x-2 items-center">
                  <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/users/<?= $user_image ?>"
                    alt="offers Freelancer photo">
                  <div class="flex flex-col">
                    <p>by <strong class="freelancer-name font-semibold">
                        <?= $project_user ?>
                      </strong></p>
                    <div class="flex flex-row items-center -mt-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                        <path
                          d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                          fill="#FFB331" />
                      </svg>
                      <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p class="reviews text-gray-400">
                      </p>)
                    </div>
                  </div>
                </div>
                <div>
                  <p class="price text-gray-900 dark:text-slate-100 font-semibold"></p>
                </div>
              </div>

              <div class="border-t border-gray-200 px-3 py-1 box-content">
                <p class="dilevered-days text-xs text-gray-400"></p>
              </div>
            </div>
            <div class="flex justify-center">
              <?php
              if (isset($_SESSION['role'])):
                if ($_SESSION['role'] == 'freelancer') {


                  ?>
                  <button type="button" class="bg-blue-500 py-2 px-3 rounded-md ">Aplly offer</button>
                <?php }endif; ?>
            </div>
          </div>

        </li>
      <?php endwhile; endif; ?>
  </div>


  <?php
  include("./include/footer.php");
  ?>


  <script src="../javascript/jquery.js"></script>
  <!-- <script>
    $(document).ready(function () {

      $("#search").keydown(function () {
        let search = $("#search").val().trim();
        $.post("../ajax/ajax.search.php",{ search:search} ,function (reponse, status) {
          var resultat = JSON.parse(reponse);

             if (status === 'success'){ 
                $("#parent").html("");
          resultat.forEach(res => {
            console.log(res)
            $("#parent").append( `
              <li
            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-1/5 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2 p-2">
            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"><img class="w-full h-full" src="../images/offers/${res.image}" alt=""></div>

            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between p-2 rounded-md">
              <div class="flex flex-row p-3 items-center gap-0.5">
                <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg"> ${res.projectNAME}</h3>
              </div>
              <div class="flex flex-col gap-y-3">
                <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                  
                  </a>
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                    
                  </a>
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                    ...
                  </a>
                </div>

                <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                  <div class="flex flex-row gap-x-2 items-center">
                    <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/users/${res.user_image}" alt="offers Freelancer photo">
                    <div class="flex flex-col">
                      <p>by <strong class="freelancer-name font-semibold">${res.user}</strong></p>
                      <div class="flex flex-row items-center -mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                          <path
                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                            fill="#FFB331" />
                        </svg>
                        <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                          class="reviews text-gray-400"></p>)
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="price text-gray-900 dark:text-slate-100 font-semibold"></p>
                  </div>
                </div>

                <div class="border-t border-gray-200 px-3 py-1 box-content">
                  <p class="dilevered-days text-xs text-gray-400"></p>
                </div>
              </div> 
                  </div>
                
                </li>
              
              `)
          
          });
       }
        })
      })
    })      
  </script> -->
  <script>
$(document).ready(function () {
  $("#search").on('input', function () {
    let search = $(this).val().trim();
    let tag = $("#tags").val();
    $.ajax({
      url: "../ajax/ajax.search.php",
      method: "POST",
      data: { search: search , tag:tag},
      dataType: "json",
      success: function (resultat) {
        $("#parent").html("");
        resultat.forEach(res => {
          $("#parent").append(`
              <li
            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-1/5 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2 p-2">
            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"><img class="w-full h-full" src="../images/projects/${res.image}" alt=""></div>

            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between p-2 rounded-md">
              <div class="flex flex-row p-3 items-center gap-0.5">
                <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg"> ${res.projectNAME}</h3>
              </div>
              <div class="flex flex-col gap-y-3">
                <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                  
                  </a>
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                    
                  </a>
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                    ...
                  </a>
                </div>

                <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                  <div class="flex flex-row gap-x-2 items-center">
                    <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/users/${res.user_image}" alt="offers Freelancer photo">
                    <div class="flex flex-col">
                      <p>by <strong class="freelancer-name font-semibold">${res.user}</strong></p>
                      <div class="flex flex-row items-center -mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                          <path
                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                            fill="#FFB331" />
                        </svg>
                        <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                          class="reviews text-gray-400"></p>)
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="price text-gray-900 dark:text-slate-100 font-semibold"></p>
                  </div>
                </div>
                
                <div class="border-t border-gray-200 px-3 py-1 box-content">
                  <p class="dilevered-days text-xs text-gray-400"></p>
                </div>
              </div> 
              <div class="flex justify-center">
                <?php
                if(isset($_SESSION['role'])):
                    if($_SESSION['role']=='freelancer'){
               
                
                ?>
            <button type="button" class="bg-blue-500 py-2 px-3 rounded-md " value="${res.id}"  >Aplly offer</button>
           <?php }endif; ?>
            </div>
                  </div>
                
                </li>
              
              `);
        });
      },
      error: function (xhr, status, error) {
        // console.error("AJAX request failed:", status, error);
        $("#parent").html(`<div class="bg-red-500  text-centre p-3 h-10 rounded-md" role="alert"style="width:50%;" >
 <b>no result found</b>
</div>`);
      }
    });
  });
});


  </script>
  <script src="../javascript/script.js"></script>
  <!-- <script src="../javascript/serch.js"></script> -->
</body>

</html>