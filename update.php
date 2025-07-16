<?php

include 'db.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE usuario SET name ='$name', email = '$email' WHERE id = $id";

    if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };

    $conn -> close();
    header("Location: create.php");
    exit();

};

$sql = "SELECT * FROM usuario WHERE id=$id";
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

        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['name'];?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>"required>
        <br><br>

        <input type="submit" name="create" value="Atualizar">

    </form>

    <div id="tabela-de-consulta">

    <?php

        include 'read.php';

    ?>  

    </div>

</body>

</html>