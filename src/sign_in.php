<?php
    require("./dashboard/cnx.php");
    $qeury_region ="SELECT * from regions";
$region_res=mysqli_query($cnx,$qeury_region);

$qeury_city ="SELECT id, nom FROM city";
$city_res=mysqli_query($cnx,$qeury_city);

   session_start();
   require("./dashboard/cnx.php");
   if(isset($_SESSION['role'])&&isset($_SESSION['id_user'])){
        $id = $_SESSION['id_user'];
       
        $qeury="SELECT * FROM users WHERE  id = $id";
        $res=mysqli_query($cnx,$qeury);
        $row=mysqli_fetch_array($res);
       
        $username=$row['username'];
        $image=$row['image'];
        $name_user=$username;
        $status="log-out";
        $username_link="#";
        $status_link="dashboard/script/script.php";
   }
   else {
    $name_user="sign up";
    $status="Sign In";
    $username_link="sign_in.php";
    $status_link= "sign_in.php";
   }
  


?>
<!doctype html>
<html>
<head>
  <title>sign in</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="input.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>
<body class="dark:bg-slate-900">
  <!-- Header -->
  <?php
         include("./include/header.php");
    ?>
  <!-- end Header -->
   <div class="form">
    <ul class="tab-group">
        <li class="tab active">
            <a class="no-underline transition duration-500 ease-in-out  bg-teal-500 hover:bg-teal-500"
                href="#signup">Sign Up</a>
        </li>
        <li class="tab ">
            <a class="no-underline  transition duration-500 ease-in-out  bg-teal-500 hover:bg-teal-500"
                href="#login">Log In</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1 class="text-center text-gray-400 font-light mb-10 text-2xl font-sans">
                Sign Up for Free</h1>
                <div id="error" class="alert alert-danger " role="alert">
 
</div>
<!-- action="./script_users/script.php" method="post" enctype="multipart/form-data" -->
            <div >
                <div class=" flex top-row relative">
                    <div class=" relative mb-10 w-1/2 mr-4">
                        <label class="block">
                            First Name<span class="text-teal-500 ml-2">*</span>
                        </label>
                        <input name="fname"  id="fname"
                            class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                            type="text" required autocomplete="off" />
                    </div>
                    <div class="relative mb-10 w-1/2">
                        <label class="block">
                            Last Name<span class="text-teal-500 ml-2">*</span>
                        </label>
                        <input  name="lname"   id="lname"
                            class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                            type="text" required autocomplete="off" />
                    </div>
                </div>


                <div class="relative mb-10">
                    <label>
                        Email Address<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input name="email" id="email"
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="email" required autocomplete="off" />
                </div>

                <div class="relative mb-10">
                    <label>
                        Set A Password<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input name="password"  id="password"
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="text" required autocomplete="off" />
                </div>
                <div class="flex flex-row justify-around mb-3">
          <select class="border-2 shadow h-10 w-40" name="region" id="region" required >
          <option selected  value="">region</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($region_res)):
            $region_nom=$res_fetch['nom'];
            $region_id=$res_fetch['id'];
            ?>
             <option value="<?=$region_id?>"><?=$region_nom?></option>
             <?php endwhile; ?>
          
          </select>

          <select class="border-2 shadow h-10 w-40" name="city" id="city" required >
          <option selected  value="" >city</option>
         
            <?php
            while($res_fetch=mysqli_fetch_assoc($city_res)):
            $city_nom=$res_fetch['nom'];
            $city_id=$res_fetch['id'];
            ?>
             <option value="<?=$city_id?>"><?=$city_nom?></option>
             <?php endwhile; ?>
          
          </select>
          </div>
              <!-- <input type="file" name="image" id="image"  class="my-4" enctype="multipart/form-data" > -->
                <button type="submit" name="regester" id="signup_btn"
                    class="w-full bg-teal-500 hover:bg-custom-green text-white border-0 rounded-none focus:outline-none uppercase tracking-wide font-semibold py-4 px-0 text-base transition-all duration-500 ease-in-out">
                    <div id="spn" class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div> <p id="text_btn">Get Started</p>
                </button>

            </div>

        </div>

        <div  id="login">
            <h1 class="text-center text-gray-400 font-light mb-10 text-2xl font-sans">
                Welcome Back!</h1>
                

            <form action="./script_users/script.php"  method="post">

                <div class="relative mb-10">
                    <label>
                        Email Address<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input name="email"
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="email" required autocomplete="off" />
                </div>

                <div class="relative mb-10">
                    <label>
                        Password<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input name="password"
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="password" required autocomplete="off" />
                </div>
                <button type="submit" name="login"
                    class="w-full bg-teal-500 text-white border-0 rounded-none hover:bg-custom-green focus:outline-none uppercase tracking-wide font-semibold py-4 px-0 text-base transition-all duration-500 ease-in-out">
                    Get Started
                </button>
                

            </form>

        </div>

    </div>

</div>


<?php 
             include("./include/footer.php");
          ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

     <script src="../javascript/form.js"></script>
     <script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        
        $("#error").hide();
       $('#spn').hide();
        $("#signup_btn").click(function () {
            let email = $("#email").val().trim();
            let fname= $("#fname").val().trim();
            let lname= $("#lname").val().trim();
            let password= $("#password").val().trim();
            let region= $("#region").val();
            let city= $("#city").val();
            let image =$("#image").val();
            $('#text_btn').hide();
            $('#spn').show();
            if (email !== "" &&  password !== "" && lname !== "" &&  fname !== ""  ) {
// && password !== "" && lname !== "" && region.val() !== "" && city.val() !== ""
          
            $.ajax({
                url: "../ajax/ajax_sign_up.php",
                type: "POST",
                // , fname: fname, lname: lname, password: password, region: region, city: city 
                data: { email: email, password: password, fname: fname, lname: lname, region: region, city: city},
                cache: false,
                success: function (response) {
                    $("#error").addClass("alert-danger");
                        $("#error").removeClass("alert-success");
                    $("#error").show().html(response);
                    if(response==1){
                        $("#error").removeClass("alert-danger");
                        $("#error").addClass("alert-success");
                        $("#error").show().text("your acccount create succesfuly enjoy don't forget your password");
                        setTimeout(function(){
                            $("body").load("index.php").hide().fadeIn(1000);},1000)
                    }
                }
                // ,
                // error: function (error) {
                    

                //     console.log(error);
                // }
            });
         
        }else {
            $("#error").show().text("please enter all your information to connnect");
        }
        $('#text_btn').show(500);
            $('#spn').hide(1000);
           
        
        });
    });
</script>

</body>
</html>