<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $db = "HW1";

    $conn = new mysqli($host, $user, $password, $db);
    if($conn === false){
        die("Errore durante la connessione al database: " .$conn->$connect_error);
    };
?>