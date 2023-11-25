
const value_hidden_input = document.querySelectorAll(".edit_category_hidden");
const modal_cetegory_edit = document.querySelector("#edit_caregory");
const btns = document.querySelectorAll(".btn_edit_category");
const input_submit_edit_category = document.querySelector("#input_submit_edit_cztegory");
const hidden_input_edit_category_from = document.querySelector("#hidden_input_edit_category_from");
const category_old_value = document.querySelectorAll(".category_old_value");


btns.forEach((button, i) => {
     button.addEventListener('click', () => {
          modal_cetegory_edit.showModal();
          hidden_input_edit_category_from.value = value_hidden_input[i].value;
          input_submit_edit_category.value = category_old_value[i].textContent;
     })
});


const modal_edir_sub_category = document.querySelector("#edit_subcaregory");
const btn_edit_sub_cate  =document.querySelectorAll(".btn_edit_sub_category");
const old_name_subcategory =document.querySelectorAll(".name_subcategory");
const hidden_input_id_value_subcategry =document.querySelectorAll(".hidden_input_id_value_subcategry");
const hidden_input_edit_subcategory_from =document.querySelector("#hidden_input_edit_subcategory_from");
const edit_sub_category_new_name =document.querySelector("#input_submit_edit_sub_category");
btn_edit_sub_cate.forEach((btn,j) => {
     btn.addEventListener('click', () => {
          
          modal_edir_sub_category.showModal();
          hidden_input_edit_subcategory_from.value = hidden_input_id_value_subcategry[j].value;
          edit_sub_category_new_name.value = old_name_subcategory[j].textContent;
     })
});







$(document).ready(function () {

     $("#clse_btn_category_esdit").click(() => {
          modal_cetegory_edit.close();

     });
     $("#clse_btn_sub_category_edit").click(() => {
          modal_edir_sub_category.close();
     })


});

