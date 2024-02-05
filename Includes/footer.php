<footer class="margin" id="footer" style="margin-top:50px;text-align:center;">&copy; Copyright 2022 - <?php echo date("Y");?> Beats and Sounds Store</footer>

<!-- <div class="margin audio-control-container genre-container-s-details">
    <div class="audio-controls pos-middle">        
        <div class="s-controls">
            <button title="play" id="playBtn"><i class="fas fa-play"></i></button>
            <button title="stop" id="stopBtn"><i class="fas fa-stop"></i></button>
            <button title="mute" id="volumeBtn"><i class="fas fa-volume-up"></i></button>
        </div>  -->
        <!-- <div class="s-countbar">
            
        </div> -->
        <div id="waveform"></div>
       <!--  <span class="close" style="color: white;" onclick="login.style.display = 'none' "> &#10006; </span> -->
    <!-- </div>
</div> -->
<!-- <div id="waveform"></div> -->

<script src="/Beats and sounds store/Js/script.js"></script>
<script>

    const playBtn = document.getElementById('playBtn');
    const stopBtn = document.getElementById('stopBtn');
    const volumeBtn = document.getElementById('volumeBtn');

    const wavesufer = WaveSufer.create({
        container:'#waveform',
        waveColor:'#fff',
        progressColor:'#e74c3c'
    });

    wavesufer.load('/Beats and sounds store/Audio/Kalimba.mp3');

    // playBtn.onclick = function(){
    //     wavesufer.playPause();
    //     if (playBtn.src.includes('<button title="play" id="playBtn"><i class="fas fa-play"></i></button>')) {
    //         playBtn.src = '<button title="pause" id="playBtn"><i class="fas fa-pause"></i></button>';
    //     } else {
    //         playBtn.src = '<button title="play" id="playBtn"><i class="fas fa-play"></i></button>';
    //     }
    // }
    playBtn.addEventListener('click', () => {
        wavesufer.playPause();
        if (playBtn.src.includes('<button title="play" id="playBtn"><i class="fas fa-play"></i></button>')) {
            playBtn.src = '<button title="pause" id="playBtn"><i class="fas fa-pause"></i></button>';
        } else {
            playBtn.src = '<button title="play" id="playBtn"><i class="fas fa-play"></i></button>';
        }
    });  

    stopBtn.onclick = function(){
        wavesufer.stop();
        playBtn.src = '<button title="play" id="playBtn"><i class="fas fa-play"></i></button>';
    }
    volumeBtn.onclick = function(){
        wavesufer.toggleMute();
        if (volumeBtn.src.includes('<button title="play" id="playBtn"><i class="fas fa-volume-up"></i></button>')) {
            volumeBtn.src = '<button title="pause" id="playBtn"><i class="fas fa-volume-down"></i></button>';
        } else {
            volumeBtn.src = '<button title="play" id="playBtn"><i class="fas fa-volume-up"></i></button>';
        }
    }

    wavesufer.on('finish', function(){
        playBtn.src = '<button title="play" id="playBtn"><i class="fas fa-play"></i></button>';
        wavesufer.stop();
    });


    // const ctx = new (window.AudioContext || window.webkitAudioContext )();
    // const osc = ctx.createOscillator();
    // osc.connect(ctx.destination);
    // console.log(ctx);
</script>


<script>
    $(document).ready(function(){
        $("#live_search").keyup(function(){

            let input = $(this).val();
            
            if (input != "") {
                $.ajax({
                    url: "includes/search.inc_2.php",
                    method: "POST",
                    data: {input:input},

                    success: function(data){
                        $("#search_results").html(data);
                    }
                });
            } else {
                $("#search_results").css("display","block");
            }
        });
    });


    function addTocart(id){       
        const beatId = id;
        // const feature = featured;
        
        const data = {"Bid" : beatId};
        // const data = {"Bid" : beatId, "featured" : feature};
        $(document).ready(function () {
            
            jQuery.ajax({
                url : '/Beats and sounds store/Genres/addTocart.php',
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

    // Get the check out btn
    const checkOut = document.getElementById("checkOut");

    // Get the <span> element that closes the check out modal
    const modalClose = document.getElementById("modalClose");

    // Get the modal
    const cartModal = document.getElementById("cartModal");

    // When the user clicks the button, open the modal 
    checkOut.addEventListener('click', () => {
        cartModal.style.display = "block"; 
        cartModal.style.display = 'flex';  
    });

    // When the user clicks on <span> (x), close the modal
    modalClose.addEventListener('click', () => {
        cartModal.style.display = "none";
    });

    // // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == cartModal) {
            cartModal.style.display = "none";
        }
    }

    // check out process
    $(document).ready(function(){           
        $("#processOrder").submit(function(event){
            event.preventDefault();               
            const chkUname = $("#checkOutusername").val();
            const chkEmail = $("#checkOutmail").val();
            const chkNum = $("#checkOutnum").val();
            const chkPin = $("#checkOutpin").val();
            const chkOutbtn = $("#checkOutbtn").val();
            $(".chkMessage").load("../Cart/processOrder2.php", {
                chkUname: chkUname,
                chkEmail: chkEmail,
                chkNum: chkNum,
                chkPin: chkPin,
                chkOutbtn: chkOutbtn                    
            });              
        });
    });



    
    // function del(id) {
    //     var del = id;
    //     var data = {"Delid" : del};

    //     $(document).ready(function () {

    //         jQuery.ajax({
    //             url : '/Beats and sounds store/Cart/cartHandler.php',
    //             method : 'POST',
    //             data : data,   
    //             success: function(response){
    //                 $(document).ready(function () {        
    //                 setTimeout(function(){ location.reload(true);},10);        
    //                 // setTimeout(function(){ alert("Deleted");},1000);        
    //             });},                                       
    //             error : function(){alert("Something went wrong");}
    //         }); 
    //     });

        
    // }

    // const genreModall = document.getElementById("genre-modal");
    // const genreBtnn = document.getElementById("genre-btn");
    // genreBtnn.addEventListener('click', () => {
    //     genreModall.classList.toggle('hide');
    // //   console.log('hello');
    // //   alert('hello');
    // });

    // function autoRefresh() {
    //     $(document).ready(function () {        
    //         setTimeout(function(){ location.reload(true);},1000);        
    //     });
    // }
    
    const pswdRequirement = document.getElementById('pswdRequirement');
    const password = document.getElementById('pswd');
    const letter = document.getElementById("letter");
    const length = document.getElementById("length");
    const specialChar = document.getElementById("specialCharacter");
    const frm = document.querySelector('.frm');

    // When the user clicks on the password field, show the message box
    password.onfocus = function() {
        pswdRequirement.style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    password.onblur = function() {
        pswdRequirement.style.display = "none";
    }

    password.onkeyup = function() {
        // Validate special characters
        // const specialChar = /(@|#|&|%)/g;         
        // if(password.value.match(specialChar)) {  
        //     letter.classList.remove("invalid");
        //     letter.classList.add("valid");
        // } else {
        //     letter.classList.remove("valid");
        //     letter.classList.add("invalid");
        // }

        // Validate lowercase letters
        const lowerCaseLetters = /[a-z]/g;          
        if(password.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        const upperCaseLetters = /[A-Z]/g;
        if(password.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        const numbers = /[0-9]/g;
        if(password.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        
        // Validate length
        if(password.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }


</script>







</body>
</html>







