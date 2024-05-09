<?php

$newUsers = [
    [
        'id' => '',
        'username' => 'Alfio',
        'email' => 'alfio@alfio.com'
    ],
    [
        'id' => '',
        'username' => 'Rick',
        'email' => 'rick@rick.com'
    ],
    [
        'id' => '',
        'username' => 'Manuel',
        'email' => 'manuel@manuel.com'
    ],
];

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

$file_name = 'C:/xampp/mysql/data/ifoa_filesystem/users.csv';
$file_handle = fopen($file_name, 'a');

foreach ($newUsers as $user => $row) {
    fputcsv($file_handle, $row);
}
fclose($file_handle);
echo 'utenti aggiunti correttamente!';