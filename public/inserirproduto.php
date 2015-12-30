<?php require_once './header.php'; ?>

<?php
$fornecedor = $container['fornecedor']->listar();
$produto = $container['produto'];

if (isset($_GET['id'])) {
    $produto->get($_GET['id']);
}
?>

<section>
    <form method="post" action="salvarproduto.php">
        <fieldset>
            <legend>Inserindo Produto</legend>
            <label>Código:<input type="text" id="codigo" name="codigo" readonly value="<?= $produto->getId(); ?>"/></label>
            <label>Nome:<input type="text" id="nome" name="nome" required value="<?= $produto->getNome(); ?>"/></label>
            <label>Unidade:<input type="text" id="unidade" name="unidade" required value="<?= $produto->getUnidade(); ?>"/></label>
                <?php if (count($fornecedor) == 0): ?>
                <p>Não é possível inserir produto, não existem fornecedores cadastrados!</p>
            <?php else: ?>
                <label>
                    Selecione o fornecedor:
                    <select name="id_fornecedor" required>
                        <option value=""></option>
                        <?php foreach ($fornecedor as $reg => $for): ?>
                            <option value="<?= $for['id']; ?>" <?= $for['id'] == $produto->getIdFornecedor() ? "selected" : ""; ?>><?= $for['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            <?php endif; ?>
        </fieldset>
        <?php if (count($fornecedor) <> 0): ?>
            <input type="submit" name="submit" value="salvar">
        <?php endif; ?>
    </form>
</section>
<?php require_once './footer.php'; ?>