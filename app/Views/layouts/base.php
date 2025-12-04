<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,700;1,700&family=Public+Sans:ital@1&display=swap" rel="stylesheet">
    
    <!-- CSS CORRIGIDO -->
    <!-- O caminho começa com /project/public para garantir que o navegador encontre o arquivo -->
    <!-- independente de qual página você esteja (usuarios, produtos, etc) -->
    <link rel="stylesheet" href="/project/public/css/styles.css"> 
    
    <title><?php echo $title ?? 'TimeFlow'; ?></title>
</head>
<body>

    <!-- CABEÇALHO DO SISTEMA -->
    <header class="menu-bg">
        <div class="menu container">
            <div class="menu-logo">
                <!-- Ajustado link da logo para voltar pra home -->
                <a href="/project/public/pagina-inicial">TimeFlow</a>
            </div>
            <nav class="menu-nav">
                <ul>
                    <li class="user-welcome">Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?>!</li>
                    <!-- Ajustado link de sair -->
                    <li><a href="/project/public/logout" class="btn-nav">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="dashboard-bg">
        <div class="container">
            <!-- Esta variável $content é gerada automaticamente pelo render() -->
            <?php echo $content; ?>
        </div>
    </main>

    <!-- RODAPÉ -->
    <footer class="footer">
        <p> TimeFlow @ todos os direitos reservados. </p>
    </footer>

</body>
</html>