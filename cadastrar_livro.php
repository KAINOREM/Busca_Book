<html>
    <head>
        <title>Busca Book - Cadastrar Livro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Cadastrar Livro</h1>
            
            <div class="divCadastro">
                <h2>Informações</h2>
                
                <form method="post" action="cadastrarBanco_Livro.php" id="formCadastro" name="formCadastro">
                <div class="form-group">
                    <label for="cliente">Título:</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Digite o Título do Livro" required>
                </div>  

                <div class="form-group">
                    <label for="cliente">Capa:</label>
                    <input type="text" name="capa" id="capa" placeholder="Cole o endereço de Imagem" required>
                </div>

				<div class="form-group">
                    <label for="cliente">Autor:</label>
                    <input type="text" name="autor" id="autor" placeholder="Digite o Autor do Livro" required>
                </div>

                <div class="form-group">
                    <label for="cliente">Lançamento:</label>
                    <input type="text" name="lancamento" id="lancamento" placeholder="Digite a Data de Lançamento do Livro" required>
                </div>

                <div class="form-group">
                    <label for="cliente">Gênero:</label>
                    <input type="text" name="genero" id="genero" placeholder="Digite a Editora do Livro" required>
                </div>

                <div class="form-group">
                    <label for="cliente">Editora:</label>
                    <input type="text" name="editora" id="editora" placeholder="Digite a Editora do Livro" required>
                </div>

				<div class="form-group">
                    <label for="cliente">Páginas:</label>
                    <input type="text" name="paginas" id="paginas" placeholder="Digite a Quantidade de Páginas do Livro" required>
                </div>
                    <button type="submit" class="btn-submit">Cadastrar Livro</button>
                </form>
                
                <div class="container-center">
                    <a href="site_funcionario.php" class="link-voltar">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>