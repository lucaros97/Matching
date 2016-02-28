<html>
<head>
<title>LOGIN</title>
</head>

<body>
<?php
	session_start();
	$username=$_POST["username"];
    $passw=$_POST["passw"];
	//$passw=sha1($_POST["passw"]);
	require("connessione.php");
	$query="SELECT * FROM account WHERE username='$username'";
	$risultato=mysqli_query($conn,$query);
	echo $query;
	echo "<BR>";
	$_REQUEST['username']="";
	$_REQUEST['passw']="";

	if($risultato){
		$riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC);
		print_r($riga);
		print_r($_POST);
		if (!password_verify($passw, $riga['passw']))
			die("password marcia");

		if($riga){
		    $_SESSION['userApp']=$riga[nome];
			$_SESSION['cognomeUtente']=$riga[cognome];
            $_SESSION['tipo']=$riga['Tipo'];
			$_SESSION['user']=$riga['username'];

            if ($riga['Tipo']=='AE'){
		    	header('location: arbitro.php');
			}	else header('location: organico.php');
                   // echo "trovato ";
                   //echo $_SESSION['userApp'];
                   // echo "  tipo:";
                   // echo $riga[tipo];
		} else {
		      $_SESSION['userApp']="";
              $_SESSION['tipo']="";
			  session_destroy();
			  header('location: index.php');
                      //echo "non trovato";
                      // echo $_SESSION['userApp'];
		}
	} else echo "ERRORE NELLA QUERY";
?>
</body>
</html>
