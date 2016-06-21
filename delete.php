<?php
/**
 * Created by PhpStorm.
 * User: luca
 * Date: 07/06/16
 * Time: 10.57
 */

require_once("connessione.php");
session_start();
$usernameUtente = $_SESSION['user'];

if($_POST["id"]){
    $id=mysqli_real_escape_string($conn, $_POST['id']);
    $delete = "DELETE FROM partita WHERE idPartita='$id' AND usernameArbitro='$usernameUtente'";

    var_dump($delete);

    $res = mysqli_query($conn, $delete);

    var_dump($res);
}

