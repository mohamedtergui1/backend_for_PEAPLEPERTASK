<!doctype html>
<html >
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
           <h1 class="font-bold text-4xl text-center mt-5">Users Management</h1>
           <div class="flex flex-col text-xs   items-center  border-2 pb-5">
            <ul class="flex bg-slate-500 dark:bg-slate-800 items-center text-xs sm:text-lg text-white font-bold w-full py-3">
                <li class="w-2/5 text-center">USERNAME</li>
                <li class="w-1/5 text-center">EMAIL</li>
                <li class="w-1/5 text-center">PASSWORD</li>
                <li class="w-1/5 text-center">REGION</li>
                <li class="w-1/5 text-center">CITY</li>
                <li class="w-1/6 text-center">&nbsp;</li>
            </ul>
            <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span>USERNAME </span>
                </li>
                <li class="w-1/5 text-center">EMAIL</li>
                <li class="w-1/5 text-center">PASSWORD</li>
                <li class="w-1/5 text-center">REGION</li>
                <li class="w-1/5 text-center">CITY</li>
                <li class="w-1/6 text-center flex flex-col sm:flex-row  justify-around"><button  class="text-blue-500 edit_btn cursor-pointer">EDIT</button> <input type="submit" class="text-red-500 dele_btn cursor-pointer" value="DELE"></li>
            </ul>          
           </div>
           <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
        </section>
       
    </div>
    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
    <!-- <script src="../javascript/dashUser.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/dashboardhome.js"></script>
</body>

</html>

