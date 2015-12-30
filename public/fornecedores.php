<?php
require_once './header.php';
$fornecedores = $container['fornecedor']->listar();
?>

<section class="fornecedores">
    <h2>Fornecedores</h2>

    <?php if (count($fornecedores) == 0): ?>
        <p>Não existe fornecedores cadastrados!</p>
    <?php else: ?>
        <table>
            <thead><tr><td>Código</td><td>Nome</td><td>E-mail</td><td></td><td></td></tr></thead>
            <tbody>
                <?php foreach ($fornecedores as $linha => $fornecedor): ?>
                    <tr><td><?= $fornecedor['id'] ?></td><td><?= $fornecedor['nome'] ?></td><td><?= $fornecedor['email'] ?></td>
                        <td><a href="inserirfornecedor.php?id=<?= $fornecedor['id']; ?>">Editar</a></td>
                        <td><a href="removerfornecedor.php?id=<?= $fornecedor['id']; ?>">Remover</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <p><a href="inserirfornecedor.php">Inserir</a></p>

</section>
<?php require_once './footer.php'; ?>