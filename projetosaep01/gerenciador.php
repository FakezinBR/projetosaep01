<?php
include('conecta.php');

// Verifique a tabela e a coluna corretas
$sql = "SELECT tar_codigo, tar_setor, tar_prioridade, tar_descricao, tar_status FROM TBL_tarefas";
$result = $conn->query($sql); // Realizando a consulta corretamente

if ($result->num_rows > 0) {
    // Exibe os resultados
    ?>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Setor</th>
            <th>Prioridade</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['tar_codigo']; ?></td> <!-- Alterar o nome da coluna aqui -->
            <td><?php echo $row['tar_setor']; ?></td>
            <td><?php echo $row['tar_prioridade']; ?></td>
            <td><?php echo $row['tar_descricao']; ?></td>
            <td><?php echo $row['tar_status']; ?></td>
            <td>
                <a href="alterar_tar.php?tar_codigo=<?php echo $row['tar_codigo']; ?>">Alterar</a> |
                <a href="excluir_tar.php?tar_codigo=<?php echo $row['tar_codigo']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php
} else {
    echo "Nenhuma tarefa encontrada.";
}

$conn->close();
?>
