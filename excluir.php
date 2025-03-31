<?php

include_once("dbprd01.php");
$idAluno = $_REQUEST['idAluno'];

$sql = "DELETE FROM aluno WHERE idAluno = :idAluno";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':idAluno', $idAluno);

($stmt->execute());

header("location: index.php");


?>