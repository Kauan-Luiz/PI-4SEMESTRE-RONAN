<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 2rem 0; }
        .container { background-color: #fff; padding: 2.5rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 800px; box-sizing: border-box; }
        h1 { text-align: center; color: #333; margin-top: 0; margin-bottom: 1.5rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
        .form-group { margin-bottom: 0; }
        .full-width { grid-column: 1 / -1; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: #555; font-weight: 600; }
        .form-group input, .form-group select { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn { width: 100%; padding: 0.85rem; border: none; border-radius: 6px; background-color: #28a745; color: white; font-size: 1rem; font-weight: 600; cursor: pointer; margin-top: 1.5rem; }
        .btn:hover { background-color: #218838; }
        .link-login { text-align: center; margin-top: 1.5rem; }
        .link-login a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        
        <!-- CORREÇÃO: Caminho absoluto para a rota de salvar usuário -->
        <!-- Isso garante que vá para o lugar certo independente da URL atual -->
        <form action="/project/public/usuarios/salvar" method="POST">
            <div class="form-grid">
                
                <div class="form-group full-width">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf">
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" id="celular" name="celular">
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep">
                </div>

                <div class="form-group full-width">
                    <label for="rua">Rua</label>
                    <input type="text" id="rua" name="rua">
                </div>

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero">
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento" name="complemento">
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro">
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado">
                </div>

                <div class="form-group">
                    <label for="nivel_de_acesso">Nível de Acesso</label>
                    <select id="nivel_de_acesso" name="nivel_de_acesso">
                        <option value="usuario">Usuário</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
            
                <div class="form-group full-width">
                    <button type="submit" class="btn">Criar Conta</button>
                </div>
            </div>
        </form>
        <div class="link-login">
            <!-- CORREÇÃO: Caminho absoluto para a tela de login -->
            <p>Já tem uma conta? <a href="/project/public/login">Faça o login</a></p>
        </div>
    </div>
</body>
</html>