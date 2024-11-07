<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro usuario</h1>
    <form action="insert_tar.php" method = 'POST'>
        <label for="">Codigo do usuario</label>
        <br>
        <label for="">Insira o setor</label>
        <input id = 'setor' name = 'setor' type="text">
        <br> 
        <label for="">Prioridade</label>
        <select name="prioridade" id="prioridade">
            <option value="Baixa">Baixa</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
        </select>
        <br>
        <label for="">insira a Descrição</label>
        <input name = 'descricao' id = 'descricao' type="text">
        <br>
        <label for="">Status</label>
        <select name="status" id="status">
            <option value="Baixa">A fazer</option>
            <option value="Media">Em processo</option>
            <option value="Alta">Finalizada</option>
        </select>
        <br>
        <button type="submit" id = 'submit2' name="submit2">Enviar</button>
    </form>
    <a href="index.php">voltar</a>
</body>
</html>