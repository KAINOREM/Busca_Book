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
				$cliente = $conexao -> real_escape_string($_POST['cliente']);
				$senha = $conexao -> real_escape_string($_POST['senha']);
				$endereco = $conexao -> real_escape_string($_POST['endereco']);
				$cidade = $conexao -> real_escape_string($_POST['cidade']);
				$estado = $conexao -> real_escape_string($_POST['estado']);
				$telefone = $conexao -> real_escape_string($_POST['telefone']);

				$sql = "INSERT INTO `biblioteca`.`cliente`
							(`nome`, `senha`, `endereco`, `cidade`, `estado`, `telefone`, `Status`)
						VALUES
							('".$cliente."', '".$senha."','".$endereco."', '".$cidade."','".$estado."', '".$telefone."','0');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>