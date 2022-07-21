<?php

include 'config.php';

// session_start();

error_reporting(0);
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $delete = $_GET['id'];
        $sql_delete = "DELETE FROM orders WHERE id = $delete";
        $result = mysqli_query($conn, $sql_delete);
        echo "<script>alert('Order marked as delivered')</script>";
        echo "<script>location.replace('orders.php')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>orders</title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
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
                            <li><a href="admin.php">Add Products</a></li>
                            <li><a href="newproductsadmin.php">All Products</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </div>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="customers">
            <tr>
                <th width="25%">User</th>
                <th widht="15%">Product ID</th>
                <th width="25%">Time</th>
                <th widht="15%">Address</th>
                <th width="10%">Condition</th>
            </tr>
            <?php
            $query = "select * from orders order by id asc";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["p_id"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td align="center"><a href="orders.php?action=delete&id=<?php echo $row["id"]; ?>"><button style="border-radius: 20px;
            border: 1px solid rgb(115, 151, 240);
            background-color: rgb(115, 151, 250);
            color: black;
            font-size: 12px;
            padding: 5px 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;"><i class="fa-solid fa-trash-can"></i> Undelivered</button></a></td>
                    </tr>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </table>
    </div>
</body>