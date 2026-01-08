const modal = document.querySelector('.modal-container');
const deleteForm = document.getElementById('deleteForm');
const confirmInput = document.getElementById('confirmInput');

let selectedId = null;

// attach event to ALL delete buttons
document.querySelectorAll('.del').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        selectedId = btn.dataset.id;

        // set form action dynamically
        deleteForm.action = `/delete/${selectedId}`;

        confirmInput.value = '';
        modal.style.display = 'flex';
    });
});

function closeModal() {
    modal.style.display = 'none';
}

// validate CONFIRM before submit
deleteForm.addEventListener('submit', (e) => {
    if (confirmInput.value !== 'CONFIRM') {
        e.preventDefault();
        alert("Type CONFIRM to delete.");
    }
});
