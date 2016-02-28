<?php
require_once("connessione.php");
include_once("arbitro.php");

    function getMatches(){
        global $conn;
        global $usernameUtente;

        $arbitro = $usernameUtente;

        $sql="SELECT COUNT(*) FROM partita WHERE usernameArbitro='" . $arbitro . "'";

        $risultato=mysqli_query($conn,$sql);

        if ($risultato) {
            while ($row=mysqli_fetch_array($risultato)) {
                print_r($row[0]);
            }
        } else {
            printf( mysqli_error($conn));
        }
    }

    function getRimborsi(){
        global $conn;
        global $usernameUtente;

        $sql = "SELECT SUM(rimborso) FROM partita WHERE usernameArbitro='" . $usernameUtente . "'";

        $risultato=mysqli_query($conn,$sql);

        if ($risultato) {
            while ($row=mysqli_fetch_array($risultato)) {
                print_r($row[0]);
            }
        } else {
            printf( mysqli_error($conn));
        }
    }


 ?>
