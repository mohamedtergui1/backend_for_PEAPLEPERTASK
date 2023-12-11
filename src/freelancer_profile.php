<?php
session_start();
require("./dashboard/cnx.php");


if(isset($_SESSION['role']) && isset($_SESSION['id_user'])) {
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
  $qeury_category = "SELECT id,name FROM categories";
  $result_category = mysqli_query($cnx, $qeury_category);
  $qeury_subcategory = "SELECT id,souscategoriesNAME FROM souscategories";
  $result_sub_category = mysqli_query($cnx, $qeury_subcategory);
  if(empty($image_user)) {
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


if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $qeury = "SELECT users.username,users.image as image, users.email as email
        , city.nom as city , regions.nom as region 
        FROM  users INNER JOIN city INNER JOIN regions
        ON  users.city_id=city.id and city.region_id = regions.id WHERE users.id = $id ";
  $res = mysqli_query($cnx, $qeury);
  $row = mysqli_fetch_array($res);

  $username = $row['username'];
  $image = $row['image'];
  $email = $row['email'];
  $freelancer_name = "";
  $freelancer_competence = "";
  $city = $row['city'];
  $region = $row['region'];
  // $name_user=$username;
  // $status="log-out";
  // $username_link="#";
  // $status_link="dashboard/script/script.php";

  $image = $row["image"];
  if(empty($image)) {
    $image = "no_photo.png";
  }
  // $status_image="block";
} else {
  $id = $_SESSION['id_user'];

  $qeury = "SELECT users.username,users.image as image, users.email as email
    , city.nom as city , regions.nom as region 
    FROM  users INNER JOIN city INNER JOIN regions
    ON  users.city_id=city.id and city.region_id = regions.id WHERE users.id = $id ";
  $res = mysqli_query($cnx, $qeury);
  $row = mysqli_fetch_array($res);

  $username = $row['username'];
  $image = $row['image'];
  $email = $row['email'];
  $freelancer_name = "";
  $freelancer_competence = "";
  $city = $row['city'];
  $region = $row['region'];
  // $name_user=$username;
  // $status="log-out";
  // $username_link="#";
  // $status_link="dashboard/script/script.php";

  $image = $row["image"];
  if(empty($image)) {
    $image = "no_photo.png";
  }
}
$query = "SELECT * from skills";
$res_skill = mysqli_query($cnx, $query);
if($id) {
  $id_2 = $id;
}
if(isset($_GET['id'])) {
  $id_2 = $_GET['id'];

}
$query = "SELECT skill , skills.id as id    FROM skills INNER JOIN pivot_skills INNER JOIN users ON users.id=pivot_skills.id_user AND	
  skills.id=pivot_skills.id_skill WHERE users.id = $id_2  ";
$skills = mysqli_query($cnx, $query);

$qeury = "SELECT id, tag FROM tags";
$res_tags = mysqli_query($cnx, $qeury);

//  get prjecct
$qeury = "SELECT projects.id as id, users.image as user_image, projectNAME, projrctDescription, users.username as 
user,name as categoryNAME,souscategoriesNAME , projects.image as image 
FROM projects INNER JOIN categories INNER JOIN souscategories INNER JOIN users ON  projects.categoriesID=categories.id 
and projects.souscategoriesID=souscategories.id and projects.usersID=users.id WHERE users.id = $id  LIMIT 16";
$projects = mysqli_query($cnx, $qeury);

// mysqli_close($cnx);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>profile with data and skills</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../dist/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/css">
    body {
      margin-top: 20px;
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;
    }

    .main-body {
      padding: 15px;
    }

    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
      background-color: #e2e8f0;
    }

    .h-100 {
      height: 100% !important;
    }

    .shadow-none {
      box-shadow: none !important;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="main-body">

      <!-- header -->
      <?php include("./include/header.php");
      ?>
      <div class="w-full h-5"></div>
      <div id="alert" class="fixed z-50  alert alert-success" style="top:10%; left:50%;" role="alert">
        A simple success alert—check it out!
      </div>
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="../images/users/<?= $image ?>" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>
                    <?= $freelancer_name ?>
                  </h4>
                  <p class="text-secondary mb-1">
                    <?= $freelancer_competence ?>
                  </p>
                  <p class="text-muted font-size-sm">
                    <?= $city." , ".$region ?>
                  </p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                  <button class="btn btn-outline-primary" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] :""     ?>" id="btn_testo" >add testomonials</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-globe mr-2 icon-inline">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path
                      d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                    </path>
                  </svg>Website</h6>
                <span class="text-secondary">https://peoplepertask.com</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-github mr-2 icon-inline">
                    <path
                      d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                    </path>
                  </svg>Github</h6>
                <span class="text-secondary">peoplepertask</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter mr-2 icon-inline text-info">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                    </path>
                  </svg>Twitter</h6>
                <span class="text-secondary" @peoplepertask></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-instagram mr-2 icon-inline text-danger">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                  </svg>Instagram</h6>
                <span class="text-secondary">peoplepertask</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                  </svg>Facebook</h6>
                <span class="text-secondary">peoplepertask</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">username</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $username ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                    data-cfemail="1a7c736a5a706f71776f72347b76">[
                    <?= $email ?>&#160;]
                  </a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  (239) 816-9029
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  (320) 380-4539
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $city." , ".$region ?>
                </div>
              </div>
              <hr>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Skills</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  if(mysqli_num_rows($res) > 0):
                    while($row3 = mysqli_fetch_assoc($skills)):
                      $skill1 = $row3['skill'];
                      $id1 = $row3['id'];
                      ?>
                      <button class="bg-blue-500 p-2 rounded-sm m-2" value="<?= $id1 ?>">
                        <?= $skill1 ?>
                      </button>

                      <?php
                    endwhile;
                  endif;
                  ?>
                </div>
              </div>
              <hr>

              <div class="row">

                <?php if(isset($_SESSION["id_user"]) && isset($_GET["id"])) {
                  if($_SESSION['id_user'] == $_GET["id"]) {
                    ?>
                    <div class="flex gap-5 p-47">
                      <div class=" col-sm-12">
                        <button class="mt-2  btn-info" id="btn_modal">Edit</button>
                      </div>

                      <div class=" col-sm-12">
                        <button class="mt-2 btn-info" id="btn_modal">Add Skills</button>
                      </div>
                      <div class=" col-sm-12">
                        <button onsubmit="return confirm('Are you sure you want to delete  you account?');"
                          style="background-color:red;" type="submit" class="mt-2 btn-info " value="<?= $id ?>"
                          id="delete">delete </button>
                      </div>
                    </div>
                    <?php
                  }
                } else if(isset($_SESSION["id_user"])) { ?>
                    <div class="flex gap-5  " style="width:14vw;">
                      <div class=" mt-2 col-sm-12">
                        <button id="btn_modal" class=" btn btn-info ">Edit</button>
                      </div>
                      <div class=" col-sm-12">
                        <button class="mt-2  btn-info" id="btn_modal_add">add project</button>
                      </div>
                      <div class=" col-sm-12">
                        <button onsubmit="return confirm('Are you sure you want to delete  you account?');"
                          style="background-color:red;" type="submit" class="mt-2 btn-info" value="<?= $id ?>"
                          id="delete">delete </button>
                      </div>
                    <?php if($_SESSION['role'] == 'freelancer') { ?>
                        <div class="mt-2 col-sm-12">
                          <button class="  p-2 rounded-sm btn-info" id="btn_modal_skill">Add Skills</button>
                        </div>
                      </div>
                  <?php }
                } ?>


              </div>
            </div>
          </div>
          <div class="row gutters-sm">

            <?php
            if(mysqli_num_rows($projects) > 0):
              while($project = mysqli_fetch_assoc($projects)):
                $project_id = $project['id'];
                $project_name = $project['projectNAME'];
                $project_image = $project['image'];
                $project_descption = $project['projrctDescription'];
                $project_user = $project['user'];
                $project_category = $project['categoryNAME'];
                $project_sub_cete = $project['souscategoriesNAME'];
                $user_image = $project['user_image'];
                ?>

                <li style="width:25vw;"
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
                      <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                        <?php
                        $tags_project = mysqli_query($cnx, "SELECT tags.id, tag FROM tags INNER JOIN pivot_tags 
                  INNER JOIN projects on projects.id = pivot_tags.id_project 
                  and pivot_tags.id_tag=tags.id WHERE projects.id = $project_id LIMIT 2");
                        if(mysqli_num_rows($tags_project) > 0) {
                          while($tag_ = mysqli_fetch_assoc($tags_project)) {
                            ?>
                            <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                              <?= $tag_['tag'] ?>
                            </a>

                          <?php }
                        } ?>
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
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                                fill="none">
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
                    <div class="flex justify-center gap-5">
                      <?php
                      if(isset($_SESSION['id_user']) && isset($_GET["id"])) {
                        if($_SESSION['id_user'] == $_GET["id"]) {

                          ?>
                          <button type="button" class="bg-blue-500 py-2 px-3 rounded-md btn_project_edit"
                            value="<?= $project_id ?>">Edit</button>
                          <button type="button" class="bg-red-500 py-2 px-3 rounded-md btn_project_dele"
                            value="<?= $project_id ?>">delete</button>
                          <button type="button" class="bg-green-500 py-2 px-3 rounded-md btn_offers"
                            value="<?= $project_id ?>">show offers</button>
                          <button type="button" class="bg-green-300 py-2 px-3 rounded-md btn_tags"
                            value="<?= $project_id ?>">add tags</button>
                        <?php } else { ?><button type="button" class="bg-blue-500 py-2 px-3 rounded-md btn_offerss"
                            value="<?= $project_id ?>">apply offer</button>
                        <?php }
                      } else if(isset($_SESSION['id_user'])) { ?>
                          <button type="button" class="bg-blue-500 py-2 px-3 rounded-md btn_project_edit"
                            value="<?= $project_id ?>">Edit</button>
                          <button type="button" class="bg-red-500 py-2 px-3 rounded-md btn_project_dele"
                            value="<?= $project_id ?>">delete</button>
                          <button type="button" class="bg-green-500 py-2 px-3 rounded-md btn_offers"
                            value="<?= $project_id ?>">show offers</button>
                          <button type="button" class="bg-green-300 py-2 px-3 rounded-md btn_tags"
                            value="<?= $project_id ?>">add tags</button>
                      <?php } ?>
                    </div>
                  </div>

                </li>


              <?php endwhile; endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php if(isset($_SESSION['id_user']) ) {
    if($_SESSION['role'] == 'freelancer') {  ?>
  <h1 class="text-3xl text-center font-bold " >your offres</h1>

  <div class="flex flex-wrap gap-5 p-10">
<?php 
  
    $user_id=$_SESSION['id_user'];
   $qeury="SELECT offres.id as id, projectNAME, projrctDescription, a.username, projects.image, offres.delay, offres.Offresprice, offres.status FROM projects 
   INNER JOIN offres INNER JOIN users a INNER JOIN users b on a.id=projects.usersID and offres.freelancer_id=b.id and projects.id=offres.projectsID where offres.freelancer_id=$user_id ";
   $offers_freelancer=mysqli_query($cnx,$qeury);
   if(mysqli_num_rows($offers_freelancer) > 0):
   while($offer_freelancer=mysqli_fetch_assoc($offers_freelancer)) :

?>



 

    <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?=$offer_freelancer['projectNAME']?></h5>
        <p class="card-text"><?=$offer_freelancer['projrctDescription']?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><?=$offer_freelancer['username']?></li>
        <li class="list-group-item"><?=$offer_freelancer['Offresprice']?></li>
        <li class="list-group-item"><?=$offer_freelancer['delay']?></li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link"><?=$offer_freelancer['status']?></a>
     
      </div>
    </div>
  
<?php endwhile; endif; } }?>

</div>





  <?php   include("./include/footer.php");
  ?>

























  <dialog id="modal" class="dark:bg-gray-800" style="width:80vw; height:80vh dark:bg-slate-500 padding:10rem">
    <div class="flex justify-end">

      <svg id="close_btn2" class="w-6 h-6 text-gray-800 m-2 dark:text-white" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    </div>

    <form class="max-w-sm mx-auto p-5 bg-slate-500 ">
      <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="text" id="fullname"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Full Name" required>
      </div>
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" id="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="name@flowbite.com" required>
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input type="password" id="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>

      <input type="submit" class="bg-blue-500 p-2 rounded-sm m-2 skill">


    </form>

  </dialog>

  <!-- modal add skils -->
  <dialog id="modal_tags" class="dark:bg-gray-800" style="width:80vw; height:80vh dark:bg-slate-500 padding:10rem">
    <div class="flex justify-end">
      <input id="hidden_input_tags" type="hidden" value="">
      <svg id="close_btn_tag" class="w-6 h-6 text-gray-800 m-2 dark:text-white" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    </div>
    <div class="h-auto w-auto flex justify-center ">
      <div class="" id="form_skills" style="padding:5%;">
        <?php
        if(mysqli_num_rows($res_skill) > 0):
          while($row = mysqli_fetch_array($res_skill)):
            $skill = $row['skill'];
            $id_skill = $row['id'];
            ?>

            <button class="bg-blue-500 p-2 rounded-sm m-2 tag" type="submit" value="<?= $id_skill ?>">
              <?= $skill ?>
            </button>


          <?php endwhile; endif; ?>



      </div>

    </div>

  </dialog>
  <dialog id="modal_skills" class="dark:bg-gray-800" style="width:80vw; height:80vh dark:bg-slate-500 padding:10rem">
    <div class="flex justify-end">

      <svg id="close_btn" class="w-6 h-6 text-gray-800 m-2 dark:text-white" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    </div>
    <div class="h-auto w-auto flex justify-center ">
      <div class="" id="form_skills" style="padding:5%;">
        <?php
        if(mysqli_num_rows($res_tags) > 0):
          while($row = mysqli_fetch_array($res_tags)):
            $tag = $row['tag'];
            $id_tag = $row['id'];
            ?>

            <button class="bg-blue-500 p-2 rounded-sm m-2 skill" type="submit" value="<?= $id_tag ?>">
              <?= $tag ?>
            </button>


          <?php endwhile; endif; ?>



      </div>

    </div>



























  </dialog>
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
    <div id="response_add_project" class="alert alert-success" role="alert">

    </div>
    <div class="flex justify-center">
      <div id="form_add_project" class="h-auto w-auto flex-grow flex flex-col gap-6 align-middle p-6 "
        enctype="multipart/form-data">
        <input class="border-2 shadow h-10" type="text" placeholder="name" id="name_project" name="name_project"
          required>
        <textarea name="description" id="description" cols="30" rows="6"></textarea>



        <select class="border-2 shadow h-10 w-40" id="category" name="category" required>
          <option selected disabled>category</option>

          <?php
          while($res_fetch = mysqli_fetch_assoc($result_category)):
            $category_nom = $res_fetch['name'];
            $category_id = $res_fetch['id'];
            ?>
            <option value="<?= $category_id ?>">
              <?= $category_nom ?>
            </option>
          <?php endwhile; ?>

        </select>


        <select class="border-2 shadow h-10 w-40" id="sub_category" name="sub_category" required>
          <option selected disabled>sub category</option>

          <?php
          while($res_fetch = mysqli_fetch_assoc($result_sub_category)):
            $sub_category_nom = $res_fetch['souscategoriesNAME'];
            $sub_category_id = $res_fetch['id'];
            ?>
            <option value="<?= $sub_category_id ?>">
              <?= $sub_category_nom ?>
            </option>
          <?php endwhile; ?>

        </select>
        <input type="file" name="image" id="image" enctype="multipart/form-data">
        <button class="w-40 bg-blue-500 px-4 py-2" type="submit" id="btn_submit" value="">submit</button>
      </div>
    </div>
    </div>

  </dialog>


  <!-- modal show offers -->



  <dialog id="modal_show_offers" style="width:90vw; height:80vh dark:bg-slate-500 padding:10rem">
    <div class="w-auto flex justify-end m-2 h-10">

      <svg id="cls_btn_offers" className="w-[31px] h-[31px] m-1 text-gray-800 cursor-pointer dark:text-white"
        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>

    </div>
    <h1 class="text-center text-3xl">offers</h1>
    <div id="parent_offres" class="w-auto  h-auto p-4  flex flex-wrap gap-5"></div>

  </dialog>



<!-- modal testimonials -->
  <dialog id="modal_add_testo" style="width:90vw; height:80vh dark:bg-slate-500 padding:10rem">
    <div class="w-auto flex justify-end m-2 h-10">

      <svg id="cls_btn_testo" className="w-[31px] h-[31px] m-1 text-gray-800 cursor-pointer dark:text-white"
        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>

    </div>
    <h1 class="text-center text-3xl">add testimonials </h1>
    <div id="parent_offres" class="w-auto justify-center align-middle  h-auto p-4  flex flex-col gap-5">
         <textarea class="border shadow-md" type="text"  id="testomonials" ></textarea>
         <button   id="btn_submit_testomonials" class="bg-blue-500 p-2 rounded-sm m-2 " >
          add
         </button>
         
    </div>

  </dialog>


  <script src="../javascript/jquery.js"></script>

  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">

  </script>
  <script src="../javascript/script.js"></script>

  <script>
    $("document").ready(function () {
      $("#alert").hide();
      $("#btn_modal").click(function () {
        let modal1 = document.querySelector('#modal');
        modal1.showModal();

      });
      $("#btn_modal_skill").click(function () {
        let modal2 = document.querySelector('#modal_skills');
        modal2.showModal();

      });

      $("#close_btn").click(function () {

        let modal2 = document.querySelector('#modal_skills');

        modal2.close();

      })
      $("#close_btn2").click(function () {
        let modal1 = document.querySelector('#modal');

        modal1.close();
      })
      $(".skill").each(function () {
        $(this).click(function () {
          $(this).addClass("hidden");
          var skill = $(this).val();
          $.ajax({
            url: "../ajax/add_skills.php",
            type: "POST",
            data: { skill: skill },
            success: function (response) {
              if (response == 1) {
                $("#alert").removeClass("alert-warning");
                $("#alert").addClass("alert-success");
                $("#alert").show();
                $("#alert").text("the skill are added with success");
                setTimeout(function () {
                  $("#alert").hide()
                }, 1200);

              }

              else if (response == 0) {
                $("#alert").show();
                $("#alert").addClass("alert-warning");
                $("#alert").removeClass("alert-success");
                $("#alert").text(" you have allready this skil");
                setTimeout(function () {
                  $("#alert").hide()
                }, 1200);
              }
            },
            error: function () {
              alert("somthing is wrong");
            }
          })
        });
      });

      $("#delete").click(function () {

        var Confirmed = confirm("Are you sure you want to delete your account?");

        if (Confirmed) {

          let id = $("#delete").val().trim();
          $.ajax({
            url: "../ajax/delete_user.php",
            type: "POST"
            ,
            data: { id: id }
            ,
            success: function (response) {
              if (response === "1") {

                console.log("your account deleted with success")
                window.location.href = "./sign_in.php"
              } else if (response == '0') console.log("errorr");


            }
            ,
            error: function () {
              alert("domethjing wrong");
            }


          })

        }


      })
      var modal_add = document.getElementById("add_project");

      $("#btn_modal_add").click(function () {
        modal_add.showModal();
      })

      $("#cls_btn").click(function () {
        modal_add.close();
      })





      $("#response_add_project").hide();
      $("#btn_submit").click(function () {
        let name = $("#name_project").val().trim();
        let description = $("#description").val().trim();
        let category = $("#category").val();
        let sub_category = $("#sub_category").val();

        let image = $("#image").prop('files')[0];


        var form_data = new FormData();

        form_data.append("name_project", name);
        form_data.append("description", description);
        form_data.append("category", category);
        form_data.append("sub_category", sub_category);
        form_data.append("image", image);



        $.ajax({
          url: "../ajax/add_project.php",
          type: "POST",
          data: form_data,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response == "1") {
              $("#response_add_project").show();
              $("#response_add_project").html("the project add with  success")
            } else {
              $("#response_add_project").show();
              $("#response_add_project").html(response)
            }
          }
        });
        setTimeout(function () {
          $("#response_add_project").hide(200);
        }, 1500)
      })


      $(".btn_project_dele").each(function () {
        $(this).click(function () {
          var con = confirm("Are you sure you want to delete your account?");
          if (con) {
            let id_project = $(this).val();

            $.ajax({
              url: "../ajax/dele_project.php",
              type: "POST",
              data: { id_project: id_project },


              success: function (response) {
                if (response == "1") {
                  $("#alert").show();
                  $("#alert").html("the project delete with success")
                  setTimeout(function () {
                    $("#alert").hide(50);
                  }, 1500);
                }
              }
            })

          }
        })


      })

      var modal_show_offers = document.getElementById("modal_show_offers");
      $(".btn_offers").each(function () {

        $(this).click(function () {
          let id_project_offers = $(this).val()
          modal_show_offers.showModal();
          $.ajax({
            url: "../ajax/get_offers.php",
            type: "POST",
            data: { id_project_offers: id_project_offers },
            dataType: "json",
            success: function (response) {
              console.log(response)
              $("#parent_offres").html("");

              response.forEach(res => {
                $("#parent_offres").append(`
                                <li style="width:20vw;"
            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-1/5 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2 p-2">
            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"><img class="w-full h-full" src="../images/users/${res.image}" alt=""></div>

            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between p-2 rounded-md">
              <div class="flex flex-row p-3 items-center gap-0.5">
               <a href="?id=${res.id_free}" > <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg"> ${res.name}</h3></a>
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
                    <img class="freelancer-photo w-10 h-10 rounded-full" src="../images/users/${res.image}" alt="offers Freelancer photo">
                    <div class="flex flex-col">
                      <p>by <strong class="freelancer-name font-semibold">${res.user}</strong></p>
                      <div class="flex flex-row items-center -mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                          <path
                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                            fill="#FFB331" />
                        </svg>
                        <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                          class="reviews text-gray-400">${res.delay}</p>)
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
              <div class="flex justify-center gap-5">
              
              ${res.status === 'pending' ? `<button type="button" class="bg-red-500 py-2 px-3 rounded-md refuse_btn" value="${res.id}">refuse</button> <button type="button" class="bg-green-500 py-2 px-3 rounded-md akcept_btn " value="${res.id}">akcept</button>` : `<button type="button" class="bg-blue-500 py-2 px-3 rounded-md" value="${res.id}">${res.status}</button>`}
          
            </div>
                  </div>
                
                </li>
                                        
                                `);
              });


            },
            error: function () {
              alert("they s not offers for this project")
            }


          });



          // end    



        });


      });







      $("#cls_btn_offers").click(function () {
        modal_show_offers.close();


      })

      var modal_tags = document.getElementById("modal_tags");
      $(".btn_tags").each(function () {
        $(this).click(function () {

          $("#hidden_input_tags").val($(this).val());
          modal_tags.showModal();

        })
      })
      $(".tag").click(function () {
        let id_prjct = $("#hidden_input_tags").val();
        let id_tag = $(this).val();
        $(this).hide();
        $.ajax({
          url: "../ajax/add_tags.php",
          type: "POST",
          data: { id_prjct: id_prjct, id_tag: id_tag },
          success: function (response) {
            if (response !== "1") {
              alert("this tags allready exist")
            }

          },
          error: function (error) {
            alert("something wrong")
          }
        })

      })
      $("#close_btn_tag").click(function () {

        modal_tags.close();
      })




      var akcept_btn;
      var refuse_btn;




      document.addEventListener('click', function (event) {
        var target = event.target;


        if (target.classList.contains('akcept_btn')) {

          alert(target.value);

          let id_offer = target.value;
          $.ajax({
            url: "../ajax/akcept_offers.php",
            type: "POST",
            data: { id_offer: id_offer },
            success: function (response) {
              alert(response);



            },
            error: function () {
              alert("something is wrong");
            }
          });
        }
      });
      document.addEventListener('click', function (event) {
        var target = event.target;


        if (target.classList.contains('refuse_btn')) {


          let id_offer = target.value;
          $.ajax({
            url: "../ajax/refuse_offers.php",
            type: "POST",
            data: { id_offer: id_offer },
            success: function (response) {
              alert(response);
            },
            error: function () {
              alert("something is wrong");
            }
          });
        }
      });

     var moda_add_testo=document.getElementById("modal_add_testo");
       $("#btn_testo").click(function () {
        moda_add_testo.showModal();
       })
       $("#cls_btn_testo").click(function(){
        moda_add_testo.close();
       })


        
         $("#btn_submit_testomonials").click(function(){
               
                 let testo= $("#testomonials").val();
                 
                 $.ajax({
                  url:"../ajax/add_testomonials.php",
                  type:"POST",
                  data:{testo:testo},
                  success:function (response) {
                              alert(response);
                    }
                 })

         })

        





      //  end jquey

    });







  </script>
</body>

</html>