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
            
            <div class="form-container">
                <h2 class="login-title">Informações do Livro</h2>
                
                <form method="post" action="cadastrarBanco_Livro.php">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Digite o Título do Livro" required>
                </div>  

                <div class="form-group">
                    <label for="capa">Capa (URL):</label>
                    <input type="url" name="capa" id="capa" placeholder="Cole o endereço da imagem" required>
                </div>

				<div class="form-group">
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" id="autor" placeholder="Digite o Autor do Livro" required>
                </div>

                <div class="form-group">
                    <label for="lancamento">Data de Lançamento:</label>
                    <input type="date" name="lancamento" id="lancamento" required>
                </div>

                <div class="form-group">
                    <label for="genero">Gênero:</label>
                    <input type="text" name="genero" id="genero" placeholder="Digite o Gênero do Livro" required>
                </div>

                <div class="form-group">
                    <label for="editora">Editora:</label>
                    <input type="text" name="editora" id="editora" placeholder="Digite a Editora do Livro" required>
                </div>

				<div class="form-group">
                    <label for="paginas">Páginas:</label>
                    <input type="number" name="paginas" id="paginas" placeholder="Digite a Quantidade de Páginas" required>
                </div>
                    <button type="submit" class="btn btn-submit">Cadastrar Livro</button>
                </form>
                
                <div class="nav-links">
                    <a href="site_funcionario.php" class="btn btn-link">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>