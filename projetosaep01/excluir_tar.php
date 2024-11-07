<?php
include('conecta.php');

if (isset($_GET['cad_tarefa'])) {
    $cad_tarefa = $_GET['cad_tarefa'];

    $sql = "DELETE FROM TBL_tarefas WHERE cad_tarefa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cad_tarefa);

    if ($stmt->execute()) {
        echo "Tarefa excluída com sucesso!";
    } else {
        echo "Erro ao excluir tarefa: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Código da tarefa não fornecido.";
}

$conn->close();
?>
