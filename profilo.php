<!-- Created by luca on 31/05/16. -->

<?php

require_once "functions.php";

session_start();

$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];
$cognomeUtente = $_SESSION['cognomeUtente'];
$anzianita = date('d/m/Y', strtotime($_SESSION['anzianita']));
$dataNascita = date('d/m/Y', strtotime($_SESSION['dataNascita']));
//$sezioneAppartenenza = $_SESSION['sezione'];
$codiceMeccanografico = $_SESSION['codiceMeccanografico'];
$fotoProfilo = $_SESSION['fotoProfilo'];

?>


<html>
<head>
    <title>Matching - Profile</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/arbitro.css" />
    <link rel="stylesheet" type="text/css" href="css/profilo.css" />

</head>
<body>
    <nav class="col-md-2 leftNavbar">
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
            <li role="presentation" class="active">
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span>Profilo</span>
                </a>
            </li>
            <li role="presentation">
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
<section class="col-md-10" style="float: right">
    <div class="topbarMenu">
        <div class="dashboardTitle">Profile</div>
        <form class="logout" action="logout.php" method="post">
            <button type="submit" name="logout" class="btn btn-default navbar-btn btnLogout">Logout</button>
        </form>
    </div>
    <div class="col-md-4 text-center">
        <span><img src="<?php echo $fotoProfilo ?>" width="50%;" class="img-circle" /></span>
        <div style="line-height: 3em">
            <span class="infoNomeUtente"><?= $nomeUtente ?> <?= $cognomeUtente ?></span><br>
            <span style="font-size: 18px"><?= $dataNascita ?></span><br>
            <span style="font-size: 18px">Sezione di <?= getSezione(); ?></span>
        </div>
    </div>
    <div class="col-md-8">
        <?= $usernameUtente ?>
    </div>
</section>
</body>
</html>

