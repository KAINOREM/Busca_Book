<html>
    <head>
        <title>Busca Book - Cadastrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Cadastrar Novo Cliente</h1>
            
            <div class="form-container">
                <h2 class="login-title">Dados do Cliente</h2>
                
                <form method="post" action="cadastrarBanco_cliente.php">
                    <div class="form-group">
                        <label for="cliente">Nome Completo:</label>
                        <input type="text" name="cliente" id="cliente" placeholder="Digite seu Nome" required>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite o Endereço" required>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" placeholder="Digite o estado" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone" required>
                    </div>
                    
                    <button type="submit" class="btn btn-submit">Cadastrar Cliente</button>
                </form>
                
                <div class="nav-links">
                    <a href="index.php" class="btn btn-link">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>
