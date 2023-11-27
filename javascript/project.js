const modal_add= document.querySelector("#add_project");
const btn_add_project=document.querySelector("#btn_add_project");
btn_add_project.addEventListener('click',()=>{
    modal_add.showModal();
})
const cls_btn=document.querySelector("#cls_btn");
cls_btn.addEventListener('click',()=>{
    modal_add.close();
})