<?php
require_once("connessione.php");

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


        $sql = "SELECT o.NomeOrganoTecnico 
                FROM account as a JOIN organoTecnico as o ON a.idOrganoTecnico=o.idOrganoTecnico WHERE a.username='" . $usernameUtente . "'";

        $risultato=mysqli_query($conn,$sql);

        if ($risultato) {
            while ($row=mysqli_fetch_array($risultato)) {
                print_r($row[0]);
            }
        } else {
            printf( mysqli_error($conn));
        }

    }

    function getSezione(){
        global $conn;
        global $usernameUtente;

        $sql = "SELECT s.nomeSezione
                FROM account as a JOIN sezione as s ON a.idSezioneAppartenenza=s.idSezione WHERE a.username='" . $usernameUtente . "'";

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

        $sql = "SELECT c.NomeCategoria AS categoria, 
                    COUNT(*) * 100.0 / (
                        SELECT COUNT(*) 
                        FROM partita AS P2 
                        WHERE P2.usernameArbitro=P1.usernameArbitro
                    ) AS percentuale, COUNT(*) AS numeroPartite 
                FROM partita AS P1 JOIN categoria as c ON p1.idCategoria=c.idCategoria
                WHERE P1.usernameArbitro = '$usernameUtente' 
                GROUP BY c.NomeCategoria";

        $risultato = mysqli_query($conn,$sql);

        if ($risultato) {
            $i = 0;
            $x = array();
            while ($row=mysqli_fetch_array($risultato)) {
                $x[$i] = array("categoria" => $row["categoria"], "percentuale" => intval($row["percentuale"]), "numeroPartite" => $row["numeroPartite"]);
                $i++;
            }

        } else {
            printf( mysqli_error($conn));
        }

        return $x;
    }

function getDatiPartita(){
    global $conn;
    global $usernameUtente;

    $sql = "SELECT p.squadraLocale AS squadraLocale, p.squadraOspite AS squadraOspite FROM partita AS p WHERE p.usernameArbitro = '$usernameUtente'";

    $risultato = mysqli_query($conn,$sql);

    if ($risultato) {
        $i = 0;
        $x = array();
        while ($row=mysqli_fetch_array($risultato)) {
            $x[$i] = array("sqLocale" => $row["squadraLocale"], "sqOspite" => $row["squadraOspite"]);
            $i++;
        }

    } else {
        printf( mysqli_error($conn));
    }

    return $x;

}

 ?>
