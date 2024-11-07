<?php
include('conecta.php');

// Verifica se o formulário foi enviado e se o código da tarefa foi fornecido
if (isset($_POST['submit']) && isset($_POST['cod_tarefa'])) {
    $cod_tarefa = $_POST['cod_tarefa']; // Código da tarefa a ser alterado
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE TBL_tarefas SET tar_setor = ?, tar_prioridade = ?, tar_descricao = ?, tar_status = ? WHERE cod_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $setor, $prioridade, $descricao, $status, $cod_tarefa); // 'i' para inteiro e 's' para string

    // Verifica se a execução foi bem-sucedida
    if ($stmt->execute()) {
        echo "Tarefa alterada com sucesso!";
        header("Location: gerenciador.php"); // Redireciona de volta para o gerenciamento
    } else {
        echo "Erro ao alterar a tarefa: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro: Código da tarefa não fornecido.";
}

$conn->close();
?>
