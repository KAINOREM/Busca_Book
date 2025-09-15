<html>
    <head>
        <title>Busca Book - Cadastrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Cadastrar Novo Funcionário</h1>
            
            <div class="divCadastro">
                <h2>Dados do Cliente</h2>
                
                <form method="post" action="cadastrarBanco_Funcionario.php" id="formCadastro" name="formCadastro">
                    <div class="form-group">
                        <label for="cliente">Nome Completo:</label>
                        <input type="text" name="funcionario" id="funcionario" placeholder="Digite o Nome" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Endereço:</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite o Endereço" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite o cidade" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Estado:</label>
                        <input type="text" name="estado" id="estado" placeholder="Digite o estado" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cliente">Cargo:</label>
                        <input type="text" name="cargo" id="cargo" placeholder="Digite o cargo" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente">Data_Admissao:</label>
                        <input type="text" name="data" id="data" placeholder="Digite quando ele foi contratado" required>
                    </div>
                    <button type="submit" class="btn-submit">Cadastrar Funcionário</button>
                </form>
                
                <div class="container-center">
                    <a href="site_funcionario.php" class="link-voltar">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>