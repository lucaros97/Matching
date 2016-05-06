<?php
session_start();

if (!isset($_SESSION['userApp'])) header('location: index.php');
if (!($_SESSION['tipo']=='AE')) header('location: index.php');

$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];
$cognomeUtente = $_SESSION['cognomeUtente'];




echo "Benvenuto " . $nomeUtente . " " . $cognomeUtente;

 ?>
