const btnTambah = document.getElementById('btnTambah');
const popupForm = document.getElementById('popupForm');
const closePopup = document.getElementById('closePopup');
const popupEditForm = document.getElementById('popupEditForm');
const closeEditPopup = document.getElementById('closeEditPopup');
const notificationPopup = document.getElementById('notificationPopup');
const closeNotification = document.getElementById('closeNotification');

btnTambah.addEventListener('click', function() {
    popupForm.style.display = 'flex';
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_start').value = today;
});

closePopup.addEventListener('click', function() {
    popupForm.style.display = 'none';
});

function editItinerary(id, title, description, date_start, date_end) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_date_start').value = date_start;
    document.getElementById('edit_date_end').value = date_end;
    popupEditForm.style.display = 'flex';
    popupForm.style.display = 'none';
}

closeEditPopup.addEventListener('click', function() {
    popupEditForm.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === popupForm) {
        popupForm.style.display = 'none';
    }
    if (event.target === popupEditForm) {
        popupEditForm.style.display = 'none';
    }
});

closeNotification.addEventListener('click', function() {
    notificationPopup.style.display = 'none';
});

if (document.getElementById('notificationMessage').textContent.trim() !== '') {
    notificationPopup.style.display = 'flex';
    setTimeout(function() {
        notificationPopup.style.display = 'none';
    }, 3000);
}

function hapusItinerary(id) {
    if (confirm("Apakah Anda yakin ingin menghapus itinerary ini?")) {
        window.location.href = "hapus_itinerary.php?id=" + id + "&message=Itinerary berhasil dihapus.";
    }
}
