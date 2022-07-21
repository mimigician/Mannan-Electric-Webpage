<?php  
// session_start(); 
include 'config.php';
require_once('component.php'); 
require_once('connectdb.php');  
$database = new ConnectDb("signin", "products");

if(isset($_POST['remove'])){
    $product_id = $_POST['product_id'];  //md5() encrypts the password

    $sql = "DELETE FROM products WHERE p_id='$product_id'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/newproductsafterlogin.css">
</head>

<body>
    <div class="header">
        <div class="c_container">
            <div class="c_navbar">
                <nav>
                    <ul>
                        <div class="logo">
                            <li> <img src="images/logo.png"></li>
                        </div>
                        <div class="navtext">
                            <li><a href="admin.php">Add Product</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </div>

                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <?php
    include 'modal.php';
    ?>

    <form action="newproductsafterlogin.php" method="POST" class="cat-search">

          <select name="cat" id="cat">
            <option value="" disabled selected hidden>All Category</option>
            <option value="wire">Wires</option>
            <option value="fan">Fan</option>
            <option value="circuit">Circuit</option>
            <option value="bulb">Bulb</option>
            <option value="tape">Tape</option>
            <option value="socket">Socket</option>
            <option value="meter">meter</option>
          </select>
          <input class="btn button1" name="searchInAllProducts" type="submit" value="Search" />
        </form>


    <!-- prducts cards -->
    <div class="container">
        <div class="row text-center py-5">
            <?php

            if(isset($_POST['cat'])){
                $a = $_POST['cat'];
                $result = $database->getCatData($a);
                while($row= mysqli_fetch_assoc($result)){
                    component($row['name'], $row['price'], $row['imgsrc'], $row['p_id']);
                }
            }
           else{
                $result = $database->getData();
                while($row= mysqli_fetch_assoc($result)){
                    component2($row['name'], $row['price'], $row['imgsrc'], $row['p_id']);
                }
            }
            
            ?>
        </div>
    </div>

    <!---------footer------>
    <?php
    include 'footer.php';
    ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>