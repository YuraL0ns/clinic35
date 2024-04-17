var modal = document.getElementById("myModal");
var closeBtn = document.getElementsByClassName("close")[0];

// Функция открытия модального окна
function openModal() {
  modal.style.display = "block";
}

// Функция закрытия модального окна
function closeModal() {
  modal.style.display = "none";
}

// Закрытие модального окна при клике на крестик
closeBtn.onclick = function() {
  closeModal();
}

// Закрытие модального окна при клике вне окна
window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}
