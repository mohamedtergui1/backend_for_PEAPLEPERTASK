$( document ).ready(function() {
   if(localStorage.getItem("mode")==="normal"){
      $("html").removeClass("dark");
   }
   else{
     
      $("html").addClass("dark");
   }
   $("#btn_sidebar").click(function(){
      $("#sidebar").addClass("-translate-x");
      $("#sidebar").removeClass("-translate-x-full");
      
   })
   $("#close_btn_side_bar").click(function(){
    $("#sidebar").removeClass("-translate-x");
    $("#sidebar").addClass("-translate-x-full");
   });
    
   $("#dar_mode_btn").click(()=>{
       $("html").toggleClass("dark");
       if($("html").hasClass("dark")){
       localStorage.setItem("mode","dark");
      }
      else{
          localStorage.setItem("mode","normal");

      }
   })
   $("#search_btn").click(()=>{
      $("#input_search").slideToggle(500);
      $("#title_search").slideToggle(500);
   })
});
