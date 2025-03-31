<?php

 include_once("dbprd01.php");

 $nome = $_REQUEST['nome'];
 $ra = $_REQUEST['ra'];

 $sql = "INSERT INTO aluno (idAluno, Nome, RA) VALUES (null, :nome, :ra)";
 $stmt = $conexao->prepare($sql);
 $stmt->bindParam(':nome', $nome);
 $stmt->bindParam(':ra', $ra);

 ($stmt->execute());

 header("location: index.php");

?>