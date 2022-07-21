<?php  
// session_start(); 
include 'config.php';
require_once('component.php'); 
require_once('connectdb.php');  
$database = new ConnectDb("signin", "products");
if(!isset($_SESSION['login_username'])){
    header("Location: newproducts.php");
}


if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id= array_column($_SESSION['cart'],"product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart')</script>";
            //echo "<script>window.location = 'newproducts.php'</script>";
        }else{
            $count=count($_SESSION['cart']);
            $item_array= array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array= array(
            'product_id' => $_POST['product_id']
        );

        //create new session variable
        $_SESSION['cart'][0] = $item_array;
    }
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
            <?php
            include 'nav.php';
            ?>
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
                    component($row['name'], $row['price'], $row['imgsrc'], $row['p_id']);
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