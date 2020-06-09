 // Handle for Login button
 const popUpLogin = document
     .querySelector(".loginBtn")
     .addEventListener("click", openFormLogin);

 // Handle for Cancel login button
 const closeButton = document
     .querySelector(".closeButton")
     .addEventListener("click", closeForm);

 // handle for Close reg button
 const closeButtonReg = document
     .querySelector(".closeButtonReg")
     .addEventListener("click", closeFormReg);

 // Handle for Reg button
 const regButton = document
     .querySelector(".regBtn")
     .addEventListener("click", openFormReg);


 // Open Reg form function    
 function openFormReg(e) {
     e.preventDefault();
     document.querySelector(".popUpFormReg").style.display = "block";
 }

 // Open Login form function
 function openFormLogin(e) {
     e.preventDefault();
     document.querySelector(".popUpFormLogin").style.display = "block";
 }

 // close Login form function
 function closeForm(e) {
     e.preventDefault();
     document.querySelector(".popUpFormLogin").style.display = "none";
 }

 // close Reg form function
 function closeFormReg(e) {
     e.preventDefault();
     document.querySelector(".popUpFormReg").style.display = "none";
 }