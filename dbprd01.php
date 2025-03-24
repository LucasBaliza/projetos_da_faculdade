<?php

    $host = "127.0.0.1";
    $user = "root";
    $password = "ceub123456";
    $db = "dbprd01";
    $porta = "3306";

    $conexao = new PDO('mysql:host='.$host.'; 
                port='.$porta.'; 
                dbname='.$db,$user,$password); 

            
                var_dump($conexao);
?>

