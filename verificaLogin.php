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
				// Evita caracteres epsciais (SQL Inject)
				$usuario = $conexao -> real_escape_string($_POST['usuario']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql="SELECT * FROM `biblioteca`.`funcionario`
					WHERE `Nome` = '".$usuario."' And `senha` = '".$senha."';";

				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['Id'] = $row[0];
					$_SESSION['nome'] = $row[1];
					$conexao -> close();
					
					header('Location: site_funcionario.php', true, 302);
					exit();
				} else {
					$sql="SELECT * FROM `biblioteca`.`cliente`
					WHERE `Nome` = '".$usuario."' And `senha` = '".$senha."';";

					$resultado = $conexao->query($sql);

					if($resultado->num_rows != 0){
					$row = $resultado -> fetch_array();
					$_SESSION['Id'] = $row[0];
					$_SESSION['nome'] = $row[1];
					$conexao -> close();
					
					header('Location: site_cliente.php', true, 302);
					exit();
					} Else {
					$conexao -> close();
					header('Location: index.php', true, 302);
					exit();
				}
			}
		}
		?>