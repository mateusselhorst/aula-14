<?php

    include 'db.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM usuario WHERE id=$id";

        if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };

    $conn -> close();
    header("Location: create.php");
    exit();

?>