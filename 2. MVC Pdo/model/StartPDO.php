<?php

    define('DB_ADDRESS', '127.0.0.1');
    define('DB_PORT', '3306');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '4G@tE#D6P%km');
    define('DB_NAME', 'm54db');

    $dsn = sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_ADDRESS, DB_NAME);

    // $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    // ]);

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($pdo)
            echo "Connect to DB Successfully!\n";

        // Create Table
        // $sql = "CREATE TABLE sample(name VARCHAR(255) NOT NULL);";

        // $result = $pdo->exec($sql);

        // Insert
        // $sql = "INSERT INTO sample(name) VALUES('Ehsan')";
        // $sql = "INSERT INTO users VALUES(NULL, 'Ehsan', '1@gmail.com', '1234', 'admin')";
        // $pdo->exec($sql);
        // $last_id = $pdo->lastInsertId();
        // echo $last_id;

        // $sql = 'INSERT INTO users(name, email, password, type) 
        //             VALUES(?, ?, ?, ?)';

        // $statement = $pdo->prepare($sql);
        // $statement->execute(['Asghar', 'asgharmail8@gmail.com', '1234', 'guest']);

        // echo $pdo->lastInsertId();

        $sql = "SELECT * From users";
        $stm = $pdo->query($sql);

        // $row1 = $stm->fetch();
        // $row2 = $stm->fetch(PDO::FETCH_ASSOC);

        // var_dump($row1);
        // var_dump($row2);

        $rows = $stm->fetchAll();

        var_dump($rows);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }