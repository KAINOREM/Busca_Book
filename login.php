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
            
            <div class="divLogin">
                <h2>Login</h2>
                
                <form method="post" action="verificaLogin.php" id="formlogin" name="formlogin">
                    <div class="form-group">
                        <label for="usuario">Nome:</label>
                        <input type="usuario" name="usuario" id="usuario" placeholder="Digite seu nome" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    
                    <button type="submit" class="btn-submit">Entrar</button>
                </form>
            </div>
        </div>
    </body>
</html>