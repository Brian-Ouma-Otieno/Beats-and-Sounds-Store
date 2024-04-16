// Get the modal
const genreModal = document.getElementById("genre-modal");

// Get the button that opens the modal
const genreBtn = document.getElementById("genre-btn");

// Get the <span> element that closes the modal
const genreSpan = document.getElementById("genre-close");

// When the user clicks the button, open the modal 
genreBtn.addEventListener('click', () => {
  // genreModal.classList.toggle('show');
  // genreModal.classList.toggle('hide');
  genreModal.style.display = "block";   
});

// When the user clicks on <span> (x), close the modal
genreSpan.addEventListener('click', () => {
  genreModal.style.display = "none";
});

// // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == genreModal) {
    genreModal.style.display = "none";
  }
}



// changing audio icons when playing music
const changeIcon = (icon) => {
  const IsPlaying = icon.classList.contains('fa-play');

  if(IsPlaying){
      icon.classList.remove("fa-play");
      icon.classList.add("fa-pause");
  } else{
      icon.classList.remove("fa-pause");
      icon.classList.add("fa-play");
  }
}



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
});

prev.addEventListener('click', () => {

  index--;
  next.classList.remove('hide');
  
  if (index == 0) {
    prev.classList.remove('show'); 
  }
  
  carouselTrack.style.transform = `translateX(-${index * carouselContainerWidth}px)`
});




// adding items to cart and toast notification display
function addTocart(id,user){  

  const toastBox = document.getElementById('toastBox');    
  const successMsg = '<i class="fas fa-check-circle"></i> Added to cart'; 
  const errorMsg = '<i class="fas fa-exclamation-circle"></i> Please log in ';

  const beatId = id;
  const User = user;
  
  const data = {"Bid" : beatId};

  const toast = document.createElement('div');
  toast.classList.add('toast');
  toast.innerHTML = successMsg;
  toastBox.appendChild(toast);

  
  if (User == true) {

    toast.innerHTML = successMsg;
    setTimeout(() => {
      toast.remove();
    },1000);

    $(document).ready(function () {      
      jQuery.ajax({
        url : '/Beats and sounds store/Genres/addTocart.php',
        method : 'POST',
        data : data,   
        success: function(response){
          $(document).ready(function () {        
          setTimeout(function(){ location.reload(true);},1000);                
        });},                                       
        error : function(){alert("Something went wrong");}
      }); 
    }); 
  } else{
    toast.innerHTML = errorMsg;
    toast.classList.add('error');
    setTimeout(() => {
      toast.remove();
    },2000);
  }  
}



// deleting cart items
function del(id) {
  let del = id;
  let data = {"Delid" : del};

  $(document).ready(function () {

      jQuery.ajax({
          url : '/Beats and sounds store/Cart/cartHandler.php',
          method : 'POST',
          data : data,   
          success: function(response){
              $(document).ready(function () {        
              setTimeout(function(){ location.reload(true);},10);                
          });},                                       
          error : function(){alert("Something went wrong");}
      }); 
  }); 
}

function delAll(idAll) {
  let delAll = idAll;
  let dataAll = {"delAllid" : delAll};

  $(document).ready(function () {

      jQuery.ajax({
          url : '/Beats and sounds store/Cart/cartAllhandler.php',
          method : 'POST',
          data : dataAll,   
          success: function(response){
              $(document).ready(function () {        
              setTimeout(function(){ location.reload(true);},10);                
          });},                                       
          error : function(){alert("Something went wrong");}
      }); 
  });  
}




// auto cart delete
function autoDel(autocartDel1, autocartDel2, autocartDel3 ) {
  let autocartDlt1 = autocartDel1;
  let autocartDlt2 = autocartDel2;
  let autocartDlt3 = autocartDel3;
  let autoDeldata = {"cartAutoDelluserId" : autocartDlt1, "selectCartDate" : autocartDlt2, "selectCartBeatid" : autocartDlt3 };

  $(document).ready(function () {

      jQuery.ajax({
          url : '/Beats and sounds store/Cart/autocartDel.php',
          method : 'POST',
          data : autoDeldata,   
          success: function(response){
              $(document).ready(function () {        
              setTimeout(function(){ location.reload(true);},10);                
          });},                                       
          error : function(){alert("Something went wrong");}
      }); 
  });  
}














