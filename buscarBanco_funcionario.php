<html>
    <head>
        <title>Busca Book</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <?php
        session_start();

            if (empty($_SESSION['Id'])){
                // Logado??? Não?? Tchau, bb.
                header('Location: sair.php');
                exit();
            } else {
                echo '<div class="cabecalho">
                    <div class="container">
                        <center>
                        <span class="corBranca">Bem Vindo, '.$_SESSION['nome'].'</span>
                        </center>
                    </div>
                </div>';
            }
            $hostname = "127.0.0.1";
            $user = "root";
            $password = "";
            $database = "biblioteca";
            
            echo '<form method="post" action="buscarBanco_funcionario.php" id="formCadastro" name="formCadastro">
                    <div class="form-group">
                        <input type="text" name="busca" id="busca" placeholder="Buscar" required>
                    </div>
		          </form>
            ';


            $conexao = new mysqli($hostname,$user,$password,$database);

            $buscar = $conexao->real_escape_string($_POST['busca']);

            $sql = "SELECT * FROM `biblioteca`.`livros` 
                        WHERE `Titulo` LIKE '%$buscar%' OR `IdLivro` LIKE '%$buscar%'";

            $resultado = $conexao->query($sql);

            $cargo="SELECT `Cargo` FROM `biblioteca`.`funcionario` Where `IdFuncionario` = ".$_SESSION['Id'].";";

            $verificaCargo = $conexao->query($cargo);

            $verificaCargo = $verificaCargo->fetch_assoc();
                
            while($livro = $resultado->fetch_assoc()) {
                echo '<div class="cliente-item">';
                echo '<div class="cliente-info">';
                echo '<img src="'.$livro['Capa'].'"style="width: auto; height: 100px;">';
                echo '<span class="cliente-id">' . $livro['IdLivro'] . '</span>';
                echo '<span class="cliente-nome">' . $livro['Titulo'] . '</span>';
                echo '</div>';
                echo '<div>';
                if ($livro['Status'] == 0) {
                echo '<input type="hidden" name="Status" value="' . $livro['IdLivro'] . '">';
                echo '<button type="submit" class="cartao">
        			<img src="Imagens/livre.png" alt="cartao" style="width: 38px; height: 38px;">
     				</button>';
                } else {
                    echo '<input type="hidden" name="Status" value="' . $livro['IdLivro'] . '">';
                    echo '<button type="submit" class="cartao">
        			<img src="Imagens/reservado.png" alt="cartao" style="width: 38px; height: 38px;">
     				</button>';
                }
                echo '<form method="POST" action="apagarBanco.php" style="display:inline;">';
                echo '<input type="hidden" name="IdLivro_Apagar" value="' . $livro['IdLivro'] . '">';
                echo '<button type="submit" class="excluir" onclick="return confirm(\"Tem certeza que deseja excluir este cliente?\")">
        			<img src="Imagens/lixeira.png" alt="Excluir" style="width: 38px; height: 38px;">
     				</button> </form>';
                echo '</div>';
                echo '</div>';
            }
            
            $conexao -> close();

            echo '<div class="links-principais">
                  <a href="site_funcionario.php" class="botao-principal">Voltar</a>
                  </div>';
        ?>
    </body>
</html>