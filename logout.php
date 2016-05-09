<?php
	//avoid cross-site request forgery
	if (!isset($_POST["logout"])) {
		echo "Sito marcio che cerca di fotterti";
		exit;
	}

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
