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

?>

<!doctype html>
<html >

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../dist/output.css" rel="stylesheet">

</head>

<body class="overflow-x-hidden dark:bg-gray-900 dark:text-white">
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



        <section class="flex lg:w-9/12  flex-col py-7  px-1 sm:px-5 gap-5 flex-grow">
            <h1 class="font-bold text-center text-2xl">INBOX</h1>
            <div class=" flex flex-col sm:flex-row justify-center gap-1 bg-slate-500 dark:bg-slate-800 p-5">
                <input type="text "
                    placeholder="Search " class="p-1 sm:w-1/2 rounded-lg dark:text-black lg:text-xl"> <span
                    class="p-2 sm:w-1/6 rounded-md justify-around bg-white flex items-center dark:text-black"><span>sort by..</span>
                    <svg width="12" height="12" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                            stroke="black" stroke-width="2" />
                    </svg>
                </span></div>
            <div class=" py-4   ">
                <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-2">
                    to day
                </h5>
                <ul class="flex flex-col">
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>
                    <li class="email_message flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                        <div class=" w-full flex gap-5 items-center  ">
                            <div class="flex-grow text-left ">
                                <span class="w-1/2 email_user text-xs sm:text-sm">simotergui4@gmail.com</span>
                                <span class="w-1/2 text-xs sm:text-sm">10/20/2018</span>
                            </div>
                            <span class="btn_messag_inbox cursor-pointer pl-3 w-28 flex items-center gap-1">
                                <span
                                    class="text-blue-500">show more
                                </span>
                                <svg   width="13" height="13" viewBox="0 0 9 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                                        stroke="black" stroke-width="2" />
                                </svg>
                            </span>
                            <span class="py-1">
                                <span
                                    class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                <span
                                    class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">Replay</span>
                            </span>
                        </div>
                        <p class="text-center p-8 text-xs sm:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatibus consequatur vero voluptate aut distinctio. Iste eos odio dolorem quae
                            ullam? Molestiae quam sint, quo pariatur quaerat repudiandae itaque assumenda repellendus?
                        </p>
                    </li>

        </ul>



            </div>




        </section>

    </div>

    <!-- foooter -->
    <dialog id="dailog_replay" class="flex-col w-auto h-5/6 p-5 rounded-xl gap-4 dark:bg-gray-800 dark:text-white">
        <div id="clse_btn" class="flex justify-end p-3"><svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M3 3L8.75 10.5M14.5 18L8.75 10.5M8.75 10.5L14.5 3L3 18" stroke="#FF0909" stroke-width="7" />
            </svg>
        </div>
        <div class="flex flex-row justify-center p-6 rounded-tr-lg rounded-tl-lg bg-slate-500 dark:bg-slate-700 text-xs md:text-xl">
            <span>Send To:
            </span>
            <span id="email_inbx">

            </span>
        </div>
        <form class="h-auto">
            <textarea class="w-full h-auto border dark:bg-slate-600 " name="textarea" id="textarea" cols="10" rows="15"></textarea>
            <div class="flex justify-end"><button id="btn_send_mssg"
                    class="bg-blue-500 px-4 py-1 rounded-md">Send</button></div>
        </form>
    </dialog>
    <script src="../../javascript/jquery.js"></script>
    <script src="../../javascript/dashboard.js"></script>
    <script src="../../javascript/script.js"></script>

    <script src="../../javascript/dashInbox.js"></script>

</body>

</html>