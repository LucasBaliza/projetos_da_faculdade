<?php 

include_once("dbprd01.php");

$ra = $_REQUEST['ra'];
$senha = $_REQUEST['senha'];

$sql = "SELECT * FROM aluno WHERE RA = :ra AND Senha = :senha";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':ra', $ra);
$stmt->bindParam(':senha', md5($senha));

($stmt->execute());

if ($stmt->rowCount() > 0) {

    session_start();
    $_SESSION['ra'] = $ra;

    header("location: listar.php");
} else {
    header("location: index.php?m=Usuario ou senha incorretos");
}   

?>