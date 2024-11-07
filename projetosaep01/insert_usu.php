<?php
include('conecta.php');
if (isset($_POST['submit'])) {
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = 'INSERT INTO TBL_usuarios (usu_nome, usu_email) VALUES (?,?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}
$stmt->close();
}
$conn->close();
?>