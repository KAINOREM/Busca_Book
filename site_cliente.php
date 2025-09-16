<html>
    <head>
        <title>Busca Book - Cliente</title>
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
                <form method="post" action="buscarBanco_cliente.php" class="search-form">
                    <input type="text" name="busca" id="busca" placeholder="Buscar livro..." required class="search-input">
                </form>
              </div>';

        $sql="SELECT * FROM `biblioteca`.`livros`;";
        $resultado = $conexao->query($sql);

        $Status = "SELECT 
                CASE WHEN EXISTS (
                    SELECT * FROM `reserva` `Rsv` 
                    WHERE `Rsv`.`IdCliente` = ".$_SESSION['Id']." 
                    AND `Rsv`.`Status` = 1
                ) THEN (
                    SELECT `IdLivro` FROM `reserva` 
                    WHERE `IdCliente` = ".$_SESSION['Id']." 
                    AND `Status` = 1 
                )
                ELSE 0 
               END AS 'Reservado'";

        $verificaReserva = $conexao->query($Status);
        $verificaReserva = $verificaReserva->fetch_assoc();

        echo '<div class="container">';
        
        // Seção de livros recomendados/em destaque
        echo '<div class="recommended-section">
                <h2 class="section-title">Livros Disponíveis</h2>
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
            
            if($verificaReserva['Reservado'] == 0) {
                    if ($livro['Status'] == 0) {
                    echo '<form method="POST" action="reservarBanco.php" style="display:inline;">';
                    echo '<input type="hidden" name="IdLivro" value="' . $livro['IdLivro'] . '">';
                    echo '<button type="submit" class="cartao">
                        <img src="Imagens/livre.png" alt="cartao" style="width: 38px; height: 38px;">
                        </button></form>';
                    } else {
                        echo '<input type="hidden" name="Status" value="' . $livro['IdLivro'] . '">';
                        echo '<button type="submit" class="cartao">
                        <img src="Imagens/reservado.png" alt="cartao" style="width: 38px; height: 38px;">
                        </button>';
                    }
                } else {
                    if ($livro['IdLivro'] == $verificaReserva['Reservado']) {
                    echo '<form method="POST" action="liberarBanco.php" style="display:inline;">';
                    echo '<input type="hidden" name="IdLivro" value="' . $livro['IdLivro'] . '">';
                    echo '<button type="submit" class="cartao">
                        <img src="Imagens/reservado.png" alt="cartao" style="width: 38px; height: 38px;">
                        </button>';
                    }
                }
            echo '</div>';
            echo '</div>';
        }
        
        echo '</div></div>'; // Fecha book-list e recommended-section
        
        echo '<div class="nav-links">
                <a href="sair.php" class="btn">Sair</a>
              </div>';
        
        echo '</div>'; // Fecha container
        
        $conexao->close();
        ?>
    </body>
</html>