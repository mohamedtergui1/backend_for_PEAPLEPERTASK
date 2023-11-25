var btn = document.getElementById("btnlist")
var list = document.getElementById("list")
 
    btn.addEventListener("click",()=>{
        
     
    list.classList.toggle("hidden")

})
// hadi diyal taniya li fside bar
var btn2 =document.getElementById("btn2")
var btn3 =document.getElementById("btn3")
var select =document.querySelector(".selection")
btn2.addEventListener("click",()=>{
    
    select.classList.toggle("hidden")
})
 btn3.addEventListener("click",()=>{
    select.classList.toggle("hidden")
 })
 
// hadi diyal talta  li fside bar
var btn4 =document.getElementById("btn4")
var btn5 =document.getElementById("btn5")
var select2 =document.querySelector(".selection2")
btn4.addEventListener("click",()=>{
    
    select2.classList.toggle("hidden")
})
 btn5.addEventListener("click",()=>{
    select2.classList.toggle("hidden")
 })


//  hada diyal dark mode
// var sunIcon =document.querySelector(".sun")
// var moonIcon =document.querySelector(".moon")

// var userTheme = localStorage.getItem("theme")
// var systemeTheme =window.matchMedia("(prefers-color-scheme: dark)").matches 

// const iconToggle =() =>{
//     moonIcon.classList.toggle("display-none");
//     sunIcon.classList.toggle("display-none");
// }
// const themeCheck =() =>{
//     if(userTheme === "dark" || (!userTheme && systemeTheme)){
//         document.documentElement.classList.add("dark")
//         moonIcon.classList.add("display-none")
//         return
//     }
//     sunIcon.classList.add("display-none")
// }

// const themeSwitch =() =>{
//     if(document.documentElement.classList.contains("dark")){

//         document.documentElement.classList.remove("dark");
//         localStorage.setItem("theme", "dark");
//         iconToggle();
//     }
// }

// sunIcon.addEventListener("click", () =>{

//     themeSwitch();
// })
// moonIcon.addEventListener("click", () =>{

//     themeSwitch();
// })
// themeCheck();








 
// hadi diyal recherche  li fside bar
var btn6 =document.getElementById("btn6")
var btn7 =document.getElementById("btn7")
var select3 =document.querySelector(".selection3")
var sol =document.getElementsByClassName("selection3")
btn6.addEventListener("click",()=>{
    

    select3.classList.toggle("hidden")
})
 btn7.addEventListener("click",()=>{
    select3.classList.toggle("hidden")
 })
// hadi diyal dik lkhra  li fside bar
var btn8 =document.getElementById("btn8")
var btn9 =document.getElementById("btn9")
var select4 =document.querySelector(".selection4")
 
btn8.addEventListener("click",()=>{
    
    select4.classList.toggle("hidden")
})
 btn9.addEventListener("click",()=>{
    select4.classList.toggle("hidden")
 })





