<?php
	session_start();
	$_SESSION['userApp']="";
	session_destroy();
	header('location: index.php');
?>

<html>
<head>
<title>logout</title>
</head>
<body>
</body>
</html>
