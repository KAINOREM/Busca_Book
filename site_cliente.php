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
            
            $conexao = new mysqli($hostname,$user,$password,$database);

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
                
            while($livro = $resultado->fetch_assoc()) {
                echo '<div class="cliente-item">';
                echo '<div class="cliente-info">';
                echo '<img src="'.$livro['Capa'].'"style="width: auto; height: 100px;">';
                echo '<span class="cliente-id">' . $livro['IdLivro'] . '</span>';
                echo '<span class="cliente-nome">' . $livro['Titulo'] . '</span>';
                echo '</div>';
                echo '<div>';
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
                echo '<form method="POST" action="apagarBanco.php" style="display:inline;">';
                echo '<input type="hidden" name="IdLivro_Apagar" value="' . $livro['IdLivro'] . '">';
                echo '<button type="submit" class="excluir" onclick="return confirm(\"Tem certeza que deseja excluir este cliente?\")">
        			<img src="Imagens/lixeira.png" alt="Excluir" style="width: 38px; height: 38px;">
     				</button> </form>';
                echo '</div>';
                echo '</div>';
            }
            
            $conexao -> close();
        ?>
    </body>
</html>