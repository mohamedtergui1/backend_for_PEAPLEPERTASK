//FAQ section 
const faqs = document.querySelectorAll('.answer')
const btn_faq = document.querySelectorAll('.btn_faq')

btn_faq.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        faqs[index].classList.toggle("hidden");
      
    });
  });
  //function for modal 
const modalContent = document.getElementById('modal_content');

function openModal() {
    modalContent.classList.remove('hidden');
}

function closeModal() {
    modalContent.classList.add('hidden');
}