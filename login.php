<html>
    <head>
        <title>Busca Book - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Busca Book</h1>
            
            <div class="login-container">
                <h2 class="login-title">Login</h2>
                
                <form method="post" action="verificaLogin.php">
                    <div class="form-group">
                        <label for="usuario">Email:</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Digite seu email ou nome" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    
                    <button type="submit" class="btn btn-submit">Entrar</button>
                </form>
                
                <div class="nav-links">
                    <a href="index.php" class="btn btn-link">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>