<?php
class User {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $data_criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create(): bool {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, data_criacao=:data_criacao";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(string: strip_tags(string: $this->nome));
        $this->email = htmlspecialchars(string: strip_tags(string: $this->email));
        $this->data_criacao = htmlspecialchars(string: strip_tags(string: $this->data_criacao));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":data_criacao", $this->data_criacao);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll(): mixed {
        $query = " SELECT id, nome, email, data_criacao FROM " . $this->table_name . " ORDER BY data_criacao DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update(): bool {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(string: strip_tags(string: $this->nome));
        $this->email = htmlspecialchars(string: strip_tags(string: $this->email));
        $this->id = htmlspecialchars(string: strip_tags(string: $this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete(): bool {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}