const btn_add_freelancer =document.querySelector("#btn_add_freelancer");
const add_freelancer_modal=document.querySelector("#add_freelancer");
btn_add_freelancer.addEventListener('click',()=>{
    add_freelancer_modal.showModal();
    
})

const close_btn = document.querySelector("#close_btn");
close_btn.addEventListener('click',()=>{
    add_freelancer_modal.close();
})

const edit_freelancer_btn =document.querySelectorAll(".edit_freelancer_btn")
const edit_freelancer_modal =document.querySelector("#edit_freelancer");
const competence_input=document.querySelector("#competence_form");
const name_input=document.querySelector("#name_form");
const id_form=document.querySelector("#id_form");
const id_freelancer=document.querySelectorAll(".id_freelancer");
const freelandersNAME=document.querySelectorAll(".freelandersNAME");
const freelanderCompetences=document.querySelectorAll(".freelanderCompetences");
console.log(id_freelancer)
edit_freelancer_btn.forEach((btn,i) => {
    btn.addEventListener('click',()=>{
        edit_freelancer_modal.showModal();
        id_form.value=id_freelancer[i].value;
        name_input.value=freelandersNAME[i].textContent;
        competence_input.value=freelanderCompetences[i].textContent;
    })
});

const close_btn_edit = document.querySelector("#close_btn_edit");
close_btn_edit.addEventListener('click',()=>{
    edit_freelancer_modal.close();
})