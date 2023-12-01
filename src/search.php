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
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="14"
              height="10"
              viewBox="0 0 14 10"
              fill="none"
            >
              <path d="M1 1L7 8.5L13 1" stroke="#05C50D" />
            </svg>
          </div>
        </button>
      </div>

      <ul
        id="list"
        class="block justify-around text-xs bg-gray-100 p-3 md:flex lg:flex dark:bg-slate-800"
      >
        <a href=""><li class="mt-2">Technology & Programming</li></a>
        <a href=""><li class="mt-2">Writing & Translation</li></a>
        <a href=""><li class="mt-2">Design</li></a>
        <a href=""><li class="mt-2">Digital Marketing</li></a>
        <a href=""><li class="mt-2">Video, Photo & Image</li></a>
        <a href=""><li class="mt-2">Business</li></a>
        <a href=""><li class="mt-2">Music & Audio</li></a>
        <a href=""><li class="mt-2">Marketing, Branding & Sales</li></a>
        <a href=""><li class="mt-2">Social Media</li></a>
      </ul>
    </section>
    <!-- hadi fiha dik recherche o selecte -->
    <section class="flex flex-col gap-4 lg:flex-row  m-6  ">
      <form class="flex md:justify-start justify-center items-end w-full ">
        <div class="relative  md:w-full  lg:w-full   ">
          <input
            type="text"
            id="hero-field"
            name="hero-field"
            placeholder="rechrcher"
            class="h-14 w-full drop-shadow-md bg-white rounded-l-lg border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
          />
        </div>
        <button
          class="h-14 w-1/8 inline-flex text-white bg-custom-green++ border-0 py-2 px-6 focus:outline-none bg-custom-green- rounded-r-lg text-lg items-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
          >
            <path
              d="M17.707 16.293L20.707 19.293C20.8807 19.4726 20.9877 19.7177 20.9877 19.9877C20.9877 20.54 20.54 20.9877 19.9877 20.9877C19.7177 20.9877 19.4726 20.8807 19.2927 20.7067L19.293 20.707L16.293 17.707C16.1193 17.5274 16.0123 17.2823 16.0123 17.0123C16.0123 16.46 16.46 16.0123 17.0123 16.0123C17.2823 16.0123 17.5273 16.1193 17.7073 16.2933L17.707 16.293ZM9.99999 1.99999C14.4183 1.99999 18 5.58171 18 9.99998C18 14.4183 14.4183 18 9.99999 18C5.58172 18 2 14.4183 2 9.99998C2 5.58171 5.58172 1.99999 9.99999 1.99999ZM9.99999 4.00001C6.68628 4.00001 3.99999 6.6863 3.99999 10C3.99999 13.3137 6.68628 16 9.99999 16C13.3137 16 16 13.3137 16 10C16 6.6863 13.3137 4.00001 9.99999 4.00001Z"
              fill="white"
            />
          </svg>
        </button>
      </form>
      <form class="flex  md:justify-start justify-center items-end">
        <div class="relative w-1/2  m-auto md:w-full lg:w-full  ">
          <select
            type="text"
            id="hero-field"
            class="h-14 w-full m-auto drop-shadow-md bg-white rounded-md border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
          >
            <option value="#" selected disabled>all categories</option>
            <option value="option1">option1</option>
            <option value="option1">option2</option>
            <option value="option1">option3</option>
            <option value="option1">option4</option>
            <option value="option1">option5</option>
            <option value="option1">option6</option>
          </select>
        </div>
      </form>
    </section>
    <!-- hadi fiha dak l button diyal lfilter o dik la selecte -->
    <section class="flex flex-row w-full md:hidden" style="margin-top: 55px ;">
      <div class="flex flex-row m-auto gap-5  w-full" style="margin: 5px 50px;">
      <button class="flex h-14 w-3/6  justify-center drop-shadow-md bg-custom-green- rounded-md border bg-opacity-50 border-gray-300 text-gray-50 items-center">filter</button>
      
      <select
        
        class="h-14 w-3/6 drop-shadow-md bg-white rounded-md border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
      >
        <option value="#" selected disabled>recomanded </option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
      </select>
    </div>
    </section>
    <hr>
    <!-- hadi diyal le texte -->
   <div class=" flex justify-end  ">
    <p class="text-xs m-6">+1000 results</p>
   </div>
   <!-- hada dak side bar diyal disck-top  -->
   <main class="flex flex-row w-1/1 gap-2">
    <!-- hadi diyal dak side bar li 3la lissr -->
    <section id="ikhtifa2" class="flex flex-col w-1/3 gap-2 " style="margin-left: 28px;" >
      <div id="yassin" class="block "  style="height: 60px ;font-weight: 400;">
        <div id="hiba" class="m-3 font-normal">
        <strong>Filters</strong>
      </div>
      </div>
      <!-- hadi li fiha delivery time -->
      <div id="yassin" class="block "  style="height: 60px;  font-weight: 400;">
     <!-- hadi diyal l3ounwan o dik lfleche  -->
          <div class="flex justify-between px-3 mt-3">
            <button id="btn2">Delivery time </button>
           <button id="btn3"><img src="images/arrow-down.svg" alt=""></button> 
      </div>
   </div>
       <!-- hadi dik taniya diyal dok no9at la selection -->
       <div id="yassin" class="selection"  style=" height:90px; font-weight: 400; margin-top: -10px; padding-left: 10px;">
        <form >
          <input type="radio" id="html" name="fav_language" value="HTML">
          <label for="html">Within 1 day</label><br>
          <input type="radio" id="css" name="fav_language" value="CSS">
          <label for="css">Within 2 day</label><br>
          <input type="radio" id="javascript" name="fav_language" value="JavaScript">
          <label for="javascript">Within 3 day</label>
        </form>
       </div>

<!-- hadi talta li fiha l price -->


      <div id="yassin" class="block "  style="height: 60px;  font-weight: 400;">
     <!-- hadi diyal l3ounwan o dik lfleche  -->
          <div class="flex justify-between px-3 mt-3">
            <button id="btn4">  Price </button>
           <button id="btn5"><img src="images/arrow-down.svg" alt=""></button> 
      </div>
   </div>
       <!-- hadi dik taniya diyal dok no9at la selection -->
       <div id="yassin" class="selection2"  style=" height:120px; font-weight: 400; margin-top: -10px; padding-left: 10px;">
        <form >
          <input type="radio" id="html" name="fav_language" value="HTML">
          <label for="html">Under $20</label><br>
          <input type="radio" id="css" name="fav_language" value="CSS">
          <label for="css">Under $30</label><br>
          <input type="radio" id="javascript" name="fav_language" value="JavaScript">
          <label for="javascript">$50 to $100</label><br>
          <input type="radio" id="javascript" name="fav_language" value="JavaScript">
          <label for="javascript">Over $100</label>
        </form>
       </div>

       <!-- hadi rab3a li fiha recherche -->


      <div id="yassin" class="block "  style="height: 60px;  font-weight: 400;">
        <!-- hadi diyal l3ounwan o dik lfleche  -->
             <div class="flex justify-between px-3 mt-3">
               <button id="btn6">Freelancer country</button>
              <button id="btn7"><img src="images/arrow-down.svg" alt=""></button> 
         </div>
      </div>
      <div id="yassin" class="selection3"  style="display:block; height:120px; font-weight: 400; margin-top: -10px; padding-left: 10px;">
        <form class="flex w-2/3 md:justify-start justify-center items-end  " style="margin-top: 20px; margin-right: 10px;">
          <div >
            <input
              type="text"
              id="hero-field"
              name="hero-field"
              placeholder="rechrcher"
              class="h-14  drop-shadow-md bg-white rounded-l-lg border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent   text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
            />
          </div>
          <button
            class="h-14  inline-flex text-white bg-custom-green++ border-0 py-2 px-6 focus:outline-none bg-custom-green- rounded-r-lg text-lg items-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M17.707 16.293L20.707 19.293C20.8807 19.4726 20.9877 19.7177 20.9877 19.9877C20.9877 20.54 20.54 20.9877 19.9877 20.9877C19.7177 20.9877 19.4726 20.8807 19.2927 20.7067L19.293 20.707L16.293 17.707C16.1193 17.5274 16.0123 17.2823 16.0123 17.0123C16.0123 16.46 16.46 16.0123 17.0123 16.0123C17.2823 16.0123 17.5273 16.1193 17.7073 16.2933L17.707 16.293ZM9.99999 1.99999C14.4183 1.99999 18 5.58171 18 9.99998C18 14.4183 14.4183 18 9.99999 18C5.58172 18 2 14.4183 2 9.99998C2 5.58171 5.58172 1.99999 9.99999 1.99999ZM9.99999 4.00001C6.68628 4.00001 3.99999 6.6863 3.99999 10C3.99999 13.3137 6.68628 16 9.99999 16C13.3137 16 16 13.3137 16 10C16 6.6863 13.3137 4.00001 9.99999 4.00001Z"
                fill="white"
              />
            </svg>
          </button>
        </form> 
      </div>

  <!-- hadii dik lkhra li zayda diyal zwa9 -->


      <div id="yassin" class="block"  style=" height:80px; font-weight: 400;  padding-left: 10px">
        <div class="flex justify-between px-3 mt-3">
          <button id="btn8">More filters </button>
         <button id="btn9"><img src="images/arrow-down.svg" alt=""></button> 
    </div>
      </div>
      <div id="yassin" class="selection4"  style=" height:120px; font-weight: 400;margin-top: -10px;  padding-left: px">
        <label class="switch">
          <input type="checkbox">
          <span class="slider"></span>
      </label>
      </div>


      
     


    </section>
    <!-- hadi diyal les services li 3ndi f lwsste -->
    <section class="flex flex-row w-2/3 m-auto">
       <!-- hadi diyal douk 3 diyal l3ibat -->
      
 <section id="parent" class="flex flex-col gap-4 m-auto md:flex-row " style="margin-bottom: 10px;">
  <!-- hadi 1 lowla -->
  <section id="child" class=" m-auto bg-gray-300  w-1/2  "style="box-shadow: -1px 4px 6px 0px #898989;
  border-radius: 10px;" >

    <img class="w-full" src="images/img1.png" alt="" srcset="">
    <div class="m-3"> 
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, veniam.</p>
    </div>
    <div class="flex flex-row gap-2 w-full " style="padding: 5px;" >
        <div class="w-1/3 bg-white rounded-md text-center"><p>figma</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>photoshop</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>adobe XD</p></div>
    </div>
     <!-- hadi diyal dak review -->
     <div class="flex flex-row items-center justify-around w-full w-full">
    <div  class="flex flex-row gap-2" style="margin: 15px;">
      <!-- hadi diyal tsswira -->
      
      <div class="flex items-center ">
        <img class="h-9" src="images/revie.svg" alt="" srcset="">
      </div>
      <!-- hadi li fiha tswira diyal dak lcommnet o ssmiya o reviews -->
      <div>
        <p> by <strong>vishal M.</strong></p>
        <div class="flex flex-row gap-3">
          <div class="flex">
        <p>4,5 </p>
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
          <path d="M6.97371 0.621277L8.27211 2.90413C8.32095 2.99004 8.3988 3.06428 8.49756 3.11908C8.59631 3.17389 8.71233 3.20725 8.83352 3.2157L11.9965 3.43432C12.3544 3.47447 12.4972 3.81281 12.2377 4.00763L9.85507 5.5506C9.66214 5.67553 9.57436 5.87184 9.62741 6.06146L10.32 8.5607C10.3808 8.83509 10.0075 9.04478 9.68722 8.91465L6.92645 7.66838C6.82232 7.62127 6.70377 7.59643 6.58304 7.59643C6.4623 7.59643 6.34376 7.62127 6.23963 7.66838L3.47886 8.91391C3.15956 9.04329 2.78529 8.83434 2.84606 8.55995L3.53866 6.06071C3.59075 5.8711 3.50394 5.67479 3.31101 5.54986L0.927409 4.00838C0.668888 3.8143 0.811653 3.47521 1.16857 3.43506L4.33159 3.21644C4.45278 3.208 4.5688 3.17463 4.66756 3.11983C4.76631 3.06502 4.84417 2.99079 4.89301 2.90487L6.1914 0.62202C6.35249 0.37217 6.81359 0.37217 6.97371 0.621277Z" fill="#FDD835"/>
          <path d="M6.87874 3.04095L6.6588 1.35893C6.65012 1.26523 6.62504 1.10461 6.81989 1.10461C6.97423 1.10461 7.05816 1.35223 7.05816 1.35223L7.71796 2.70261C7.96684 3.21644 7.86459 3.39268 7.62439 3.49678C7.34851 3.61576 6.94144 3.52281 6.87874 3.04095Z" fill="#FFFF8D"/>
          <path d="M9.60003 5.40114L11.4926 4.26269C11.5862 4.20246 11.755 4.10653 11.62 3.99722C11.5129 3.91097 11.2235 4.03515 11.2235 4.03515L9.56723 4.5341C9.07334 4.66572 8.74537 4.86054 8.71643 5.10593C8.67881 5.43311 9.05983 5.68519 9.60003 5.40114Z" fill="#F4B400"/>
          </svg>
        </div>
       
        </div>

      </div>
      
    </div>
    <div class="flex justify-end w-1/3">
      <strong class="flex justify-end">$59.99</strong>
    </div>
    </div>
   <hr style="width: 90%; height: 10px; margin: auto;">

  </section>
  <!-- hadi 2 taniya  -->
  <section id="child" class="m-auto bg-gray-300  w-1/2  "style="box-shadow: -1px 4px 6px 0px #898989;
  border-radius: 10px;" >

    <img class="w-full " src="images/Rectangle 8.png" alt="" srcset=""  
    >
    <div class="m-3"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, veniam.</p>
    </div>
    <div class="flex flex-row gap-2 w-full " style="padding: 5px;" >
        <div class="w-1/3 bg-white rounded-md text-center"><p>figma</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>photoshop</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>adobe XD</p></div>
    </div>
     <!-- hadi diyal dak review -->
     <div class="flex flex-row items-center justify-around w-full">
    <div  class="flex flex-row gap-2" style="margin: 15px;">
      <!-- hadi diyal tsswira -->
      
      <div class="flex items-center ">
        <img class="h-9" src="images/ssghir.png" alt="" srcset="" style="">
      </div>
      <!-- hadi li fiha tswira diyal dak lcommnet o ssmiya o reviews -->
      <div>
        <p> by <strong>vishal M.</strong></p>
        <div class="flex flex-row gap-3">
          <div class="flex">
        <p>4,5 </p>
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
          <path d="M6.97371 0.621277L8.27211 2.90413C8.32095 2.99004 8.3988 3.06428 8.49756 3.11908C8.59631 3.17389 8.71233 3.20725 8.83352 3.2157L11.9965 3.43432C12.3544 3.47447 12.4972 3.81281 12.2377 4.00763L9.85507 5.5506C9.66214 5.67553 9.57436 5.87184 9.62741 6.06146L10.32 8.5607C10.3808 8.83509 10.0075 9.04478 9.68722 8.91465L6.92645 7.66838C6.82232 7.62127 6.70377 7.59643 6.58304 7.59643C6.4623 7.59643 6.34376 7.62127 6.23963 7.66838L3.47886 8.91391C3.15956 9.04329 2.78529 8.83434 2.84606 8.55995L3.53866 6.06071C3.59075 5.8711 3.50394 5.67479 3.31101 5.54986L0.927409 4.00838C0.668888 3.8143 0.811653 3.47521 1.16857 3.43506L4.33159 3.21644C4.45278 3.208 4.5688 3.17463 4.66756 3.11983C4.76631 3.06502 4.84417 2.99079 4.89301 2.90487L6.1914 0.62202C6.35249 0.37217 6.81359 0.37217 6.97371 0.621277Z" fill="#FDD835"/>
          <path d="M6.87874 3.04095L6.6588 1.35893C6.65012 1.26523 6.62504 1.10461 6.81989 1.10461C6.97423 1.10461 7.05816 1.35223 7.05816 1.35223L7.71796 2.70261C7.96684 3.21644 7.86459 3.39268 7.62439 3.49678C7.34851 3.61576 6.94144 3.52281 6.87874 3.04095Z" fill="#FFFF8D"/>
          <path d="M9.60003 5.40114L11.4926 4.26269C11.5862 4.20246 11.755 4.10653 11.62 3.99722C11.5129 3.91097 11.2235 4.03515 11.2235 4.03515L9.56723 4.5341C9.07334 4.66572 8.74537 4.86054 8.71643 5.10593C8.67881 5.43311 9.05983 5.68519 9.60003 5.40114Z" fill="#F4B400"/>
          </svg>
        </div>
       
        </div>

      </div>
      
    </div>
    <div class="flex justify-end w-1/3">
      <strong class="flex justify-end">$59.99</strong>
    </div>
    </div>
   <hr style="width: 90%; height: 10px; margin: auto;">

  </section>
  <!-- hadi 3 talta -->
  <section id="child" class="  m-auto bg-gray-300  w-1/2  "style="      box-shadow: -1px 4px 6px 0px #898989;
  border-radius: 10px;" >

    <img class="w-full" src="images/Rectangle 9.png" alt="" srcset="">
    <div class="m-3"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, veniam.</p>
    </div>
    <div class="flex flex-row gap-2 w-full " style="padding: 5px;" >
        <div class="w-1/3 bg-white rounded-md text-center"><p>figma</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>photoshop</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>adobe XD</p></div>
    </div>
     <!-- hadi diyal dak review -->
     <div class="flex flex-row items-center justify-around w-full">
    <div  class="flex flex-row gap-2" style="margin: 15px;">
      <!-- hadi diyal tsswira -->
      
      <div class="flex items-center ">
        <img class="h-9" src="images/revie.svg" alt="" srcset="">
      </div>
      <!-- hadi li fiha tswira diyal dak lcommnet o ssmiya o reviews -->
      <div>
        <p> by <strong>vishal M.</strong></p>
        <div class="flex flex-row gap-3">
          <div class="flex">
        <p>4,5 </p>
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
          <path d="M6.97371 0.621277L8.27211 2.90413C8.32095 2.99004 8.3988 3.06428 8.49756 3.11908C8.59631 3.17389 8.71233 3.20725 8.83352 3.2157L11.9965 3.43432C12.3544 3.47447 12.4972 3.81281 12.2377 4.00763L9.85507 5.5506C9.66214 5.67553 9.57436 5.87184 9.62741 6.06146L10.32 8.5607C10.3808 8.83509 10.0075 9.04478 9.68722 8.91465L6.92645 7.66838C6.82232 7.62127 6.70377 7.59643 6.58304 7.59643C6.4623 7.59643 6.34376 7.62127 6.23963 7.66838L3.47886 8.91391C3.15956 9.04329 2.78529 8.83434 2.84606 8.55995L3.53866 6.06071C3.59075 5.8711 3.50394 5.67479 3.31101 5.54986L0.927409 4.00838C0.668888 3.8143 0.811653 3.47521 1.16857 3.43506L4.33159 3.21644C4.45278 3.208 4.5688 3.17463 4.66756 3.11983C4.76631 3.06502 4.84417 2.99079 4.89301 2.90487L6.1914 0.62202C6.35249 0.37217 6.81359 0.37217 6.97371 0.621277Z" fill="#FDD835"/>
          <path d="M6.87874 3.04095L6.6588 1.35893C6.65012 1.26523 6.62504 1.10461 6.81989 1.10461C6.97423 1.10461 7.05816 1.35223 7.05816 1.35223L7.71796 2.70261C7.96684 3.21644 7.86459 3.39268 7.62439 3.49678C7.34851 3.61576 6.94144 3.52281 6.87874 3.04095Z" fill="#FFFF8D"/>
          <path d="M9.60003 5.40114L11.4926 4.26269C11.5862 4.20246 11.755 4.10653 11.62 3.99722C11.5129 3.91097 11.2235 4.03515 11.2235 4.03515L9.56723 4.5341C9.07334 4.66572 8.74537 4.86054 8.71643 5.10593C8.67881 5.43311 9.05983 5.68519 9.60003 5.40114Z" fill="#F4B400"/>
          </svg>
        </div>
       
        </div>

      </div>
      
    </div>
    <div class="flex justify-end w-1/3">
      <strong class="flex justify-end">$59.99</strong>
    </div>
    </div>
   <hr style="width: 90%; height: 10px; margin: auto;">

  </section>
  <!-- hadi 4 rab3a -->
  <section id="child" class="  m-auto bg-gray-300  w-1/2  "style="      box-shadow: -1px 4px 6px 0px #898989;
  border-radius: 10px;" >

    <img class="w-full" src="images/Rectangle 9.png" alt="" srcset="">
    <div class="m-3"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, veniam.</p>
    </div>
    <div class="flex flex-row gap-2 w-full " style="padding: 5px;" >
        <div class="w-1/3 bg-white rounded-md text-center"><p>figma</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>photoshop</p></div>
        <div class="w-1/3 bg-white rounded-md  text-center"><p>adobe XD</p></div>
    </div>
     <!-- hadi diyal dak review -->
     <div class="flex flex-row items-center justify-around w-full">
    <div  class="flex flex-row gap-2" style="margin: 15px;">
      <!-- hadi diyal tsswira -->
      
      <div class="flex items-center ">
        <img class="h-9" src="images/revie.svg" alt="" srcset="">
      </div>
      <!-- hadi li fiha tswira diyal dak lcommnet o ssmiya o reviews -->
      <div>
        <p> by <strong>vishal M.</strong></p>
        <div class="flex flex-row gap-3">
          <div class="flex">
        <p>4,5 </p>
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
          <path d="M6.97371 0.621277L8.27211 2.90413C8.32095 2.99004 8.3988 3.06428 8.49756 3.11908C8.59631 3.17389 8.71233 3.20725 8.83352 3.2157L11.9965 3.43432C12.3544 3.47447 12.4972 3.81281 12.2377 4.00763L9.85507 5.5506C9.66214 5.67553 9.57436 5.87184 9.62741 6.06146L10.32 8.5607C10.3808 8.83509 10.0075 9.04478 9.68722 8.91465L6.92645 7.66838C6.82232 7.62127 6.70377 7.59643 6.58304 7.59643C6.4623 7.59643 6.34376 7.62127 6.23963 7.66838L3.47886 8.91391C3.15956 9.04329 2.78529 8.83434 2.84606 8.55995L3.53866 6.06071C3.59075 5.8711 3.50394 5.67479 3.31101 5.54986L0.927409 4.00838C0.668888 3.8143 0.811653 3.47521 1.16857 3.43506L4.33159 3.21644C4.45278 3.208 4.5688 3.17463 4.66756 3.11983C4.76631 3.06502 4.84417 2.99079 4.89301 2.90487L6.1914 0.62202C6.35249 0.37217 6.81359 0.37217 6.97371 0.621277Z" fill="#FDD835"/>
          <path d="M6.87874 3.04095L6.6588 1.35893C6.65012 1.26523 6.62504 1.10461 6.81989 1.10461C6.97423 1.10461 7.05816 1.35223 7.05816 1.35223L7.71796 2.70261C7.96684 3.21644 7.86459 3.39268 7.62439 3.49678C7.34851 3.61576 6.94144 3.52281 6.87874 3.04095Z" fill="#FFFF8D"/>
          <path d="M9.60003 5.40114L11.4926 4.26269C11.5862 4.20246 11.755 4.10653 11.62 3.99722C11.5129 3.91097 11.2235 4.03515 11.2235 4.03515L9.56723 4.5341C9.07334 4.66572 8.74537 4.86054 8.71643 5.10593C8.67881 5.43311 9.05983 5.68519 9.60003 5.40114Z" fill="#F4B400"/>
          </svg>
        </div>
       
        </div>

      </div>
      
    </div>
    <div class="flex justify-end w-1/3">
      <strong class="flex justify-end">$59.99</strong>
    </div>
    </div>
   <hr style="width: 90%; height: 10px; margin: auto;">

  </section>
 
 </section>
</div>

    </section>

   </main>
   
   <?php 
             include("./include/footer.php");
          ?>


 <script src="../javascript/jquery.js"></script>


 <script src="../javascript/script.js"></script>
<script src="../javascript/serch.js"></script>
</body>
</html>


  
   
    
  
   