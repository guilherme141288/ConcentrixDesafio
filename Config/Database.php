<?php


class Database {
    private static $connection = null;

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            try {
                $dsn = 'mysql:host=localhost;dbname=ConcDB;';
                $username = 'Guilherme';
                $password = '12345aB';
                self::$connection = new PDO(dsn: $dsn, username: $username, password: $password);
                self::$connection->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Exibir um erro ou logar a mensagem de erro
                die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}