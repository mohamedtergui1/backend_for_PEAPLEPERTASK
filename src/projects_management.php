<?php
require("cnx.php");

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
     
    </div>
<!-- modal add -->


    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>

   <script src="../javascript/freelancer.js"></script>
   
</body>

</html>