<?php
require_once './header.php';

if (isset($_GET['id'])) {
    $fornecedor = $container['fornecedor'];
    if($fornecedor->podeRemover($_GET['id']) == true){
        $fornecedor->remover($_GET['id']);
        header("location: fornecedores.php");
    } else {
       echo "<h5>N�o � poss�vel remover o fornecedor.<p>Quebra de integridade.</p></h5>";
    }
}
?>
<?php

require_once './footer.php';
