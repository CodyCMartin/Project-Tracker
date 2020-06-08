function openForm(e) {
  e.preventDefault();
  document.querySelector(".popUpForm").style.display = "block";
}

function closeForm(e) {
  e.preventDefault();
  document.querySelector(".popUpForm").style.display = "none";
}

const popUp = document
  .querySelector(".popUp")
  .addEventListener("click", openForm);

const closeButton = document
  .querySelector(".closeButton")
  .addEventListener("click", closeForm);
