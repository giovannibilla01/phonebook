<?php
    include_once ("templates/header.php");
?>
    
<div class="container">

    <?php include_once("templates/backbtn.php"); ?>

    <h1 id="main-title">Novo Contato</h1>

    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o Nome do Contato" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite o Telefone do Contato" required>
        </div>
        <div class="form-group">
            <label for="observation">Observações:</label>
            <textarea type="text" class="form-control" name="observation" id="observation" rows="3">
            </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
    
<?php
    include_once ("templates/footer.php");
?>