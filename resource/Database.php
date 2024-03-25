<?php

declare(strict_types=1);

$username = 'admin_noapp';
$dsn = 'mysql:host=localhost; dbname=noapp';
$password = 'xxx';

try {
    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo '--> Połączono z bazą danych noapp';
} catch (PDOException $ex) {
    echo '--> Błąd połącznia z bazą danych: ' . $ex->getMessage();
}
