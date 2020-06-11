// Function to open popup project form
function openForm(e) {
  e.preventDefault();
  document.querySelector(".popUpForm").style.display = "block";
}

//Function to close popup project form if cancel button is pressed
function closeForm(e) {
  e.preventDefault();
  document.querySelector(".popUpForm").style.display = "none";
}

//Handle for add project button
const popUp = document
  .querySelector(".popUp")
  .addEventListener("click", openForm);

//Handle for cancel button
const closeButton = document
  .querySelector(".closeButton")
  .addEventListener("click", closeForm);




const editBtn = document
  .querySelector(".editBtn")
  .addEventListener("click", openForm);



// alert('doh')
// console.log(`STUFF ${editBtn}`)