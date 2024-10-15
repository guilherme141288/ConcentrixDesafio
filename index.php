<?php
require_once 'Controller/UserController.php';

$controller = new UserController();

$nome = 'pedro';
$email = 'pedro@gmail.com';
$id = 34;


// criação de um novo usuário
echo $controller->create(nome: $nome, email: $email);


// if alguma condição

// listagem de todos os usuários
$usuarios = $controller->readAll();
foreach ($usuarios as $usuario) {
    echo $usuario['nome'] . ' - ' . $usuario['email'] . PHP_EOL ;
}

// else 
   

// if alguma condição

// Atualizar um usuário
echo $controller->update(id: 1, nome: 'João Silva Atualizado', email: 'joao_atualizado@exemplo.com');

// else 
   

// if alguma condição

// Deletar um usuário
echo $controller->delete(id: $id);

//else


