<?php
$host = 'localhost';
$db = 'ifoa_filesystem';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);
try {
    $sql = "LOAD DATA INFILE 'users.csv'
    IGNORE
    INTO TABLE users
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo 'Importazione completata con successo';
} catch (PDOException $e) {
    echo 'Errore' . $e->getMessage() . '';
}
