  
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
  ?>
 <!doctype html>
<html>
<head>
  <title>contact</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
   
  <!-- Header -->
  <?php
         include("./include/header.php");
    ?>
  <!-- end Header -->
   <div class="grid grid-cols-1 mb-6 md:grid-cols-2 ">
    <div class="flex flex-col  items-center">
        <h1 class="font-serif font-semibold text-4xl md:text-[45px] text-black text-center mt-10">Contact US
        </h1>

        <form method="POST" action="./script_users/mail.php" class="w-9/12 sm:9/12 md:w-11/12 lg:w-9/12  ">

            <div class="w-full my-10">
                <!-- <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label> -->
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" placeholder=" Name"
               
                        class=" bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-white  sm:text-sm sm:leading-6" onblur="validetname()">
                        <span id="name-error"></span>
                </div>
            </div>

            <div class="w-full mb-10">
                <!-- <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label> -->
                <div class="mt-2">
                    <input id="phone" name="phone" type="text" autocomplete="phone" placeholder=" Phone Number"
                        class="  bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-white  sm:text-sm sm:leading-6" onkeyup="validetphone()">
                        <span id="phone-error"></span>
                </div>
            </div>

            <div class="w-full mb-10">
                <!-- <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label> -->
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" placeholder=" Email" required
                        class=" bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-white  sm:text-sm sm:leading-6" onkeyup="validetemail()">
                        <span id="email-error"></span>
                </div>
            </div>

            <div class="w-full mb-10">
                <!-- <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label> -->
                <div class="mt-2">
                    <input id="message" name="message" type="text" autocomplete="message" placeholder=" Message"
                        class="bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6 h-44"
                        onkeyup="validetmessage()">
                         <span id="message-error"></span>
                    
                </div>
            </div>
                 <input type="submit" class="h-11 w-40 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] bg-green-500" onclick="return formvalidet()" name="submit">
            <!-- <button type="button" name="submit"
                class="h-11 w-40 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] bg-green-500" onclick="return formvalidet()">
                Send
            </button> -->
            <span id="submit-error"></span>


        </form>

    </div>

    <div class="flex flex-col justify-center items-center ">
        <div class="w-full h-full hidden  md:block lg:block xl:block">
            <img src="../images/undraw_creation_re_d1mi.svg" alt="image" class=" h-3/5 mt-32">
        </div>

    </div>
</div>


          <?php 
             include("./include/footer.php");
          ?>
   <script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
  <script src="../javascript/validation.js"></script>
</body>
</html>