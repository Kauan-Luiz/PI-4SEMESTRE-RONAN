<?php 
namespace App\Controllers;
use App\Models\Usuario;

class UsuarioController {

    // --- LISTAR ---
    public function listar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: login'); exit; }

        $usuarios = Usuario::buscarTodos();

        render("usuarios/lista_usuarios.php", [
            'title' => 'Gerenciar Usuários', 
            'usuarios' => $usuarios
        ]);
    }

    // --- TELA DE NOVO USUÁRIO ---
    public function inserir() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: login'); exit; }

        // AQUI ESTAVA O PROBLEMA: Faltava enviar 'acao' => 'salvar'
        render('usuarios/form_usuarios.php', [
            'title' => 'Novo Usuário', 
            'acao' => 'salvar',  // <--- ESSA LINHA É OBRIGATÓRIA
            'usuario' => []
        ]);
    }

    // --- TELA DE EDITAR ---
    public function editar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: login'); exit; }
        
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: ../usuarios'); exit; }

        $usuario = Usuario::buscarPorId($id);
        
        // AQUI TAMBÉM: 'acao' => 'atualizar'
        render('usuarios/form_usuarios.php', [
            'title' => 'Editar Usuário', 
            'acao' => 'atualizar', // <--- ESSA LINHA É OBRIGATÓRIA
            'usuario' => $usuario
        ]);
    }

    // --- SALVAR (INSERT) ---
    public function salvar() {
        $dados = $_POST;
        
        // Criptografa senha
        if (!empty($dados['senha'])) {
            $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        }

        Usuario::salvar($dados);

        // Volta para a lista
        if (isset($_SESSION['usuario_id'])) {
            header('Location: ../usuarios');
        } else {
            header('Location: ../login');
        }
        exit;
    }

    // --- ATUALIZAR (UPDATE) ---
    public function atualizar() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: login'); exit; }

        $id = $_POST['id'];
        $dados = $_POST;

        // Se a senha estiver vazia, remove do array para não sobrescrever
        if (!empty($dados['senha'])) {
            $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        } else {
            unset($dados['senha']); 
        }

        Usuario::atualizar($id, $dados);
        
        header('Location: ../usuarios');
        exit;
    }

    // --- EXCLUIR ---
    public function excluir() {
        if (!isset($_SESSION['usuario_id'])) { header('Location: login'); exit; }

        if (isset($_GET['id'])) {
            Usuario::excluir($_GET['id']);
        }
        header('Location: ../usuarios');
        exit;
    }

    // --- LOGIN ---
    public function autenticar() {
        $email = $_POST['email'];
        $senha_digitada = $_POST['senha'];
        $usuario = Usuario::buscarPorEmail($email);

        if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            echo '<script>window.location.href = "pagina-inicial";</script>';
            exit;
        } else {
            header('Location: login?erro=1');
            exit;
        }
    }

    // --- LOGOUT ---
    public function logout() {
        session_destroy();
        header('Location: .');
        exit;
    }
}