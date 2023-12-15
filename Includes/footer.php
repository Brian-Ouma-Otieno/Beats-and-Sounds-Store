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

            var input = $(this).val();
            
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
                $("#search_results").css("display","none");
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

    // // Set the date we're counting down to
    // var countDownDate = new Date("oct 25, 2023 00:00:00").getTime();
   
    // // Update the count down every 1 second
    // var x = setInterval(function() {

    // // Get today's date and time
    // var now = new Date().getTime();
        
    // // Find the distance between now and the count down date
    // var distance = countDownDate - now;
        
    // // Time calculations for days, hours, minutes and seconds
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // // Output the result in an element with id="demo"
    // document.getElementById("timer").innerHTML = days + "d " + hours + "h "
    // + minutes + "m " + seconds + "s ";
        
    // // If the count down is over, write some text 
    // if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("timer").innerHTML = "EXPIRED";
    // }
    // }, 1000);
    
    function autoRefresh() {
        console.log('Hello');
    }

</script>







</body>
</html>







