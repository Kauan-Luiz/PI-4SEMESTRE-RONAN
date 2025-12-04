<?php
// O session_start() já foi chamado no index.php

// ---- PROTEÇÃO DE PÁGINA ----
// Se o usuário não estiver logado, ele é expulso para o login.
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login');
    exit;
}
// -----------------------------
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&family=Public+Sans:ital@1&display=swap" rel="stylesheet">
    
    <!-- Ele usa o mesmo CSS da home -->
    <link rel="stylesheet" href="css/styles.css">
    
    <title><?php echo $title; ?></title>
</head>
<body>
    <!-- 
    ===================================================
    PARTE LOGADA: O PAINEL DE CONTROLE (DASHBOARD)
    ===================================================
    -->
    <header class="menu-bg">
        <div class="menu container">
            <div class="menu-logo">
                <a href=".">TimeFlow</a> <!-- Link para a home de marketing -->
            </div>
            <nav class="menu-nav">
                <ul>
                    <li class="user-welcome">Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</li>
                    <!-- O BOTÃO DE SAIR -->
                    <li><a href="logout" class="btn-nav">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="dashboard-bg">
        <div class="dashboard container">
            <h1>Painel do Sistema</h1>
            
            <div class="dashboard-grid">
                <!-- AS "OPÇÕES DO SISTEMA" -->
                
                <a href="usuarios" class="dashboard-card">
                    <h2>Listar Usuários</h2>
                    <p>Ver e gerenciar todos os usuários cadastrados no sistema.</p>
                </a>
                
                <a href="usuarios/inserir" class="dashboard-card">
                    <h2>Cadastrar Usuário</h2>
                    <p>Adicionar um novo usuário preenchendo o formulário completo.</p>
                </a>
                
                <a href="produtos" class="dashboard-card">
                    <h2>Listar Produtos</h2>
                    <p>Ver e gerenciar os serviços e produtos da empresa.</p>
                </a>
                
                <a href="#" class="dashboard-card disabled">
                    <h2>Meu Perfil</h2>
                    <p>(Em breve) Editar suas informações de perfil e senha.</p>
                </a>

            </div>
        </div>
    </main>

     <footer class="footer">
         <p> TimeFlow @ todos os direitos reservados. </p>
     </footer>

</body>
</html>