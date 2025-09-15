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
    $titulo = $conexao->real_escape_string($_POST['titulo']);
    $capa = $conexao->real_escape_string($_POST['capa']);
    $autor = $conexao->real_escape_string($_POST['autor']);
    $lancamento = $conexao->real_escape_string($_POST['lancamento']);
    $genero = $conexao->real_escape_string($_POST['genero']);
    $editora = $conexao->real_escape_string($_POST['editora']);
    $paginas = $conexao->real_escape_string($_POST['paginas']);

    $sql = "INSERT INTO `biblioteca`.`livros`
            (`Titulo`, `Capa`, `Autor`, `Ano`, `Genero`, `Editora`, `Paginas`, `Status`, `IdFuncionario`)
            VALUES
            ('".$titulo."', '".$capa."', '".$autor."', '".$lancamento."', '".$genero."', '".$editora."', '".$paginas."', '0', '".$_SESSION['Id']."')";

    $resultado = $conexao->query($sql);

    $conexao -> close();
	header('Location: site_funcionario.php', true, 301);
}
?>