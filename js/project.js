// Function to open popup project form
function openForm(e) {
  clearForm()
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

// Get ahandle on all edit buttons
const editBtn = document
  .querySelectorAll(".editBtn")

// Add event listeners to all edit buttons
editBtn.forEach(function (element) {
  element.addEventListener("click", function (e) {
    e.preventDefault()
    fetcher(element.href)


  })
})

// fetch project info to create sticky fields for update form 
function fetcher(url) {

  fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log("data:", data)
        openEditForm(data)
      }

    )
}

// handles for various fields for the upate form
const nameField = document.querySelector("#project_name")
const notesField = document.querySelector("#notes")
const form = document.querySelector(".popUpForm")
const hiddenId = document.querySelector("#project_id")
const client = document.querySelector(".client")
closeButton.addEventListener("click", clearForm)


function openEditForm(data) {
  console.log(data)


  // Show the form popup
  document.querySelector(".popUpForm").style.display = "block"

  // Add current project values so user doesnt forget wha project they are editing
  client.setAttribute("type", "hidden")
  hiddenId.value = data[0].project_id
  nameField.value = data[0].project_name
  notesField.innerText = data[0].notes

  // change the action and submit for sql update
  form.action = "inc/update.inc.php"

}

// Clears form and sets attributes to defaut after an edit is made
function clearForm() {
  client.setAttribute("type", "text")
  hiddenId.value = ""
  nameField.value = ""
  notesField.innerText = ""
}