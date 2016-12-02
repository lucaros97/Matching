<html>
<head>
<title>LOGIN</title>
</head>

<body>
<?php
	session_start();

	$username=$_POST["username"];
  $passw=$_POST["passw"];

	require("connessione.php");

	$query="SELECT * FROM account WHERE username='$username'";

	$risultato=mysqli_query($conn,$query);

	$_REQUEST['username']="";
	$_REQUEST['passw']="";

	if($risultato){

		$riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC);

		if (!password_verify($passw, $riga['passw']))
			die("password marcia");

		if($riga){

			$_SESSION['userApp']=$riga['nome'];
			$_SESSION['cognomeUtente']=$riga['cognome'];
        	//$_SESSION['tipo']=$riga['Tipo'];
			$_SESSION['user']=$riga['username'];
			$_SESSION['anzianita']=$riga['anzianitaArbitrale'];
			$_SESSION['dataNascita']=$riga['dataNascita'];
			//$_SESSION['sezione']=$riga['sezioneAppartenenza'];
			$_SESSION['codiceMeccanografico']=$riga['codiceMeccanografico'];
			$_SESSION['fotoProfilo']=$riga['fotoProfilo'];

			header('location: ../arbitro.php');

		} else {
		      $_SESSION['userApp']="";
              //$_SESSION['tipo']="";

			  session_destroy();

			  //header('location: index.php');
		}

	} else echo "ERRORE NELLA QUERY";
?>
</body>
</html>
