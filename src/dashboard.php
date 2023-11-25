<!doctype html>
<html>

<head>
  <title>dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden  ">
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
    <div class="flex-grow flex flex-col pb-10 dark:bg-gray-900 dark:text-white">

      <section class="flex flex-col">
        <h1 class="text-4xl text-center font-bold">DashBoard</h1>
        <!-- start statistique section -->

        <section class="  flex flex-wrap justify-center gap-2 py-7  ">
          <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold "> Product Sold</h4>
            <p class="font-bold text-4xl">13.8k</p>
            <span class="text-custom-green">
              +7%
            </span>
          </div>
          <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold "> Total Profit</h4>
            <p class="font-bold text-4xl">$1,237K</p>
            <span class="text-custom-green">
              +0.007%
            </span>
          </div>
          <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold "> No. of Claims</h4>
            <p class="font-bold text-4xl">1.3M</p>
            <span class="text-custom-green">
              +10%
            </span>
          </div>
          <div class="shadow-lg text-center  w-2/3 sm:w-2/5 bg-gray-50 flex flex-col  gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
            <h4 class="  text-xl font-semibold "> New Customers</h4>
            <p class="font-bold text-4xl">1,237</p>
            <span class="text-red-600">
              -0.08%
            </span>
          </div>

        </section>
        <!-- end statistique section -->
       
      </section>

      <section class="flex justify-center gap-8 flex-col p-2  dark:bg-gray-900 dark:text-white">
          <h3 class="text-center text-xl font-bold"> Sales By City</h3>
          <div class="flex flex-col border dark:text-black dark:bg-slate-400  ">
             <ul class="flex justify-around bg-slate-500 text-white py-3">
                <li class="font-bold">CITY</li>
                <li class="font-bold">TOTAL SALES</li>
             </ul>
             <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
                <li  class="w-1/2">khouribga</li>
                <li  class="w-1/2">10050</li>
             </ul>
             <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
                <li  class="w-1/2">casablanca</li>
                <li  class="w-1/2">100</li>
             </ul>
             <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
                <li  class="w-1/2">youssoufia</li>
                <li  class="w-1/2">10050</li>
             </ul>
             <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
                <li class="w-1/2">safi</li>
                <li  class="w-1/2">10050</li>
             </ul>
             
          </div>
      </section>

      
      
      <section class="flex justify-center gap-8 flex-col p-2 dark:bg-gray-900 dark:text-white">
        <h3 class="text-center text-xl font-bold"> Users By City</h3>
        <div class="flex flex-col border dark:text-black ">
           <ul class="flex justify-around bg-slate-500 text-white py-3">
              <li class="font-bold">CITY</li>
              <li class="font-bold">TOTAL USERS</li>
           </ul>
           <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
              <li  class="w-1/2">khouribga</li>
              <li  class="w-1/2">10050K</li>
           </ul>
           <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
              <li  class="w-1/2">casablanca</li>
              <li  class="w-1/2">100K</li>
           </ul>
           <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
              <li  class="w-1/2">youssoufia</li>
              <li  class="w-1/2">10050K</li>
           </ul>
           <ul class="flex justify-around text-center bg-gray-50 py-3 dark:bg-slate-400">
              <li class="w-1/2">safi</li>
              <li  class="w-1/2">100K</li>
           </ul>
           
        </div>
    </section>
    </div>

  </div>
 
 

  <script src="../javascript/jquery.js"></script>
  <script src="../javascript/dashboard.js"></script>
  <script src="../javascript/script.js"></script>
</body>

</html>