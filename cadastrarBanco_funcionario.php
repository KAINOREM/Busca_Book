<html>	
    <body>
		<?php
		session_start();
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "biblioteca";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$funcionario = $conexao -> real_escape_string($_POST['funcionario']);
				$senha = $conexao -> real_escape_string($_POST['senha']);
				$endereco = $conexao -> real_escape_string($_POST['endereco']);
				$cidade = $conexao -> real_escape_string($_POST['cidade']);
				$estado = $conexao -> real_escape_string($_POST['estado']);
				$telefone = $conexao -> real_escape_string($_POST['telefone']);
				$cargo = $conexao -> real_escape_string($_POST['cargo']);
				$data = $conexao -> real_escape_string($_POST['data']);

				$sql = "INSERT INTO `biblioteca`.`funcionario`
							(`nome`, `senha`, `endereco`, `cidade`, `estado`, `telefone`, `cargo`, `Data_Admissao`)
						VALUES
							('".$funcionario."', '".$senha."','".$endereco."', '".$cidade."','".$estado."', '".$telefone."','".$cargo."', '".$data."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site_funcionario.php', true, 301);
			}
		?>
	</body>
</html>