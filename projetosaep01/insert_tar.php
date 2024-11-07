<?php
include('conecta.php');
if (isset($_POST['submit2'])) {
$setor = $_POST['setor'];
$prioridade = $_POST['prioridade'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$sql = 'INSERT INTO TBL_tarefas (tar_setor, tar_prioridade, tar_descricao, tar_status) VALUES (?,?,?,?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $setor, $prioridade, $descricao, $status);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}
$stmt->close();
}
$conn->close();
?>