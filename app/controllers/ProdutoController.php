<?php 
namespace App\Controllers;

use App\Models\Produto;

class ProdutoController {

    public function listar() {
        $produtos = Produto::buscarTodos();
        render('produtos/lista_produtos.php', [
            'title' => 'Gerenciar Produtos', 
            'produtos' => $produtos
        ]);
    }

    public function inserir() {
        render('produtos/form_produtos.php', [
            'title' => 'Novo Produto', 
            'acao' => 'salvar', 
            'produto' => []
        ]);
    }

    public function editar() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /produtos'); // Ajuste se necessário
            exit;
        }

        $produto = Produto::buscarPorId($id);

        render('produtos/form_produtos.php', [
            'title' => 'Editar Produto', 
            'acao' => 'atualizar', 
            'produto' => $produto
        ]);
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Produto::salvar($_POST);
            header('Location: ../produtos'); // Volta para a lista
            exit;
        }
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            Produto::atualizar($id, $_POST);
            header('Location: ../produtos'); // Volta para a lista
            exit;
        }
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Produto::excluir($id);
        }
        header('Location: ../produtos'); // Volta para a lista
        exit;
    }
}