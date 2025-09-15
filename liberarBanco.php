<?php
session_start();
$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "biblioteca";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $IdLivro = $conexao->real_escape_string($_POST['IdLivro']);


    $sqlUpdate = "UPDATE `biblioteca`.`cliente`
                 SET `Status` = '0'
                 WHERE `idCliente` = '" . $_SESSION['Id'] . "'";
        
    $resultado = $conexao->query($sqlUpdate);

    $sqlUpdate = "UPDATE `biblioteca`.`livros`
                 SET `Status` = '0'
                 WHERE `idLivro` = '" . $IdLivro . "'";
        
    $resultado = $conexao->query($sqlUpdate);

    $sqlUpdate = "UPDATE `biblioteca`.`reserva`
                 SET `Status` = '0'
                 WHERE `IdCliente` = '" . $_SESSION['Id'] . "' And `IdLivro` = '" . $IdLivro . "'";
        
    $resultado = $conexao->query($sqlUpdate);

    $conexao -> close();
	header('Location: site_cliente.php', true, 301);
}
?>