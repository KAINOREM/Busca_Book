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
				$Livro = $conexao -> real_escape_string($_POST['IdLivro_Apagar']);

				$sql = "DELETE FROM `biblioteca`.`Livros`
							Where `IdLivro` = '".$Livro."';";
				$resultado = $conexao->query($sql);

				$sql = "DELETE FROM `biblioteca`.`reserva`
							Where `idLivro` = '".$Livro."';";
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site_funcionario.php', true, 301);
			}
		?>
	</body>
</html>