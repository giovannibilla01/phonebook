<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $id = $_GET['id'] ?? null;

    if (!empty($id)) {
        // RETURN A CONTACT
        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();
    } else {
        // RETURN ALL CONTACTS
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $connection->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
?>