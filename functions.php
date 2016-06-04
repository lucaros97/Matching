<?php
require_once("connessione.php");

    function getMatches(){
        global $conn;
        global $usernameUtente;

        $sql="SELECT COUNT(*) FROM partita WHERE usernameArbitro='" . $usernameUtente . "'";

        $risultato=mysqli_query($conn,$sql);

        if ($risultato) {
            while ($row=mysqli_fetch_array($risultato)) {
                return($row[0]);
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
                FROM account as a JOIN organotecnico as o ON a.idOrganoTecnico=o.idOrganoTecnico WHERE a.username='" . $usernameUtente . "'";

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
                        FROM partita AS p2 
                        WHERE p2.usernameArbitro=p1.usernameArbitro
                    ) AS percentuale, COUNT(*) AS numeroPartite 
                FROM partita AS p1 JOIN categoria as c ON p1.idCategoria = c.idCategoria
                WHERE p1.usernameArbitro = '$usernameUtente' 
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

    $sql = "SELECT p.idPartita as idPartita, p.golLocali as golLocali, p.golOspiti as golOspiti, p.data as dataPartita, s1.nomeSquadra AS squadraLocale, s2.nomeSquadra AS squadraOspite 
            FROM partita as p 
	            JOIN squadra AS s1 ON p.squadraLocale = s1.idSquadra 
	            JOIN squadra AS s2 ON p.squadraOspite = s2.idSquadra 
            WHERE p.usernameArbitro = '$usernameUtente'
            ORDER BY dataPartita";

    $risultato = mysqli_query($conn,$sql);
    $x = array();
    if ($risultato) {
        while ($row=mysqli_fetch_array($risultato)) {
            //print_r($row);
            $x[] = array("dataPartita" => $row["dataPartita"],
                         "sqLocale"    => $row["squadraLocale"],
                         "sqOspite"    => $row["squadraOspite"],
                         "golLocali"   => $row["golLocali"],
                         "golOspiti"   => $row["golOspiti"],
                         "idPartita"   => $row["idPartita"]);
        }

    } else {
        printf( mysqli_error($conn));
    }

    return $x;

}

function getAmmonitiTotali(){
    global $conn;
    global $usernameUtente;

    $sql = "SELECT sum(s.numeroAmmoniti) FROM statistichepartita as s JOIN partita as p on s.idPartita=p.idPartita WHERE p.usernameArbitro='$usernameUtente'";

    $risultato = mysqli_query($conn,$sql);

    if ($risultato) {
        while ($row=mysqli_fetch_array($risultato)) {

            return (!$row[0] ? 0 : $row[0]);
        }
    } else {
        printf( mysqli_error($conn));
    }
}

function getEspulsiTotali(){
    global $conn;
    global $usernameUtente;

    $sql = "SELECT sum(s.numeroEspulsi) FROM statistichepartita as s JOIN partita as p on s.idPartita=p.idPartita WHERE p.usernameArbitro='$usernameUtente'";

    $risultato = mysqli_query($conn,$sql);

    if ($risultato) {
        while ($row=mysqli_fetch_array($risultato)) {

            return (!$row[0] ? 0 : $row[0]);
        }
    } else {
        printf( mysqli_error($conn));
    }
}


function getMediaAmmoniti(){
    $numeroAmmoniti = getAmmonitiTotali();
    $numeroPartite = getMatches();

    $media = @(bcdiv($numeroAmmoniti, $numeroPartite, 2));

    if($numeroPartite === 0){
        $media = null;
    }

    return $media;
}


function getMediaEspulsi(){
    $numeroEspulsi = getEspulsiTotali();
    $numeroPartite = getMatches();

    $media = @(bcdiv($numeroEspulsi, $numeroPartite, 2));

    if($numeroPartite === 0){
        $media = null;
    }

    return $media;
}

 ?>
