<?php

include 'db.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE medicamentos SET nome ='$nome', tipo = '$tipo', preco = '$preco', validade = '$validade', quantidade = '$quantidade' WHERE id = $id";

    if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };

    $conn -> close();
    header("Location: create.php");
    exit();

};

$sql = "SELECT * FROM medicamentos WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
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

        <input type="submit" name="create" value="Atualizar"><br>

    </form>

    <div id="tabela-de-consulta">

    <?php

        include 'read.php';

    ?>  

    </div>

</body>

</html>