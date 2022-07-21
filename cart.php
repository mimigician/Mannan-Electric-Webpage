<?php
include 'config.php';
require_once('connectdb.php');
require_once('component.php');

$db = new ConnectDb("signin", "products");
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['p_id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
}
if (isset($_POST['confirm'])) {
    

    $login_username = $_SESSION['login_username'];
    $login_address = $_SESSION['login_address'];
    $product_id = array_column($_SESSION['cart'], 'product_id');
    $result = $db->getData();
    // while ($row = mysqli_fetch_assoc($result)) {
    foreach ($product_id as $id) {
        // if ($row['p_id'] == $id) {
        $sql = "INSERT INTO orders (username, p_id, address) VALUES ('$login_username', '$id','$login_address')";
        $result = mysqli_query($conn, $sql);
        // }
    }
    // }
    unset ($_SESSION['cart']);
    echo "<script>alert('Order Confirmed')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <div class="c_header">
        <div class="c_container">
            <?php
            include 'nav.php';
            ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product_id as $id) {
                                if ($row['p_id'] == $id) {
                                    cartElement($row['imgsrc'], $row['name'], $row['price'], $row['p_id']);
                                    $total = $total + $row['price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Cart is empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Price details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }

                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <?php echo $total . ' Tk' ?>
                                <h6 class="text-success">Free</h6>
                                <hr>
                                <h6><?php echo $total . ' Tk' ?></h6>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form action="./cart.php" method="post">
            <button type="submit" class="confirm" name="confirm">Confirm</button>
        </form>
    </div>
    <!-- The Modal -->
    <?php
    include 'modal.php';
    ?>

</body>

</html>