<?php

require_once './header.php';

$fornecedor = $container['fornecedor'];
if (isset($_POST['codigo'])) {
    $fornecedor->setId($_POST['codigo']);
}
$fornecedor->setNome($_POST['nome'])
        ->setEmail($_POST['email']);

$fornecedor->salvar();
header("Location:fornecedores.php");

require_once './footer.php';
?>