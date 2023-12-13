<?php
    $host = "localhost";
    $dbname = "phonebook";
    $user = "root";
    $password = "";

    try {

        $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        //connection error
        $error = $e->getMessage();
        echo "Erro: $error";
    }
?>