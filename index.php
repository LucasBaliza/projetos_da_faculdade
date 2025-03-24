<?php

include_once("dbprd01.php");

$sql = "SELECT * FROM aluno";
$result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" width"100%">
        <tr>
            <td>idAluno</td>
            <td>Nome</td>
            <td>RA</td>
        </tr>

        <tr>
           <?php
                while($linha = $result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>".$linha["idAluno"]."</td>";
                    echo "<td>".$linha["Nome"]."</td>";
                    echo "<td>".$linha["RA"]."</td>";  
                    
                    echo "</tr>";
                }  

            ?> 
        </tr>
</body>
</html>