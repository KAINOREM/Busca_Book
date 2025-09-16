<html>
    <head>
        <title>Busca Book - Verificar Reservas</title>
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
                <h1 class="page-title">Reservas Ativas</h1>';

        $sql="SELECT `Lvr`.`Titulo`, `Lvr`.`Capa`, `Lvr`.`IdLivro`, `Clt`.`Nome`, `Clt`.`IdCliente`, `Rsv`.`DataReserva`
              FROM `reserva` `Rsv`
              Left Outer Join `livros` `Lvr` ON `Lvr`.`IdLivro` = `Rsv`.`IdLivro`
              Left Outer Join `cliente` `Clt` ON `Clt`.`IdCliente` = `Rsv`.`IdCliente`
              Where `Rsv`.`Status` = '1'
              ORDER BY `Rsv`.`DataReserva` DESC;";

        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0) {
            echo '<div class="recommended-section">
                    <h2 class="section-title">Livros Reservados</h2>
                    <div class="book-list">';
                
            while($reserva = $resultado->fetch_assoc()) {
                echo '<div class="book-item">';
                echo '<div class="book-info">';
                
                // Usar capa se disponível, senão usar imagem padrão
                $capa = !empty($reserva['Capa']) ? $reserva['Capa'] : 'Imagens/capa_padrao.png';
                echo '<img src="'.$capa.'" class="book-cover">';
                
                echo '<div class="book-details">';
                echo '<div class="book-id">Livro ID: ' . $reserva['IdLivro'] . '</div>';
                echo '<div class="book-title">' . $reserva['Titulo'] . '</div>';
                echo '<div class="book-author">Reservado por: ' . $reserva['Nome'] . '</div>';
                
                // Mostrar data da reserva se disponível
                if (!empty($reserva['DataReserva'])) {
                    $dataFormatada = date('d/m/Y', strtotime($reserva['DataReserva']));
                    echo '<div class="book-author">Data: ' . $dataFormatada . '</div>';
                }
                
                echo '</div>';
                echo '</div>';
                echo '<div class="book-actions">';
                
                // Botão de status reservado
                echo '<button type="button" class="action-btn status-reserved" title="Livro reservado">
                        <img src="Imagens/reservado.png" alt="Reservado">
                      </button>';
                
                // Botão para liberar reserva (opcional)
                echo '<form method="POST" action="liberarBanco.php" style="display:inline;">';
                echo '<input type="hidden" name="IdLivro" value="' . $reserva['IdLivro'] . '">';
                echo '<input type="hidden" name="IdCliente" value="' . $reserva['IdCliente'] . '">';
                echo '<button type="submit" class="action-btn delete-btn" onclick="return confirm(\'Tem certeza que deseja liberar esta reserva?\')" title="Liberar reserva">
                        <img src="Imagens/livre.png" alt="Liberar">
                      </button></form>';
                
                echo '</div>';
                echo '</div>';
            }
            
            echo '</div></div>'; // Fecha book-list e recommended-section
            
        } else {
            echo '<div class="form-container">
                    <h2 class="login-title">Nenhuma Reserva Encontrada</h2>
                    <p style="color: #b8d4d1; text-align: center; margin: 20px 0;">
                        Não há livros reservados no momento.
                    </p>
                  </div>';
        }
        
        $conexao->close();
        
        echo '<div class="nav-links">
                <a href="site_funcionario.php" class="btn">Voltar</a>
              </div>';
        
        echo '</div>'; // Fecha container
        ?>
    </body>
</html>