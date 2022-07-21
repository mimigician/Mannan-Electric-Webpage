<?php

include 'config.php';

// session_start();

error_reporting(0);

if (isset($_SESSION['login_username'])) {
    header("Location: homeafterlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mannan Electric</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>

<body>
    <div class="header">
        <div class="container">
            <?php
            include 'navbar.php';
            ?>

            <div class="row">
                <div class="col-2">
                    <h1>Get all your electrical<br>item from one shop!</h1>
                    <a href="https://maps.app.goo.gl/tQM7vB7ijvcCnTEQ6" class="mapBtn">Get Location &#8594;</a>

                </div>
                <div class="col-2">

                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <img src="images/shop.jpg">
                        </div>
                        <div class="mySlides fade">
                            <img src="images/shop2.jpg">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <?php
    include 'modal.php';
    ?>
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>

    <!----- Categories ----->
    <div class="categories">
        <div class="row">
            <h2 class="title">Category</h2>
        </div>
        <div class="secondrow">
            <a href="newproducts.php">
                <div class="cat-item">
                    <span class="cat-icon">
                        <img src="images/wire.png" width="48px" height="48px">
                    </span>
                    <p> Wires</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">

                    <span class="cat-icon">
                        <img src="images/switch.png" width="48px" height="48px">
                    </span>
                    <p> Switch</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">

                    <span class="cat-icon">
                        <img src="images/bulb.png" width="35px" height="48px">
                    </span>
                    <p> Bulbs</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">
                    <span class="cat-icon">
                        <img src="images/fan.png" width="48px" height="48px">
                    </span>
                    <p> Fan</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">
                    <span class="cat-icon">
                        <img src="images/tape.png" width="48px" height="48px">
                    </span>
                    <p> Tape</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">
                    <span class="cat-icon">
                        <img src="images/socket.png" width="48px" height="48px">
                    </span>
                    <p> Socket</p>

                </div>
            </a>
            <a href="newproducts.php">
                <div class="cat-item">
                    <span class="cat-icon">
                        <img src="images/circuit-breaker.png" width="48px" height="48px">
                    </span>
                    <p> Circuit</p>

                </div>
            </a>
        </div>
    </div>

    <!---featured products----->
    <?php
    include 'featured.php';
    ?>

    <!---------footer------>
    <div id="foot-placeholder">

    </div>

    <script>
        $(function() {
            $("#foot-placeholder").load("footer.php");
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


</body>

</html>