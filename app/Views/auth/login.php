<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background-color: #fff; padding: 2.5rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 400px; box-sizing: border-box; }
        .login-container h1 { text-align: center; color: #333; margin-top: 0; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: #555; font-weight: 600; }
        .form-group input { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn { width: 100%; padding: 0.85rem; border: none; border-radius: 6px; background-color: #007bff; color: white; font-size: 1rem; font-weight: 600; cursor: pointer; }
        .btn:hover { background-color: #0056b3; }
        .link-cadastro { text-align: center; margin-top: 1.5rem; }
        .link-cadastro a { color: #007bff; text-decoration: none; }
        .erro-login { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1><?php echo $title; ?></h1>

        <?php if (isset($_GET['erro'])): ?>
            <div class="erro-login">
                Email ou senha incorretos.
            </div>
        <?php endif; ?>

        <form action="login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>

        <div class="link-cadastro">
            <p>Não tem uma conta? <a href="cadastro">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>