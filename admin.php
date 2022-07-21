<?php
include 'config.php';


if (isset($_POST["addproductbutton"])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $quantity = $_POST['quantity'];

    $file = $_FILES['Image'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {

        $destfile = 'images/' . $filename;

        move_uploaded_file($filepath, $destfile);

        $sql = "INSERT INTO products (name, price, cat, quantity, imgsrc)
					VALUES ('$name', '$price', '$cat', '$quantity', '$destfile')";
        $result = mysqli_query($conn, $sql);
        echo
        "<script> alert('Product Added Successfully'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

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
                            <li><a href="newproductsadmin.php">Products</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </div>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <h1>Admin Panel</h1>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="form-container">
                    <form action="" method="POST" id="addProduct" enctype="multipart/form-data">
                        <input type="text" placeholder="Product Name" name="name" required>
                        <input type="text" placeholder="Price" name="price" required>
                        <input type="text" placeholder="Category" name="cat" required>
                        <input type="text" placeholder="quantity" name="quantity" required>
                        <input class="image" type="file" name="Image">
                        <button type="submit" name="addproductbutton" class="submit-btn">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>