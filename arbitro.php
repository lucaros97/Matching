<?php
include "functions.php";

session_start();

if (!isset($_SESSION['userApp'])) header('location: index.php');
if (!($_SESSION['tipo']=='AE')) header('location: index.php');

$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];
$cognomeUtente = $_SESSION['cognomeUtente'];
$anzianita = date('d-m-Y', strtotime($_SESSION['anzianita']));
$dataNascita = $_SESSION['dataNascita'];
$sezioneAppartenenza = $_SESSION['sezione'];
$codiceMeccanografico = $_SESSION['codiceMeccanografico'];
$fotoProfilo = $_SESSION['fotoProfilo'];

if ($_SESSION['tipo'] == "AE") {
    $tipoUtente = "Arbitro Effettivo";
} else $tipoUtente = "Osservatore Arbitrale";

?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/arbitro.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <meta charset="utf-8">
</head>
<body>
    <div class="corpo">
        <nav class="col-md-2 leftNavbar">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Profile</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
            </ul>
        </nav>
        <section class="col-md-10">
            <div class="dashboardContent">
                <div class="topbarMenu">
                    <div class="dashboardTitle">Dashboard</div>
                    <a href="logout.php"><button type="button" class="btn btn-default navbar-btn btnLogout">Sign out</button></a>
                </div>
            </div>
            <div class="row profileContent">
                <div class="col-xs-6 col-md-2">
                    <span><img src="<?php echo $fotoProfilo ?>" width="70%;" style="border-radius:50%;" /></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 profileInfo">
                        <div class="infoNomeUtente">
                            <span><?php echo "$nomeUtente"; ?></span>
                            <span><?php echo "$cognomeUtente"; ?></span><br>
                        </div>
                </div>
                <div class="col-md-4" style="margin: 2% 0;">
                    <div class="ContainerInfoGenerali">
                        <span style="font-size: 22pt;"><?php getOrganoTecnico(); ?></span><br>
                        <span>Organo Tecnico</span>
                    </div>
                    <div class="ContainerInfoGenerali" style="border:none;">
                        <span style="font-size: 22pt;"><?php echo date_diff(date_create($anzianita), date_create('today'))->y+1; ?></span><br>
                        <span>Anzianità arbitrale</span>
                    </div>
                </div>
            </div>
                <div class="row rowStatsContainer">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <?php
                            $percentualePartite = getPercentualePartite();
                            foreach ($percentualePartite as $percentualePartita){
                                echo '<div class="progressContainer">
                                        <div class="infoProgess"><span>'.$percentualePartita["categoria"].'</span>
                                        <span>'.$percentualePartita["numeroPartite"].'</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentualePartita["percentuale"].'%">'.$percentualePartita["percentuale"].'    %</div>
                                        </div>
                                      </div>';
                            }
                        ?>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
    </div>
            <!-- <p> <a href="logout.php"> ESCI </a> </p> -->
        </section>
    </div>
</body>
</html>
