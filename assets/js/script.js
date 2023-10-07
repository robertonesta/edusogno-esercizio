const Modal_Delete = document.getElementById('modal');
const Show_Modal = document.getElementById('show_modal');
const Hide_Modal = document.getElementById('chiudi');

Show_Modal.addEventListener("click", function(){
    Modal_Delete.classList.remove('d-none');
})

Hide_Modal.addEventListener("click", function(){
    Modal_Delete.classList.add('d-none');
})
