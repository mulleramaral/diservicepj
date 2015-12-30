<?php require_once './header.php'; ?>

<?php
$fornecedor = $container['fornecedor'];
if (isset($_GET['id'])) {
    $fornecedor->get($_GET['id']);
}
?>
<section>
    <form method="post" action="salvarfornecedor.php">
        <fieldset>
            <legend>Inserindo Fornecedor</legend>
            <label>Código:<input type="text" id="codigo" name="codigo" readonly value="<?= $fornecedor->getId(); ?>"/></label>
            <label>Nome:<input type="text" id="nome" name="nome" required value="<?= $fornecedor->getNome(); ?>"/></label>
            <label>E-mail:<input type="email" id="email" name="email" required value="<?= $fornecedor->getEmail(); ?>"/></label>
        </fieldset>
        <input type="submit" name="submit" value="salvar">
    </form>
</section>
<?php require_once './footer.php'; ?>