<?php
include "functions.php";

session_start();

if (!isset($_SESSION['userApp'])) header('location: index.php');
if (!($_SESSION['tipo']=='AE')) header('location: index.php');

$usernameUtente = $_SESSION['user'];
$nomeUtente = $_SESSION['userApp'];
$cognomeUtente = $_SESSION['cognomeUtente'];

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
        <nav class="leftNavbar">
            <div class="logoContainer">
                <a href="index.php" class="logo">Matching</a>
            </div>
            <!--<hr>
            <div class="divider"></div>-->
            <div class="navbarMenu">
                <ul class="navbarMenuList">
                    <li><a href="#" onclick="showDashboard()" class="navbarMenuItem"><span>Dashboard</span></a></li>
                    <li><a href="#" onclick="" class="navbarMenuItem"><span>Dashboard</span></a></li>
                    <li><a href="#" onclick="" class="navbarMenuItem"><span>Dashboard<span></a></li>
                    <li><a href="#" onclick="" class="navbarMenuItem"><span>Dashboard</span></a></li>
                    <li><a href="#" onclick="" class="navbarMenuItem"><span>Dashboard</span></a></li>
                </ul>
            </div>
        </nav>
        <section class="mainContent">
            <div class="topbarMenu">
                <div class="dashboardTitle">Dashboard</div>
                <div class="usernameContainer"><span id="arbitro" name="arbitro"><?php echo $nomeUtente . " " . $cognomeUtente; ?></span></div>
            </div>
            <div class="dashboardContent">
                <div class="rowStats">
                    <div class="matchesRefereedStats firstOfType">
                        <div class="box">
                            <div class="boxLeft">
                                <div class="iconRounded">
                                    <span class="iconBox"><?php getMatches(); ?></span>
                                </div>
                            </div>
                            <div class="boxRight">
                                <span> Partite arbitrate</span>
                            </div>
                        </div>
                    </div>
                    <div class="matchesRefereedStats">
                        <div class="box">
                            <div class="boxLeft">
                                <div class="iconRounded"style="background: #fcc100;">
                                    <span class="iconBox"><?php getRimborsi(); ?> €</span>
                                </div>
                            </div>
                            <div class="boxRight">
                                <span> Rimborso totale</span>
                            </div>
                        </div>
                    </div>
                    <div class="matchesRefereedStats lastOfType">
                        <div class="box">
                            <div class="boxLeft">
                                <div class="iconRounded" style="background: #a88add">
                                    <span class="iconBox"><?php getMatches(); ?></span>
                                </div>
                            </div>
                            <div class="boxRight">
                                <span> Partite arbitrate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p> <a href="logout.php"> ESCI </a> </p>

        </section>
    </div>
</body>
</html>
