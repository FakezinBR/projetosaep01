<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro usuário</h1>
    <form action="insert_usu.php" method="POST">
        <label for="nome">Insira o nome do usuário</label>
        <input id="nome" name="nome" type="text">
        <br>
        <label for="email">Insira o E-mail</label>
        <input id="email" name="email" type="text">
        <br>
        <button type="submit" name="submit">Enviar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>
