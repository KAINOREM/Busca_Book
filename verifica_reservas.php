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

            $sql="SELECT `Lvr`.`Titulo`, `Clt`.`Nome` FROM `reserva` `Rsv`
                    Left Outer Join
                        `livros` `Lvr` ON `Lvr`.`IdLivro` = `Rsv`.`IdLivro`
                    Left Outer Join
                        `cliente` `Clt` ON `Clt`.`IdCliente` = `Rsv`.`IdCliente`
                    Where
                        `Rsv`.`Status` = '1';";

            $resultado = $conexao->query($sql);
                
            while($reserva = $resultado->fetch_assoc()) {
                echo '<div class="cliente-item">';
                echo '<div class="cliente-info">';
                echo '<span class="cliente-id">' . $reserva['Titulo'] . '</span>';
                echo '<span class="cliente-nome">' . $reserva['Nome'] . '</span>';
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