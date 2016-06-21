<?php
include_once "functions.php";

session_start();

if (!isset($_SESSION['userApp'])) header('location: index.php');
//if (!($_SESSION['tipo']=='AE')) header('location: index.php');

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
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="./css/arbitro.css" />
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />

    <link href='https://fonts.googleapis.com/css?family=Dosis:400,200,300' rel='stylesheet' type='text/css'>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        function myFunction() {
            document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
        }
    </script>

</head>
<body>
    <div class="corpo">
        <nav class="col-md-2 leftNavbar">
            <ul class="nav nav-pills nav-stacked navbarItem">
                <li role="presentation" class="titleNavbar" >
                    <a href="arbitro.php" class="linkTitleNavbar">
                        <div class="text-center navbarTitle">
                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                            <span>Matching</span>
                            <div class="icon">
                                <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                            </div>
                        </div>
                    </a>
                </li>
                <li role="presentation" class="active">
                    <a href="#">
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
            <div class="dashboardContent">
                <div class="topbarMenu">
                    <div class="dashboardTitle">Dashboard</div>
                    <form class="logout" action="logout.php" method="post">
                        <button type="submit" name="logout" class="btn btn-default navbar-btn btnLogout">Logout</button>
                    </form>
                </div>
            </div>
            <div class="row profileContent">
                <div class="col-xs-6 col-md-2">
                    <span><img src="<?php echo $fotoProfilo ?>" width="70%;" style="border-radius:50%;" /></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 profileInfo">
                        <div class="infoNomeUtente">
                            <span><?php echo "$nomeUtente"; ?></span>
                            <span><?php echo "$cognomeUtente"; ?></span>
                            <span class="small"><em>@<?php echo $usernameUtente; ?></em></span><br>
                            <span class="small" style="color: #737373">Sezione di <?php echo getSezione(); ?></span>
                        </div>
                </div>
                <div class="col-md-4" style="margin: 2% 0;">
                    <div class="ContainerInfoGenerali">
                        <span class="text-uppercase" style="font-size: 22pt;"><?php getOrganoTecnico(); ?></span><br>
                        <span>Organo Tecnico</span>
                    </div>
                    <div class="ContainerInfoGenerali" style="border:none;">
                        <span style="font-size: 22pt;"><?php echo date_diff(date_create($anzianita), date_create('today'))->y+1; ?></span><br>
                        <span>Anzianità arbitrale</span>
                    </div>
                </div>
            </div>
                <div class="row rowStatsContainer">
                    <div class="col-md-6 text-center" >
                        <span class="showMedia">Media Ammoniti</span><br>
                        <div class="mediaCircle" style="border: 15px solid #f2ca27">
                            <span class=""><?php if (getMediaAmmoniti() == null) echo "0.00"; else echo getAmmonitiTotali();?></span>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <span class="showMedia">Media Espulsi</span><br>
                        <div class="mediaCircle" style="border: 15px solid #e74c3c">
                            <span class=""><?php if (getMediaAmmoniti() == null) echo "0.00"; else echo getAmmonitiTotali(); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row percentagesBarContainer">
                    <div class="col-md-8 progressBarSection">
                        <?php
                            $color = array("#5cb85c", "#e74c3c", "#f0ad4e", "#d9534f");
                            $i = 0;
                            $percentualePartite = getPercentualePartite();
                            foreach ($percentualePartite as $percentualePartita){ ?>
                                <div class='progressContainer'>
                                    <div class='infoProgess'>
                                        <span><?php echo $percentualePartita['categoria'] ?></span>
                                    </div>
                                    <div class='progress'>
                                        <div class='progress-bar' role='progressbar' aria-valuenow='40'
                                             aria-valuemin='0' aria-valuemax='100'
                                             style="width: <?php echo $percentualePartita['percentuale'] ?>%;
                                                 background: <?php echo $color[$i] ?> !important;">
                                                 <?php echo $percentualePartita['percentuale'] ?>%
                                        </div>
                                    </div>
                                  </div>
                            <?php $i++;
                            }
                        ?>
                    </div>
                    <div class="col-md-4 containerArbitrate">
                        <div class="containerArbitrateTitle">
                            <span>Matches Refereed</span>
                        </div>
                        <div class="containerArbitrateContent">
                            <p class="text-center"><?php echo getMatches() ?></p>
                        </div>

                    </div>
                </div>
            </div>
    </div>
            <!-- <p> <a href="logout.php"> ESCI </a> </p> -->
        </section>
    </div>
</body>
</html>
