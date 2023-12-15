<?php
    include_once ("templates/header.php");
?>
    
<div class="container">

    <?php include_once("templates/backbtn.php"); ?>

    <h1 id="main-title">Editar Contato</h1>

    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o Nome do Contato" value="<?= $contact['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite o Telefone do Contato" value="<?= $contact['phone'] ?>" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea type="text" class="form-control" name="observations" id="observations" rows="3"><?= $contact['observations'] ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>
    
<?php
    include_once ("templates/footer.php");
?>