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
    $stmt = $pdo->prepare('SELECT id, username, email FROM users');
    $stmt->execute();

    $csv_file = fopen('C:/xampp/mysql/data/ifoa_filesystem/users.csv', 'w');
    fputcsv($csv_file, array('id', 'username', 'email'));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($csv_file, $row);
    }
    fclose($csv_file);
    echo 'esportazione completata con successo';
} catch (PDOException $e) {
    echo 'Errore' . $e->getMessage() . '';
}
