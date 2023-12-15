// Get the modal
var genreModal = document.getElementById("genre-modal");

// Get the button that opens the modal
var genreBtn = document.getElementById("genre-btn");

// Get the <span> element that closes the modal
var genreSpan = document.getElementById("genre-close");

// When the user clicks the button, open the modal 
genreBtn.onclick = function() {
  genreModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
genreSpan.onclick = function() {
  genreModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == genreModal) {
    genreModal.style.display = "none";
  }
}



// form display
const login = document.getElementById('form-content2');
const signup = document.getElementById('form-content');
const login_btn = document.getElementById('login-btn');
const signup_btn = document.getElementById('signup-btn');

// display function 
const display = (x) => {

  x.style.display = 'flex';
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == x) {
    x.style.display = "none";
    }
  }

return x;
}

// displaying login form
// login_btn.addEventListener('click', e =>{
//   display(login);
// } );
// displaying signup form
// signup_btn.addEventListener('click', e =>{
//   display(signup);
// } );



// carousel
const prev = document.getElementById('prev');
const next = document.getElementById('next');
const carouselContainerWidth = document.querySelector('.carousel-container').offsetWidth;
const carouselTrack = document.querySelector('.carousel-track');
let index = 0;

next.addEventListener('click', () => {
  index ++;
  prev.classList.add('show');
  carouselTrack.style.transform = `translateX(-${index * carouselContainerWidth}px)`;
  if(carouselTrack.offsetWidth - (index * carouselContainerWidth) < carouselContainerWidth){
    next.classList.add('hide');
    }
  // console.log(carouselTrack);
});

prev.addEventListener('click', () => {

  index--;
  next.classList.remove('hide');
  
  if (index == 0) {
    prev.classList.remove('show'); 
  }
  
  carouselTrack.style.transform = `translateX(-${index * carouselContainerWidth}px)`
});

// console.log(carouselContainerWidth);
// next.onclick = function(){alert("hello");} 





const form = document.getElementById('form1');
const username = document.getElementById('uname');
const email = document.getElementById('mail');
const password = document.getElementById('pswd');
const password2 = document.getElementById('password2');

// form.addEventListener('submit', (e) => {
//   e.preventDefault;
//   checkInputs();
// } );

// function checkInputs(){
//   // get the values from the inputs
//   const usernameValue = username.value.trim();
//   const emailValue = email.value.trim();
//   const passwordValue = password.value.trim();
//   const password2Value = password2.value.trim();

//   if(usernameValue == ''){
//     // show error
//     // add error class
//     setErrorFor(username, 'Username cannot be blank');
//   }else{
//     // add success class
//     setSuccessFor(username);
//   }
// }

// function setErrorFor(input, message){
//   const formControl = input.parentElement; // .form control
//   // const small = formControl.querySelector('small');

//   // add error message inside small
//   small.innerText = message;

//   // add error class
//   formControl.className = 'form-control error';
  
// }

// function setSuccessFor(input){
//   const formControl = input.parentElement;
//   formControl.className = 'form-control success';
// }

// function show_genre(){
  
// }

// alert('ok');
// var  a =5; var b=5;var c =a+b;
// console.log(c);













