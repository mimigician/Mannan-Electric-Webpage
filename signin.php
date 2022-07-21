<?php

include 'config.php';

// session_start();

error_reporting(0);

if (isset($_SESSION['login_username'])) {
    header("Location: homeafterlogin.php");
}

// if (isset($_POST['check-box'])) {
//     setcookie('login_username',$username,time()+30*86400);
//     // setcookie('logindata["password"]',$password,time()+30*86400);
//     setcookie("login_email",$email,time()+30*86400);
// }
// if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_username'])) {
//     $_SESSION['login_username'] = $_COOKIE['login_username'];

// } 

if (isset($_POST['login-submit-btn'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    $l_sql = "SELECT * FROM users WHERE username='$login_username' and password='$login_password'";
    $l_result = mysqli_query($conn, $l_sql);
    $l_rows = mysqli_num_rows($l_result);

    if ($login_username == 'admin' && $login_password == 'admin123') {
        if ($l_rows > 0) {
            $row = mysqli_fetch_assoc($l_result);
            $_SESSION['login_username'] = $row['username'];
            if(isset($_POST['check-box'])){
                setcookie("admin",$login_username,time()+86400);
            }
            header("Location: admin.php");
        } 
    } else {
        if ($l_rows > 0) {
            $row = mysqli_fetch_assoc($l_result);
            $_SESSION['login_username'] = $row['username'];
            $_SESSION['login_address'] = $row['address'];
            if(isset($_POST['check-box'])){
                $_SESSION['checked']='yes';
                setcookie("username",$row['username'],time()+86400);
            }
            
            header("Location: homeafterlogin.php");
        } else {
            echo "<script>alert('Username or password is wrong!')</script>";
        }
    }
}


if (isset($_POST['reg-submit-btn'])) {
    $reg_username = $_POST['reg_username'];
    $reg_email = $_POST['reg_email'];
    $reg_address = $_POST['reg_address'];
    $reg_password = $_POST['reg_password']; 

    $sql = "SELECT * FROM users WHERE username='$reg_username'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {  //email is not currently in database
        $sql = "INSERT INTO users (username, email, password, address)
					VALUES ('$reg_username', '$reg_email', '$reg_password','$reg_address')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Registration Successful!')</script>";
            $reg_username = "";
            $reg_email = "";
            $_POST['reg_password'] = "";
        } else {
            echo "<script>alert('Woops! Something went wrong!')</script>";
        }
    } else {
        echo "<script>alert('Sorry! Username Already Exists.')</script>";
    }
}

?>


<!DOCTYPE html>

<head>
    <title>Sign-in</title>
    <link rel="stylesheet" href="css/signin.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Sign In</span>
                        <span onclick="register()">Create New</span>
                        <hr id="Indicator">
                    </div>

                    <form action="" method="POST" id="LoginForm">
                        <input type="text" placeholder="Username" name="login_username" required>
                        <input type="password" placeholder="Password" name="login_password" required>
                        <button type="submit" name="login-submit-btn" class="submit-btn">Sign In</button>
                        <div class="bossremember">
                            <div>
                                <input type="checkbox" class="check-box" id="check-box" name="check-box">
                            </div>
                            <div class="remembertext">
                                <span class="remember"> Remember Me</span><br>
                            </div>
                        </div>
                    </form>

                    <form action="" method="POST" id="RegForm">
                        <input type="text" placeholder="Username" name="reg_username" required>
                        <input type="email" placeholder="Email" name="reg_email" required>
                        <input type="text" placeholder="Address" name="reg_address" required>
                        <input type="password" placeholder="Password" name="reg_password" value="<?php echo $_POST['reg_password']; ?>" required>
                        <button type="submit" name="reg-submit-btn" class="submit-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function login() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(-50px)";
        }

        function register() {
            RegForm.style.transform = "translateX(-700px)";
            LoginForm.style.transform = "translateX(-700px)";
            Indicator.style.transform = "translateX(55px)";
        }
    </script>
</body>