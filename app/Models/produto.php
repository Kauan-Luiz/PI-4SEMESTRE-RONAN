<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Produto {

    // 1. Listar todos os produtos
    public static function buscarTodos() {
        $pdo = Database::conectar();
        
        // Ordena pelo ID decrescente
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Buscar produto por ID (para edição)
    public static function buscarPorId($id) {
        $pdo = Database::conectar();
        
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Salvar novo produto
    public static function salvar($dados) {
        $pdo = Database::conectar();

        // Limpa o preço
        $preco = str_replace(['R$', '.', ','], ['', '', '.'], $dados['preco']);

        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade) VALUES (:nome, :descricao, :preco, :quantidade)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':descricao', $dados['descricao']);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':quantidade', $dados['quantidade']);
        
        return $stmt->execute();
    }

    // 4. Atualizar produto existente
    public static function atualizar($id, $dados) {
        $pdo = Database::conectar();

        $preco = str_replace(['R$', '.', ','], ['', '', '.'], $dados['preco']);

        $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':descricao', $dados['descricao']);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':quantidade', $dados['quantidade']);
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }

    // 5. Excluir produto
    public static function excluir($id) {
        $pdo = Database::conectar();
        
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }
}