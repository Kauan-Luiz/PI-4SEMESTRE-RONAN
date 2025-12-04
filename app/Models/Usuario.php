<?php 
namespace App\Models;

use PDO;
use App\Core\Database;
use PDOException;

class Usuario {

    // --- BUSCAR TODOS ---
    public static function buscarTodos() {
        $pdo = Database::conectar();
        $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- BUSCAR POR EMAIL ---
    public static function buscarPorEmail($email) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // --- BUSCAR POR ID ---
    public static function buscarPorId($id) {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // --- EXCLUIR ---
    public static function excluir($id) {
        try {
            $pdo = Database::conectar();
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            die("Erro ao excluir: " . $e->getMessage());
        }
    }

    // --- SALVAR (INSERT COMPLETO) ---
    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();
            
            // Criptografa a senha
            $senha_criptografada = password_hash($dados['senha'], PASSWORD_DEFAULT);

            // SQL com TODOS os campos da sua imagem
            $sql = "INSERT INTO usuarios (
                        nome, cpf, data_nascimento, celular, 
                        cep, rua, numero, complemento, bairro, cidade, estado, 
                        email, nivel_de_acesso, senha
                    ) VALUES (
                        :nome, :cpf, :data_nascimento, :celular, 
                        :cep, :rua, :numero, :complemento, :bairro, :cidade, :estado, 
                        :email, :nivel, :senha
                    )";

            $stmt = $pdo->prepare($sql);
            
            // Binds (Dados Pessoais)
            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':cpf', $dados['cpf'] ?? null);
            $stmt->bindValue(':data_nascimento', $dados['data_nascimento'] ?? null);
            $stmt->bindValue(':celular', $dados['celular'] ?? null);

            // Binds (Endereço)
            $stmt->bindValue(':cep', $dados['cep'] ?? null);
            $stmt->bindValue(':rua', $dados['rua'] ?? null);
            $stmt->bindValue(':numero', $dados['numero'] ?? null);
            $stmt->bindValue(':complemento', $dados['complemento'] ?? null);
            $stmt->bindValue(':bairro', $dados['bairro'] ?? null);
            $stmt->bindValue(':cidade', $dados['cidade'] ?? null);
            $stmt->bindValue(':estado', $dados['estado'] ?? null);

            // Binds (Conta)
            $stmt->bindValue(':email', $dados['email']);
            $stmt->bindValue(':nivel', $dados['nivel_de_acesso']);
            $stmt->bindValue(':senha', $senha_criptografada);

            $stmt->execute();
            return $pdo->lastInsertId();

        } catch (PDOException $e) {
            die("Erro ao Inserir Usuário: " . $e->getMessage());
        }
    }

    // --- ATUALIZAR (UPDATE COMPLETO) ---
    public static function atualizar($id, $dados) {
        try {
            $pdo = Database::conectar();
            
            $sql = "UPDATE usuarios SET 
                        nome = :nome, 
                        cpf = :cpf,
                        data_nascimento = :data_nascimento,
                        celular = :celular,
                        cep = :cep,
                        rua = :rua,
                        numero = :numero,
                        complemento = :complemento,
                        bairro = :bairro,
                        cidade = :cidade,
                        estado = :estado,
                        email = :email, 
                        nivel_de_acesso = :nivel";
            
            // Só atualiza a senha se foi digitada
            if (!empty($dados['senha'])) {
                $sql .= ", senha = :senha";
            }
            
            $sql .= " WHERE id_usuario = :id";

            $stmt = $pdo->prepare($sql);
            
            // Binds (Mesmos do Salvar)
            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':cpf', $dados['cpf'] ?? null);
            $stmt->bindValue(':data_nascimento', $dados['data_nascimento'] ?? null);
            $stmt->bindValue(':celular', $dados['celular'] ?? null);
            
            $stmt->bindValue(':cep', $dados['cep'] ?? null);
            $stmt->bindValue(':rua', $dados['rua'] ?? null);
            $stmt->bindValue(':numero', $dados['numero'] ?? null);
            $stmt->bindValue(':complemento', $dados['complemento'] ?? null);
            $stmt->bindValue(':bairro', $dados['bairro'] ?? null);
            $stmt->bindValue(':cidade', $dados['cidade'] ?? null);
            $stmt->bindValue(':estado', $dados['estado'] ?? null);
            
            $stmt->bindValue(':email', $dados['email']);
            $stmt->bindValue(':nivel', $dados['nivel_de_acesso']);
            $stmt->bindValue(':id', $id);

            if (!empty($dados['senha'])) {
                $stmt->bindValue(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));
            }

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die("Erro ao atualizar: " . $e->getMessage());
        }
    }
}