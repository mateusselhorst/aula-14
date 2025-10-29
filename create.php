<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $name = $_POST['name'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO medicamentos (nome, tipo, preco, validade, quantidade) VALUE ('$name', '$tipo', '$preco', '$validade', '$quantidade')";

    if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };
    $conn->close();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>

<body>

    <form method="POST" action="create.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="comprimido">Comprimido</option>
            <option value="xarope">Xarope</option>
            <option value="pomada">Pomada</option>
            <option value="injecao">Injeção</option>
        </select>
        <br><br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" required>
        <br><br>
        <label for="validade">Validade:</label>
        <input type="date" name="validade" required>
        <br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required>
        <br><br>

        <input type="submit" name="create" value="Adicionar"><br><br>

    </form>

    <div id="tabela-de-consulta">

    <?php

        include 'read.php';

    ?>  

    </div>

</body>

</html>