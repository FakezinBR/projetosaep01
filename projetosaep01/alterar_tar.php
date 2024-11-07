<?php
include('conecta.php'); // Inclui a conexão com o banco de dados

// Verifica se o 'cod_tarefa' foi passado via GET
if (isset($_GET['cod_tarefa'])) {
    $cod_tarefa = $_GET['cod_tarefa']; // Recupera o código da tarefa

    // Consulta para pegar os dados da tarefa
    $sql = "SELECT cod_tarefa, tar_setor, tar_prioridade, tar_descricao, tar_status FROM TBL_tarefas WHERE cod_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cod_tarefa); // O tipo 'i' para números inteiros
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se a tarefa foi encontrada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h1>Alterar Tarefa</h1>
        <form action="alterar_tar_action.php" method="POST">
            <!-- O campo 'cod_tarefa' está sendo enviado como 'hidden' para não ser modificado -->
            <input type="hidden" name="cod_tarefa" value="<?php echo $row['cod_tarefa']; ?>">

            <label for="setor">Setor</label>
            <input id="setor" name="setor" type="text" value="<?php echo $row['tar_setor']; ?>"><br>

            <label for="prioridade">Prioridade</label>
            <select name="prioridade" id="prioridade">
                <option value="Baixa" <?php if ($row['tar_prioridade'] == 'Baixa') echo 'selected'; ?>>Baixa</option>
                <option value="Media" <?php if ($row['tar_prioridade'] == 'Media') echo 'selected'; ?>>Média</option>
                <option value="Alta" <?php if ($row['tar_prioridade'] == 'Alta') echo 'selected'; ?>>Alta</option>
            </select><br>

            <label for="descricao">Descrição</label>
            <input id="descricao" name="descricao" type="text" value="<?php echo $row['tar_descricao']; ?>"><br>

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="A fazer" <?php if ($row['tar_status'] == 'A fazer') echo 'selected'; ?>>A fazer</option>
                <option value="Em processo" <?php if ($row['tar_status'] == 'Em processo') echo 'selected'; ?>>Em processo</option>
                <option value="Finalizada" <?php if ($row['tar_status'] == 'Finalizada') echo 'selected'; ?>>Finalizada</option>
            </select><br>

            <button type="submit" name="submit">Alterar</button>
        </form>
        <?php
    } else {
        echo "Tarefa não encontrada.";
    }
    $stmt->close();
} else {
    echo "Código da tarefa não fornecido.";
}

$conn->close();
?>
