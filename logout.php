<html>
<head>
<title>logout</title>
</head>

<body>
<!-- Questa pagina non viene visualizzata -->
<?php
	session_start();
	$_SESSION['userApp']="";
	session_destroy();
	header('location: index.php');
?>
</body>
</html>
