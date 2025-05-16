<?php

include_once __DIR__ . '/../db/database.php';


class UserController
{
    private $conn;
    public $errorMsg;

    public function __construct()
    {
        $objDb = new Database;
        $this->conn = $objDb->connect();
    }

    public function getAllClient()
    {
        if (!isset($_SESSION["id_usuario"])) {
            $errorMsg = 'Acesso negado. Usuário não autenticado.';
            return false;
        }
        try {
            $sql = "SELECT * FROM usuarios";
            $db = $this->conn->prepare($sql);
            $db->execute();
            $users = $db->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            return false;
        }
    }

    public function getUserById($id)
    {
        try {
            // Prepara e executa a consulta
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Retorna o usuário encontrado, ou `false` se não houver resultado
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: false;
        } catch (Exception $e) {
            error_log("Erro ao buscar usuário: " . $e->getMessage());
            return false;
        }
    }

    public function updateUser($id, $nome, $email)
    {
        try {
            // Prepara e executa a atualização
            $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);

            // Retorna `true` se a atualização foi bem-sucedida, `false` caso contrário
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao atualizar usuário: " . $e->getMessage());
            return false;
        }
    }
    public function deleteUser($id)
    {
        try {
            // Prepara e executa a atualização
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao atualizar usuário: " . $e->getMessage());
            return false;
        }
    }

    public function createUser($nome, $email, $phone, $password, $confirmPassword, $formType, $counter)
{
    try {
        // Verifica se o número de usuários é menor que 4
        $sqlCount = "SELECT COUNT(*) FROM usuarios";
        $stmtCount = $this->conn->prepare($sqlCount);
        $stmtCount->execute();
        $totalUsers = $stmtCount->fetchColumn();

        // Se for um dos 4 primeiros cadastros, usa uma senha fixa
        if ($totalUsers < 4) {
            $fixedPassword = 'senha123'; // Senha fixa que será criptografada
            $hashedPassword = password_hash($fixedPassword, PASSWORD_BCRYPT);
        } else {
            // Para outros cadastros, usa a senha fornecida pelo usuário
            if ($password !== $confirmPassword) {
                $this->errorMsg = 'As senhas não coincidem.';
                return false;
            }
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        }

        // Prepara a consulta SQL para inserir o novo usuário
        $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $phone);
        $stmt->bindParam(':senha', $hashedPassword);

        // Executa a consulta e verifica se foi bem-sucedida
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log("Erro ao criar usuário: " . $e->getMessage());
        return false;
    }
}

    public function getUsersByPage($offset, $limit) {
        $sql = "SELECT * FROM usuarios ORDER BY id ASC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}