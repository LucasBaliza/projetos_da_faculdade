<?php
include_once("dbprd01.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idAluno"])) {
    $idAluno = $_GET["idAluno"];
    $sql = "SELECT * FROM aluno WHERE idAluno = :idAluno";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":idAluno", $idAluno);
    $stmt->execute();
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aluno) {
        die("Aluno não encontrado!");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAluno = $_POST["idAluno"];
    $nome = $_POST["nome"];
    $ra = $_POST["ra"];

    $sql = "UPDATE aluno SET Nome = :nome, RA = :ra WHERE idAluno = :idAluno";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":idAluno", $idAluno);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":ra", $ra);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
</head>
<body>
    <h2>Editar Aluno</h2>
    <form action="editar.php" method="post">
        <input type="hidden" name="idAluno" value="<?= $aluno["idAluno"] ?>">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($aluno["Nome"]) ?>" required>
        <br>
        RA: <input type="number" name="ra" value="<?= htmlspecialchars($aluno["RA"]) ?>" required>
        <br>
        <input type="submit" value="Salvar">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
