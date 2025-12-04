<?php 
namespace App\Controllers;
use App\Models\Usuario;

class UsuarioController {

    // --- LISTAR ---
    public function listar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: /project/public/login'); exit; }

        $usuarios = Usuario::buscarTodos();

        render("usuarios/lista_usuarios.php", [
            'title' => 'Gerenciar Usuários', 
            'usuarios' => $usuarios
        ]);
    }

    // --- TELA DE NOVO USUÁRIO ---
    public function inserir() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: /project/public/login'); exit; }

        render('usuarios/form_usuarios.php', [
            'title' => 'Novo Usuário', 
            'acao' => 'salvar', 
            'usuario' => []
        ]);
    }

    // --- TELA DE EDITAR ---
    public function editar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: /project/public/login'); exit; }
        
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: /project/public/usuarios'); exit; }

        $usuario = Usuario::buscarPorId($id);
        
        render('usuarios/form_usuarios.php', [
            'title' => 'Editar Usuário', 
            'acao' => 'atualizar', 
            'usuario' => $usuario
        ]);
    }

    // --- SALVAR (INSERT) ---
    public function salvar() {
        // CORREÇÃO: Removemos o password_hash aqui pois o Model já faz isso.
        // Se fizermos aqui também, a senha é criptografada duas vezes e o login falha.
        $dados = $_POST; 

        Usuario::salvar($dados);

        // Lógica de Redirecionamento
        if (isset($_SESSION['usuario_id'])) {
            header('Location: /project/public/usuarios');
        } else {
            header('Location: /project/public/login');
        }
        exit;
    }

    // --- ATUALIZAR (UPDATE) ---
    public function atualizar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: /project/public/login'); exit; }

        $id = $_POST['id'];
        $dados = $_POST;

        // CORREÇÃO: Removemos o password_hash aqui também.
        // Apenas removemos a senha do array se ela estiver vazia.
        if (empty($dados['senha'])) {
            unset($dados['senha']); 
        }

        Usuario::atualizar($id, $dados);
        
        header('Location: /project/public/usuarios');
        exit;
    }

    // --- EXCLUIR ---
    public function excluir() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: /project/public/login'); exit; }

        if (isset($_GET['id'])) {
            Usuario::excluir($_GET['id']);
        }
        header('Location: /project/public/usuarios');
        exit;
    }

    // --- LOGIN ---
    public function autenticar() {
        $email = $_POST['email'];
        $senha_digitada = $_POST['senha'];
        
        // Busca o usuário pelo e-mail
        $usuario = Usuario::buscarPorEmail($email);

        // Verifica se usuário existe E se a senha bate
        if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
            // Sucesso: Salva na sessão
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            
            // Redireciona para o Painel
            header('Location: /project/public/pagina-inicial');
            exit;
        } else {
            // Falha: Volta para o login com erro
            header('Location: /project/public/login?erro=1');
            exit;
        }
    }

    // --- LOGOUT ---
    public function logout() {
        session_destroy();
        header('Location: /project/public/');
        exit;
    }
}