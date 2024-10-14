<?php
try {
    // Cria uma nova conexão PDO
    $pdo = new PDO(dsn: 'mysql:localhost;dbname=ConcDB;', username: 'Guilherme', password: '12345aB');
    $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);

    // Executa o comando para listar as tabelas
    $stmt = $pdo->query("SHOW TABLES");

    // Exibe o resultado
    while ($row = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
        echo $row['Usuarios'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}