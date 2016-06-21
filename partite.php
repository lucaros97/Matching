<?php
require_once "functions.php";

session_start();

$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];
$cognomeUtente = $_SESSION['cognomeUtente'];
$anzianita = date('d-m-Y', strtotime($_SESSION['anzianita']));
$dataNascita = $_SESSION['dataNascita'];
//$sezioneAppartenenza = $_SESSION['sezione'];
$codiceMeccanografico = $_SESSION['codiceMeccanografico'];
$fotoProfilo = $_SESSION['fotoProfilo'];

?>

<html>
<head>
    <title>Partite</title>

    <script src="js/jquery.js"></script>
    <script src="js/partite.js"></script>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-datetimepicker.css" />

    <link rel="stylesheet" type="text/css" href="css/partite.css" />
    <link rel="stylesheet" type="text/css" href="css/arbitro.css" />

    <script src="bootstrap/js/bootstrap.js"></script>



    <link href='https://fonts.googleapis.com/css?family=Dosis:400,200,300' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <div class="panel panel-default">
        <nav class="col-md-2 leftNavbar" style="float: left">
            <a href="arbitro.php"><div class="text-center navbarTitle">
                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                    <span>Matching</span>
                </div>
            </a>
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation">
                    <a href="arbitro.php">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="profilo.php">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <span>Profilo</span>
                    </a>
                </li>
                <li role="presentation" class="active">
                    <a href="partite.php">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <span>Partite</span>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#">
                        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                        <span>Statistiche</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="col-md-10" style="float: right">
            <div class="topbarMenu">
                <div class="dashboardTitle">Partite</div>
                <form class="logout" action="logout.php" method="post">
                    <button type="submit" name="logout" class="btn btn-default navbar-btn btnLogout">Logout</button>
                </form>
            </div>
            <!-- Table -->
            <div>
                <button data-toggle="modal" data-target=".modal-aggiungi" class="btn btn-info">Aggiungi Partita</button>
            </div>

            <?php
            $partite = getDatiPartita();

            if ($partite == null){ ?>
                <span class="text-center spanNoMatches">Oppsss! Non ci sono partite</span>
            <?php } else { ?>
            <table class="table table-hover col-md-10 text-center listaPartite">
                <thead>
                    <tr>
                        <th class="text-center">Data</th>
                        <th class="text-center">Partita</th>
                        <th class="text-center">Risultato</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach ($partite as $partita){ ?>
                             <tr class="rigaPartita" data-id="<?= $partita["idPartita"] ?>">
                                <td>
                                    <?= date("d/m/Y", strtotime($partita["dataPartita"]));?>
                                </td>
                                <td>
                                    <span class="squadra-locale"><?= $partita["sqLocale"] ?></span> - <span class="squadra-ospite"><?= $partita["sqOspite"] ?></span>
                                </td>
                                <td>
                                    <span class="gol-locale"><?= $partita["golLocali"] ?></span> - <span class="gol-ospiti"><?= $partita["golOspiti"] ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-default btn-modifica" style="color: #2ecc71; border-color: #2ecc71" data-toggle="modal" data-target=".modal-change" data-id="<?= $partita["idPartita"] ?>" type="submit">Modifica</button>
                                    <button class="btn btn-default" style="color: #e67e22; border-color: #e67e22;" data-toggle="modal" data-target=".modal-details" data-id="<?= $partita["idPartita"] ?>" type="submit">Dettagli</button>
                                    <button class="btn btn-default eliminaPartita" style="color: #e74c3c; border-color: #e74c3c;" data-id="<?= $partita["idPartita"] ?>" type="submit">Elimina</button>
                                </td>
                              </tr>
                    <?php } } ?>
</tbody>
            </table>
        </div>
    </div>
    <div class="modal fade modal-change" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg container">
            <div class="modal-content row">
                <div class="col-xs-12">
                    <div class="col-xs-5">
                        <input type="text" id="modifica-locale" class="form-control">
                    </div>
                    -
                    <div class="col-xs-5">
                        <input type="text" id="modifica-ospite" class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                    <span id="modifica-gol-locale"></span> - <span id="modifica-gol-ospiti"></span>
                </div>
            </div>
            L'id del tuo culo è <span id="modifica-id">?</span><br>
        </div>
    </div>

    <div class="modal fade modal-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>

    <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>

    <div class="modal fade modal-aggiungi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content containerAggiungi">
                <input type="text" class="form-control inputAggiungi" id="aggiungiDelegazione" placeholder="Comitato/Delegazione">
                <input type="text" class="form-control inputAggiungi" id="aggiungiCategoria" placeholder="Categoria">
                <input type="text" class="form-control inputAggiungi" id="aggiungiSquadraLocale" placeholder="Squadra Locale">
                <input type="text" class="form-control inputAggiungi" id="aggiungiSquadraOspite" placeholder="Squadra Ospite">
                <input type="text" class="form-control inputAggiungi" id="aggiungiGolLocali" placeholder="Gol Locali">
                <input type="text" class="form-control inputAggiungi    " id="aggiungiGolOspiti" placeholder="Gol Ospiti">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>