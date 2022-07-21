<?php

	session_start();
	session_destroy();
	
	setcookie("username",'',time()-86400);
	setcookie("admin",'',time()-86400);
	header("Location: home.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>

</body>
</html>