let delBtn = document.getElementById('del');
let modalBtn = document.getElementById('no');
let modal = document.querySelector('.modal-container');

delBtn.addEventListener('click',()=>{
    modal.style.display = "flex";
});

function closeModal(){
    modal.style.display = "none";
}