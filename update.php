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
        <input type="text" name="nome" required value="<?php echo htmlspecialchars($row['nome']); ?>">
        <br><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="comprimido" <?php if($row['tipo'] == 'comprimido') echo 'selected'; ?>>Comprimido</option>
            <option value="xarope" <?php if($row['tipo'] == 'xarope') echo 'selected'; ?>>Xarope</option>
            <option value="pomada" <?php if($row['tipo'] == 'pomada') echo 'selected'; ?>>Pomada</option>
            <option value="injecao" <?php if($row['tipo'] == 'injecao') echo 'selected'; ?>>Injeção</option>
        </select>
        <br><br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" required value="<?php echo htmlspecialchars($row['preco']); ?>">
        <br><br>
        <label for="validade">Validade:</label>
        <input type="date" name="validade" required value="<?php echo htmlspecialchars($row['validade']); ?>">
        <br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required value="<?php echo htmlspecialchars($row['quantidade']); ?>">
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