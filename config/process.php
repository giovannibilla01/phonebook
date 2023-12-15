<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST ?? null;
    $id = $_GET['id'] ?? null;

    if (!empty($data)) {
        // DATA MODIFICATION
        switch ($data['type']) {
            case 'create':
                $name = $data['name'];
                $phone = $data['phone'];
                $observations = $data['observations'];

                $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

                $stmt = $connection->prepare($query);

                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":observations", $observations);

                try {
                    $stmt->execute();
                    $_SESSION['msg'] = "Contato criado com sucesso!";
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    echo "Erro: $error";
                }
                break;
            case 'edit':
                $id = $data['id'];
                $name = $data['name'];
                $phone = $data['phone'];
                $observations = $data['observations'];

                $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id";

                $stmt = $connection->prepare($query);

                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":observations", $observations);

                try {
                    $stmt->execute();
                    $_SESSION['msg'] = "Contato atualizado com sucesso!";
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    echo "Erro: $error";
                }
                break;
            case 'delete':
                $id = $data['id'];

                $query = "DELETE FROM contacts WHERE id = :id";

                $stmt = $connection->prepare($query);

                $stmt->bindParam(":id", $id);

                try {
                    $stmt->execute();
                    $_SESSION['msg'] = "Contato deletado com sucesso!";
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    echo "Erro: $error";
                }
                break;
        }
        if ($data['type'] == "create") {
            

        } elseif ($data['type'] == "edit") {
            
        }

        header("Location:" . $BASE_URL . "../index.php");
    } else {
        // DATA SELECT
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
    }

    $connection = null;
?>