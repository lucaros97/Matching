<?php
$conn = new mysqli("localhost", "root", "1234", "matching");

    if (mysqli_connect_errno()) {
        //printf("Non sono riuscito a connettermi");
        return false;
        exit();
    } else {
            //printf("Connessione avvenuta regolarmente\n");
            return true;
    }

?>
