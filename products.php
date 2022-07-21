<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['login_username'])) {
    header("Location: productsafterlogin.php");
}

if(isset($POST['add'])){
    print_r($_POST['product_id']);
}
else{echo 'nope';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="header">
        <div class="c_container">
            <?php
            include 'nav.php';
            ?>
        </div>
    </div>

    <div class="small-container">
        <div class="c_row">
            <h2>All Products</h2>
        </div>
        <div class="middle">
            <div class="boxContainer">
                <table class="elementContainer">
                    <tr>
                        <td>
                            <input id="myInput" type="text" class="search" placeholder=" Search..." onkeyup="myFunction()">
                        </td>
                        <td>
                            <a href="#">
                                <i class='fas fa-search' style="color:black"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <section id="allproducts">
        <div class="row mx-auto container-fluid">
        <?php
        include 'config.php';
        global $conn;
        $qq = "Select * from products";
        $resqq = mysqli_query($conn, $qq);
        $resqqcheck = mysqli_num_rows($resqq);
        if ($resqqcheck > 0) {
            echo $rowqq['name'];
            while ($rowqq = mysqli_fetch_assoc($resqq)) {
                    $name = $rowqq['name'];
                    $price = $rowqq['price'];
                    $quantity = $rowqq['quantity'];
                    $imgsrc = $rowqq['imgsrc'];
                    echo "
                    
                        <div class='product text-center col-lg-3 col-md-4 col-12 mb-4'>
                            <img class='img-fluid mb-3' src='" . $rowqq['imgsrc'] . "'>
                            <h4 class='p-name'>" . $rowqq['name'] . "</h4>
                            <h5 class='p-price'>" . $rowqq['price'] . ' Tk'."</h5>
                            <button class='cartbutton' name='add'>
                                Add to cart
                            </button>
                            <input type='hidden' name='product_id' value=$productid>
                        </div>
                    
                ";
                
            }
        }


        ?>
        </div>
        </section>

        <!-- <section id="allproducts">
            <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-12 mb-4">
                    <img class="img-fluid mb-3" src="images/brbfan.jfif" alt="">
                    <h4 class="p-name">BRB Fan</h4>
                    <h5 class="p-price">2900 Tk</h5>
                    <button class="cartbutton">
                        Add to cart
                    </button>
                </div>
            </div>
        </section> -->


        <!-- <div class="row">
            <div class="col-4">
                <a href=""><img src="images/brbwire.jpg"></a>
                <h4>BRB wire</h4>
                <p>3000.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/superstarfan.jpeg"></a>
                <h4>Super Star Fan</h4>
                <p>2450.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/rootscircuit.png"></a>
                <h4>Roots Cicuit</h4>
                <p>290.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/superstarbulb.png"></a>
                <h4>Superstar Bulb</h4>
                <p>390.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href=""><img src="images/brbfan.jfif"></a>
                <h4>BRB Fan</h4>
                <p>2900.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/osakatape.jfif"></a>
                <h4>Osaka Tape</h4>
                <p>20.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/khanmulti.jpg"></a>
                <h4>Khan Multi</h4>
                <p>340.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/cellmeter.jpg"></a>
                <h4>Cell Meter</h4>
                <p>600.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href=""><img src="images/superstarcircuit.jfif"></a>
                <h4>Super Star circuit</h4>
                <p>140.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/osakabulb.jpg"></a>
                <h4>Osaka Bulb</h4>
                <p>300.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/osakatube.jfif"></a>
                <h4>Osaka Tubelight</h4>
                <p>410.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
            <div class="col-4">
                <a href=""><img src="images/khan3gang.jpg"></a>
                <h4>Khan 3 gang</h4>
                <p>275.00Tk</p>
                <button class="cartbutton">
                    Add to cart
                </button>
            </div>
        </div> -->




        <!---------footer------>
        <footer>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li><a href="https://twitter.com/?lang=en">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li><a href="https://www.pinterest.com/">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a></li>
                <li><a href="https://www.instagram.com/">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
            </ul>
            <ul class="menuu">
                <li>email: rakib34216@gmail.com</li>

            </ul>
            <p>@2022 Mannan Electric | All Rights Reserved</p>
        </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>