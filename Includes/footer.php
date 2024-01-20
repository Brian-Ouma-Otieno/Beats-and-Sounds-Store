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

    var playBtn = document.getElementById('playBtn');
    var stopBtn = document.getElementById('stopBtn');
    var volumeBtn = document.getElementById('volumeBtn');

    var wavesufer = WaveSufer.create({
        container:'#waveform',
        waveColor:'#fff',
        progressColor:'#e74c3c'
    });

    wavesufer.load('/Beats and sounds store/Audio/Kalimba.mp3');

    playBtn.onclick = function(){
        wavesufer.playPause();
        if (playBtn.src.includes('<button title="play" id="playBtn"><i class="fas fa-play"></i></button>')) {
            playBtn.src = '<button title="pause" id="playBtn"><i class="fas fa-pause"></i></button>';
        } else {
            playBtn.src = '<button title="play" id="playBtn"><i class="fas fa-play"></i></button>';
        }
    }
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

    function add_to_cart(){
        
    }
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


    function add_to_cart(id){       
        // var beat_id = id;
       
        // var pack_id = '<?= 0; ?>';
        // var pack_name = '<?= 0; ?>';
        // var pack_price = '<?= 0; ?>';
        // var pack_author = '<?= 0; ?>';
        
        // var data = {"Bid" : beat_id, "beat_name" : beat_name, "author" : author, "price" : price, 
        //             "Pid" : pack_id, "pack_name" : pack_name, "pack_author" : pack_author, "pack_price" : pack_price
        //             };
        // jQuery.ajax({
        //     // url : '/Beats and sounds store/Cart/add_to_cart.php',
        //     // url : '/Beats and sounds store/Genres/afrobeats.php',
        //     method : 'POST',
        //     data : data,                                
        //     error : function(){alert("Something went wrong");}
        // });
        
    }

    
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







