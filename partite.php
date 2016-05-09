<?php
include_once "functions.php";


if (!isset($_SESSION['userApp'])) header('location: index.php');
//if (!($_SESSION['tipo']=='AE')) header('location: index.php');


$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];

/*$cognomeUtente = $_SESSION['cognomeUtente'];
$anzianita = date('d-m-Y', strtotime($_SESSION['anzianita']));
$dataNascita = $_SESSION['dataNascita'];
//$sezioneAppartenenza = $_SESSION['sezione'];
$codiceMeccanografico = $_SESSION['codiceMeccanografico'];
$fotoProfilo = $_SESSION['fotoProfilo']; */
?>

<html>
<head>
    <title>Partite</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
</head>
<body>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Panel heading</div>
        <div class="panel-body">
            <p></p>
        </div>

        <!-- Table -->
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Colonna 1</th>
                    <th>Colonna 2</th>
                </tr>
            </thead>
            <tbody>
            <?php
            /*$partite = getDatiPartita();
            foreach ($partite as $partita){
                echo '<tr>
                    <td>Cacca</td>
                    <td>Pupu</td>
                </tr>';
            } */
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>