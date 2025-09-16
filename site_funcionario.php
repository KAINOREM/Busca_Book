<html>
    <head>
        <title>Busca Book - Funcionário</title>
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
        
        $conexao = new mysqli($hostname,$user,$password,$database);

        echo '<div class="container">
                <form method="post" action="buscarBanco_funcionario.php" class="search-form">
                    <input type="text" name="busca" id="busca" placeholder="Buscar livro..." required class="search-input">
                </form>
              </div>';
        
        $sql = "SELECT * FROM `biblioteca`.`livros`";
        $resultado = $conexao->query($sql);

        $cargo="SELECT `Cargo` FROM `biblioteca`.`funcionario` Where `IdFuncionario` = ".$_SESSION['Id'].";";
        $verificaCargo = $conexao->query($cargo);
        $verificaCargo = $verificaCargo->fetch_assoc();

        echo '<div class="container">';
        echo '<div class="recommended-section">
                <h2 class="section-title">Gerenciar Livros</h2>
                <div class="book-list">';
            
        while($livro = $resultado->fetch_assoc()) {
            echo '<div class="book-item">';
            echo '<div class="book-info">';
            echo '<img src="'.$livro['Capa'].'" class="book-cover">';
            echo '<div class="book-details">';
            echo '<div class="book-id">ID: ' . $livro['IdLivro'] . '</div>';
            echo '<div class="book-title">' . $livro['Titulo'] . '</div>';
            echo '<div class="book-author">' . (isset($livro['Autor']) ? $livro['Autor'] : 'Autor não informado') . '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="book-actions">';
            
            if ($livro['Status'] == 0) {
                echo '<button type="button" class="action-btn status-available" title="Livro disponível">
                        <img src="Imagens/livre.png" alt="Disponível">
                      </button>';
            } else {
                echo '<button type="button" class="action-btn status-reserved" title="Livro reservado">
                        <img src="Imagens/reservado.png" alt="Reservado">
                      </button>';
            }
            
            echo '<form method="POST" action="apagarBanco.php" style="display:inline;">';
            echo '<input type="hidden" name="IdLivro_Apagar" value="' . $livro['IdLivro'] . '">';
            echo '<button type="submit" class="action-btn delete-btn" onclick="return confirm(\'Tem certeza que deseja excluir este livro?\')" title="Excluir livro">
                    <img src="Imagens/lixeira.png" alt="Excluir">
                  </button></form>';
            echo '</div>';
            echo '</div>';
        }
        
        echo '</div></div>'; // Fecha book-list e recommended-section
        
        $conexao->close();

        // Menu de navegação baseado no cargo
        echo '<div class="nav-links">';
        
        if(strtoupper($verificaCargo['Cargo']) == 'GERENTE') {
            echo '<a href="cadastrar_funcionario.php" class="btn">Cadastrar Funcionário</a>';
            echo '<a href="cadastrar_livro.php" class="btn">Cadastrar Livro</a>';
            echo '<a href="verifica_reservas.php" class="btn">Verificar Reservas</a>';
        } else {
            echo '<a href="cadastrar_livro.php" class="btn">Cadastrar Livro</a>';
            echo '<a href="verifica_reservas.php" class="btn">Verificar Reservas</a>';
        }
        
        echo '<a href="sair.php" class="btn btn-link">Sair</a>';
        echo '</div>';
        
        echo '</div>'; // Fecha container
        ?>
    </body>
</html>