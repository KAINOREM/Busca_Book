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
                echo '<div class="header">
                    <div class="logo">Busca Book</div>
                    <div class="user-name">Bem Vindo, '.$_SESSION['nome'].'</div>
                </div>';
            }
            $hostname = "127.0.0.1";
            $user = "root";
            $password = "";
            $database = "biblioteca";
            
            echo '<div class="container">
                    <form method="post" action="buscarBanco_funcionario.php" class="search-form">
                        <input type="text" name="busca" id="busca" placeholder="Buscar livro..." required class="search-input">
                    </form>
                </div>';

            $conexao = new mysqli($hostname,$user,$password,$database);

            $buscar = $conexao->real_escape_string($_POST['busca']);

            $sql = "SELECT * FROM `biblioteca`.`livros` 
                        WHERE `Titulo` LIKE '%$buscar%' OR `IdLivro` LIKE '%$buscar%'";

            $resultado = $conexao->query($sql);

            $cargo="SELECT `Cargo` FROM `biblioteca`.`funcionario` Where `IdFuncionario` = ".$_SESSION['Id'].";";

            $verificaCargo = $conexao->query($cargo);

            $verificaCargo = $verificaCargo->fetch_assoc();

            echo '<div class="container"><div class="book-list">';
            while($livro = $resultado->fetch_assoc()) {
                echo '<div class="book-item">';
                echo '<div class="book-info">';
                echo '<img src="'.$livro['Capa'].'" class="book-cover">';
                echo '<div class="book-details">';
                echo '<div class="book-id">ID: ' . $livro['IdLivro'] . '</div>';
                echo '<div class="book-title">' . $livro['Titulo'] . '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="book-actions">';
                if ($livro['Status'] == 0) {
                echo '<input type="hidden" name="Status" value="' . $livro['IdLivro'] . '">';
                echo '<button type="submit" class="action-btn status-available">
        			<img src="Imagens/livre.png" alt="Disponível">
     				</button>';
                } else {
                    echo '<input type="hidden" name="Status" value="' . $livro['IdLivro'] . '">';
                    echo '<button type="submit" class="action-btn status-reserved">
        			<img src="Imagens/reservado.png" alt="Reservado">
     				</button>';
                }
                echo '<form method="POST" action="apagarBanco.php" style="display:inline;">';
                echo '<input type="hidden" name="IdLivro_Apagar" value="' . $livro['IdLivro'] . '">';
                echo '<button type="submit" class="action-btn delete-btn" onclick="return confirm(\'Tem certeza que deseja excluir este livro?\')">
        			<img src="Imagens/lixeira.png" alt="Excluir">
     				</button> </form>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            
            $conexao -> close();

            echo '<div class="nav-links">
                  <a href="site_funcionario.php" class="btn">Voltar</a>
                  </div></div>';
        ?>
    </body>
</html>