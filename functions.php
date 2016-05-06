<?php
require_once("connessione.php");
include_once("arbitro.php");

    function getMatches(){
        global $conn;
        global $usernameUtente;

        $sql="SELECT COUNT(*) FROM partita WHERE usernameArbitro='" . $usernameUtente . "'";

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

                echo (!$row[0] ? 0 : $row[0]);
            }
        } else {
            printf( mysqli_error($conn));
        }
    }

    function getOrganoTecnico(){
        global $conn;
        global $usernameUtente;


        $sql = "SELECT organoTecnico FROM account WHERE username='" . $usernameUtente . "'";

        $risultato=mysqli_query($conn,$sql);

        if ($risultato) {
            while ($row=mysqli_fetch_array($risultato)) {
                print_r($row[0]);
            }
        } else {
            printf( mysqli_error($conn));
        }

    }

    function getPercentualePartite(){
        global $conn;
        global $usernameUtente;

        $sql = "SELECT P1.categoria AS categoria, COUNT(*) * 100.0 / (SELECT COUNT(*) FROM partita AS P2 WHERE P2.usernameArbitro=P1.usernameArbitro) AS percentuale, COUNT(*) AS numeroPartite 
                FROM partita AS P1 
                WHERE P1.usernameArbitro = '$usernameUtente' 
                GROUP BY P1.categoria";

        $risultato = mysqli_query($conn,$sql);

        if ($risultato) {
            $i = 0;
            while ($row=mysqli_fetch_array($risultato)) {
                $x[$i] = array("categoria" => $row["categoria"], "percentuale" => intval($row["percentuale"]), "numeroPartite" => $row["numeroPartite"]);
                $i++;
            }

        } else {
            printf( mysqli_error($conn));
        }

        return $x;
    }


 ?>
