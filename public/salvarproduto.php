<?php
require_once './header.php';

print_r($_POST);

$produto = $container['produto'];
if (isset($_POST['codigo'])) {
    $produto->setId($_POST['codigo']);
}
$produto->setNome($_POST['nome'])
        ->setIdFornecedor($_POST['id_fornecedor'])
        ->setUnidade($_POST['unidade']);

$produto->salvar();
header("Location:produtos.php");

require_once './footer.php';
?>