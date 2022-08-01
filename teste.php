<?php

    require_once 'vendor/autoload.php';

    use App\Models\Connect;

    header('content-type: application/json');

    $conn = new Connect;
    $connPdo = $conn->getConnection();

    $sql = 'SELECT * FROM usuarios';
    $stmt = $connPdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        var_dump( $stmt->fetchAll(\PDO::FETCH_ASSOC));
    } else {
        throw new \Exception("Nenhum usuário encontrado!");
    }