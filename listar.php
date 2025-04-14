<?php
include_once("dbprd01.php");

session_start();
if (!isset($_SESSION['ra'])) {
    header("location: index.php");
}
var_dump($_SESSION);

try {
    $sql = "SELECT * FROM aluno";
    $result = $conexao->query($sql);
} catch (PDOException $e) {
    die("Erro ao buscar alunos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Alunos</title>
</head>
<body>

    <h2>Cadastrar Novo Aluno</h2>
    <form action="inserir.php" method="post">


   <a href="logout.php">Sair</a>
   
   <br><br>
        Nome: <input type="text" name="nome" required>
        <br>
        RA: <input type="number" name="ra" required>
        <br>
        Email: <input type="text" name="email" required>
        <br>
        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
    </form>

    <h2>Lista de Alunos</h2>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>RA</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php while ($linha = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $linha["idAluno"] ?></td>
                <td><?= htmlspecialchars($linha["Nome"]) ?></td>
                <td><?= htmlspecialchars($linha["RA"]) ?></td>
                <td><?= htmlspecialchars($linha["email"]) ?></td>
                <td>
                    <a href="editar.php?idAluno=<?= $linha['idAluno'] ?>">Editar</a> | 
                    <a href="excluir.php?idAluno=<?= $linha['idAluno'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br><br>
    <img src="picanha.png" alt="Picanha" width="300">

</body>
</html>
