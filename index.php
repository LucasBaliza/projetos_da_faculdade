<?php

$mensagem = isset($_GET['m']) ? $_GET['m'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "login.php" method="POST"> 
        <?php echo $mensagem; ?>
        <br><br>
 RA: <input type="text" name="ra">
 <br><br>
 SENHA: <input type="password" name="senha">
 <br><br>
 <input type="submit" value="Entrar">   


</form>
</body>
</html>