<?php

    include 'db.php';

    $sql = "SELECT * FROM medicamentos";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Tipo </th>
            <th> Preço </th>
            <th> Validade </th>
            <th> Quantidade </th>
            <th> Ações </th>
        </tr>";

        while($row = $result -> fetch_assoc()) {

            echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['tipo']} </td>
                        <td> {$row['preco']} </td>
                        <td> {$row['validade']} </td>
                        <td> {$row['quantidade']} </td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Editar<a>
                            <a href='delete.php?id={$row['id']}'>Excluir<a>
                        </td>
                    </tr>
            ";
        };

        echo "</table>";

    }else{

        echo "Nenhum Registro encontrado.";

    };

    $conn -> close();

?>