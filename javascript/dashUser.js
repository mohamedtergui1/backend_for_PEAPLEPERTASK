
const modal_add_user = document.querySelector("#add_user");
const  btn_close_modal =document.querySelector("#btn_add_user");
btn_close_modal.addEventListener('click',()=>{
    modal_add_user.showModal();
})
const close_btn = document.querySelector("#close_btn");
close_btn.addEventListener('click',()=>{
   modal_add_user.close();
})