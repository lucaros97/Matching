<?php
require_once "functions.php";

session_start();

if (!isset($_SESSION['userApp'])) header('location: index.php');

?>

<html>
<head>
    <title>Partite</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/partite.css" />
    <link rel="stylesheet" type="text/css" href="css/arbitro.css" />
</head>
<body>
    <div class="panel panel-default">

        <nav class="navbar navbar-default" style="background: #34495e;">
            <a class="navbar-brand brandTitle" href="arbitro.php">Matching</a>
            <form class="logout" action="logout.php" method="post">
                <button type="submit" name="logout" class="btn btn-default navbar-btn btnLogout">Sign out</button>
            </form>
        </nav>

        <!-- Table -->
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Colonna 1</th>
                    <th>Colonna 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $partita = getDatiPartita();
                        foreach ($partita as $partite){
                            echo '<tr>
                                    <td>
                                        '.$partita["sqLocale"].'
                                    </td>
                                    <td>
                                        '.$partita["sqOspite"].'
                                    </td>
                                  </tr>';
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>