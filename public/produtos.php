<?php
require_once './header.php';
$produtos = $container['produto']->listar();
?>

<section class="produtos">
    <h2>Produtos</h2>

    <?php if (count($produtos) == 0): ?>
    <p>Não existe produtos cadastrados!</p>
    <?php else: ?>
        <table>
            <thead><tr><td>Código</td><td>Nome</td><td>Unidade</td><td>Fornecedor</td><td></td><td></td></tr></thead>
            <tbody>
                <?php foreach ($produtos as $row => $produto): ?>
                    <tr><td><?= $produto['id'] ?></td><td><?= $produto['nome'] ?></td><td><?= $produto['unidade'] ?></td><td><?= $produto['fornecedor'] ?></td>
                        <td><a href="inserirproduto.php?id=<?= $produto['id']; ?>">Editar</a></td>
                        <td><a href="removerproduto.php?id=<?= $produto['id']; ?>">Remover</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <p><a href="inserirproduto.php">Inserir</a></p>
</section>

<?php require_once './footer.php'; ?>