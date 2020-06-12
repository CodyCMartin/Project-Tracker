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

 // Handle for Reg button2
 const regButton2 = document
     .querySelector(".regBtn2")
     .addEventListener("click", openFormReg);

 // Handle for the span that will cycle through words
 const timedWord = document.querySelector(".timedWord")


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

 //  Function to display words on a rotation 
 function wordCycle() {
     timedWord.innerHTML = "from <strong>Anywhere</strong>"
     setTimeout(() => {
         timedWord.innerHTML = "as <strong>Planned</strong>"
         setTimeout(() => {
             timedWord.innerHTML = "at <strong>Anytime</strong>"
         }, 3000)
     }, 3000)
 }
 //  Call to rotate words then interval to keep them rotating 
 wordCycle()
 setInterval(wordCycle, 9000)