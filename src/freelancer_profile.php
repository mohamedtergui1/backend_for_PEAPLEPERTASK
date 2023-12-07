<?php
session_start();
require("./dashboard/cnx.php");


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


if (isset($_GET['id'])) {
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
  if (empty($image)) {
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
  if (empty($image)) {
    $image = "no_photo.png";
  }
}
$query = "SELECT * from skills";
$res_skill = mysqli_query($cnx, $query);
if ($id) {
  $id_2 = $id;
}
if (isset($_GET['id'])) {
  $id_2 = $_GET['id'];

}
$query = "SELECT skill , skills.id as id    FROM skills INNER JOIN pivot_skills INNER JOIN users ON users.id=pivot_skills.id_user AND	
  skills.id=pivot_skills.id_skill WHERE users.id = $id_2  ";
$skills = mysqli_query($cnx, $query);
mysqli_close($cnx);
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
                    <?= $city . " , " . $region ?>
                  </p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
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
                  <?= $city . " , " . $region ?>
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
                  if (mysqli_num_rows($res) > 0):
                    while ($row3 = mysqli_fetch_assoc($skills)):
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

                <?php if (isset($_SESSION["id_user"]) && isset($_GET["id"])) {
                  if ($_SESSION['id_user'] == $_GET["id"]) {
                    ?>
                    <div class="flex gap-5 p-47">
                      <div class=" col-sm-12">
                        <button class="mt-2  btn-info" id="btn_modal">Edit</button>
                      </div>

                      <div class=" col-sm-12">
                        <button class="mt-2 btn-info" id="btn_modal">Add Skills</button>
                      </div>
                    </div>
                  <?php
                  }
                } else if ($_SESSION["id_user"]) { ?>
                    <div class="flex gap-5">
                      <div class=" mt-2 col-sm-12">
                        <button id="btn_modal" class=" btn btn-info ">Edit</button>
                      </div>
                    <?php if ($_SESSION['role'] == 'freelancer') { ?>
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
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i
                      class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                  <small>Web Design</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Website Markup</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>One Page</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Mobile Template</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Backend API</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i
                      class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                  <small>Web Design</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Website Markup</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>One Page</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Mobile Template</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Backend API</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("./include/footer.php");
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

      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

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
        if (mysqli_num_rows($res_skill) > 0):
          while ($row = mysqli_fetch_array($res_skill)):
            $skill = $row['skill'];
            $id_skill = $row['id'];
            ?>

            <button class="bg-blue-500 p-2 rounded-sm m-2 skill" type="submit" value="<?= $id_skill ?>">
              <?= $skill ?>
            </button>


          <?php endwhile; endif; ?>



      </div>

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

    })


  </script>
</body>

</html>