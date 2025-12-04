<?php
// OBRIGATÓRIO: Inicia a sessão no topo de tudo
session_start();

// FORÇA O PHP A MOSTRAR ABSOLUTAMENTE TUDO (Para debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Importa o autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Importa os Controllers
use App\Controllers\UsuarioController;
use App\Controllers\ProdutoController;

// --- FUNÇÕES DE RENDERIZAÇÃO ---
function render($view, $data = []) {
    extract($data);
    ob_start();
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    require __DIR__ . '/../app/Views/layouts/base.php';
}

function render_sem_template($view, $data = []) {
    extract($data);
    ob_start();
    require __DIR__ . '/../app/Views/'. $view;
}

// --- ROTEAMENTO INTELIGENTE (Limpa a URL) ---
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = dirname($scriptName);

// Corrige barras invertidas no Windows
if ($basePath === '/' || $basePath === '\\') { $basePath = ''; }

// Remove a pasta base da URL para pegar a rota limpa
$url = substr($url, strlen($basePath));

// Garante que a URL comece com /
if (empty($url)) { $url = '/'; }

$metodo = $_SERVER['REQUEST_METHOD'];
$usuarioCtrl = new UsuarioController();
$produtoCtrl = new ProdutoController();

// --- DEFINIÇÃO DAS ROTAS ---

// 1. Home e Painel
if ($url == "/") {
    render_sem_template('home.php', ['title' => 'Bem-vindo ao TimeFlow']);
}
elseif ($url == "/pagina-inicial") {
    render_sem_template('pagina-inicial.php', ['title' => 'Painel do Sistema']);
}

// 2. Autenticação (Login/Logout)
elseif ($url == "/login" && $metodo == "GET") {
    render_sem_template('auth/login.php', ['title' => 'Entrar no Sistema']);
} 
elseif ($url == "/login" && $metodo == "POST") {
    $usuarioCtrl->autenticar();
}
elseif ($url == "/logout") {
    $usuarioCtrl->logout();
}

// 3. Cadastro Público
elseif ($url == "/cadastro" && $metodo == "GET") {
    render_sem_template('auth/cadastro.php', ['title' => 'Criar Nova Conta']);
}
elseif ($url == "/cadastro" && $metodo == "POST") {
    $usuarioCtrl->salvar();
}

// 4. CRUD de Usuários
elseif ($url == "/usuarios") {
    $usuarioCtrl->listar();
}
elseif ($url == "/usuarios/inserir") {
    // CORREÇÃO: Chama o Controller (que define as variáveis) em vez de renderizar direto
    $usuarioCtrl->inserir();
}
elseif ($url == "/usuarios/salvar" && $metodo == "POST") {
    // NOVA ROTA ADICIONADA: Processa o cadastro vindo do painel
    $usuarioCtrl->salvar();
}
elseif ($url == "/usuarios/editar") {
    $usuarioCtrl->editar(); 
}
elseif ($url == "/usuarios/atualizar" && $metodo == "POST") {
    $usuarioCtrl->atualizar();
}
elseif ($url == "/usuarios/excluir") {
    $usuarioCtrl->excluir();
}

// 5. CRUD de Produtos
elseif ($url == "/produtos") {
    $produtoCtrl->listar();
}
elseif ($url == "/produtos/inserir") {
    $produtoCtrl->inserir();
}
elseif ($url == "/produtos/salvar" && $metodo == "POST") {
    $produtoCtrl->salvar();
}
elseif ($url == "/produtos/editar") {
    $produtoCtrl->editar();
}
elseif ($url == "/produtos/atualizar" && $metodo == "POST") {
    $produtoCtrl->atualizar();
}
elseif ($url == "/produtos/excluir") {
    $produtoCtrl->excluir();
}

// 6. Erro 404
else {
    http_response_code(404);
    echo "<div style='font-family: sans-serif; text-align: center; padding: 50px;'>";
    echo "<h1 style='color: #d9534f;'>Erro 404</h1>";
    echo "<p>Página não encontrada.</p>";
    echo "<p>A URL acessada foi: <strong>$url</strong></p>";
    echo "<a href='pagina-inicial'>Voltar ao Início</a>";
    echo "</div>";
}