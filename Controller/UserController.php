<?php
require_once 'Models/User.php';
require_once 'Config/Database.php';

class UserController {
    private $db;
    private $user;


    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User(db: $this->db);
    }

    public function create($nome, $email): string {
        if (empty($nome) || empty($email)) {
            return "Nome e email são obrigatórios!";
        }

        $this->user->nome = $nome;
        $this->user->email = $email;
        $this->user->data_criacao = date(format: 'Y-m-d H:i:s');

        if ($this->user->create()) {
            return "Usuário criado com sucesso!";
        } else {
            return "Erro ao criar usuário.";
        }
    }

    public function readAll(): mixed {
        return $this->user->readAll();
    }

    public function update($id, $nome, $email): string {
        if (empty($id) || empty($nome) || empty($email)) {
            return "ID, nome e email são obrigatórios!";
        }

        $this->user->id = $id;
        $this->user->nome = $nome;
        $this->user->email = $email;

        if ($this->user->update()) {
            return "Usuário atualizado com sucesso!";
        } else {
            return "Erro ao atualizar usuário.";
        }
    }

    public function delete($id): string {
        if (empty($id)) {
            return "ID é obrigatório!";
        }

        $this->user->id = $id;

        if ($this->user->delete()) {
            return "Usuário excluído com sucesso!";
        } else {
            return "Erro ao excluir usuário.";
        }
    }
}