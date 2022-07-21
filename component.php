<?php
    function component($productname,$productprice,$productimg,$productid){
        $element = "
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"newproducts.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg \" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">$productname</h4>
                            <h5>
                                <span class=\"price\">৳ $productprice </span>
                            </h5>
                            <button type=\"submit\" name=\"add\" class=\"addtocart\">Add to cart</button>
                            <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
        ";
        echo $element;
    }

    function component2($productname,$productprice,$productimg,$productid){
        $element = "
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"newproductsadmin.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg \" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">$productname</h4>
                            <h5>
                                <span class=\"price\">৳ $productprice </span>
                            </h5>
                            <button type=\"submit\" name=\"remove\" class=\"addtocart\">Remove</button>
                            <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
        ";
        echo $element;
    }



    function cartElement($productimg, $productname, $productprice, $productid){
        $element="
        <form action=\"cart.php?action=remove&p_id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <h5 class=\"pt-2\">$productprice</h5>
                                <button type=\"submit\" name=\"remove\">Remove</button>
                            </div>
                            
                        </div>
                    </div>
                </form>";
                echo $element;
    }
    
    function confirmButton($login_username, $product_id)
    {
        $server = "localhost"; //returns host name
    $user = "root"; //root is the folder where a PHP script is running.
    $pass = ""; 
    $database = "signin"; //name of database

    $conn = mysqli_connect($server, $user, $pass, $database); //connects database to the server
        $sql = "INSERT INTO orders (username, p_id)
					VALUES ('$login_username', '$product_id')";
		$result = mysqli_query($conn, $sql);
    }
?>