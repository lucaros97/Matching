<?php
require "connessione.php";
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    //print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $codMeccanografico = $_POST['codiceMeccanografico'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $codFiscale = $_POST['codiceFiscale'];
    $dataNascita = $_POST['dataNascita'];
    $anzianita = $_POST['anzianitaArbitrale'];
    $organoTecnico = $_POST['organoTecnico'];
    $indirizzo = $_POST['indirizzo'];
    $localita = $_POST['localita'];
    $provincia = $_POST['provincia'];
    $sql = "INSERT INTO account (username, passw, codiceMeccanografico, Tipo, nome, cognome, codiceFiscale, dataNascita, anzianitaArbitrale, organoTecnico, indirizzo, localita, provincia)
    VALUES('$username', '$password_hash', '$codMeccanografico', '$tipo', '$nome', '$cognome', '$codFiscale', '$dataNascita', '$anzianita', '$organoTecnico', '$indirizzo', '$localita', '$provincia')";

    $res = mysqli_query($conn, $sql);
    if ($res){
        printf("Utente registrato correttamente");
    } else {
    printf("Could not insert record: %s\n", mysqli_error($conn));
}

    mysqli_close($conn);
}

?>
