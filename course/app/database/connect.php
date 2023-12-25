<?php 

    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'polyglot';
    $db_user = 'root';
    $db_pass = '';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    try {
        $pdo = new PDO(
            "$driver:host=$host;dbname=$db_name;",
            $db_user, $db_pass, $options
        );
    } catch (PDOException $i) {
        die("Ошибка подключения к базе данных");
    }
?>