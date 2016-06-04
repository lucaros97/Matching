<?php
$conn = new mysqli("localhost", "root", "Ingegnere11", "matching_db");

    if (mysqli_connect_errno()) {
        //printf("Non sono riuscito a connettermi");
        return false;
        exit();
    } else {
            //printf("Connessione avvenuta regolarmente\n");
            return true;
    }

?>
