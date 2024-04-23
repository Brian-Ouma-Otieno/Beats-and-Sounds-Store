<footer class="margin" id="footer" style="margin-top:50px;text-align:center;">&copy; Copyright 2022 - <?php echo date("Y");?> Beats and Sounds Store</footer>


<!-- toast notification display -->
<div id="toastBox"></div>


<script src="/Beats and sounds store/Js/script.js"></script>

<script>

    // displaying progress bar
    // const display = document.getElementById('display');
    // const displayBar = document.getElementById('displayBar');
    // display.addEventListener('click', () => {
    //     // displayBar.style.display = "block";
    //     displayBar.style.display = "block";
    // });

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
        $(".chkMessage").load("../Cart/processOrder.php", {
            chkUname: chkUname,
            chkEmail: chkEmail,
            chkNum: chkNum,
            chkPin: chkPin,
            chkOutbtn: chkOutbtn                    
        });              
    });
    });


    
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







