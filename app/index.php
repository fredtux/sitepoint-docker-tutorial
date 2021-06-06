<?php

$host = 'mysql';
$db = 'dev';
$user = 'webdev';
$pass = 'pass';

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = 'DROP TABLE IF EXISTS test';
$pdo->prepare($sql)->execute();

$sql = 'CREATE TABLE test (a VARCHAR(255))';
$pdo->prepare($sql)->execute();

$sql = 'TRUNCATE TABLE test';
$pdo->prepare($sql)->execute();

$sql = 'INSERT INTO test VALUES ("Welcome to your docker dev environment! :)")';
$pdo->prepare($sql)->execute();

$sql = 'SELECT a FROM test LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$msg = $stmt->fetch();

echo $msg['a'];
echo '<br>';

$sql = 'DROP TABLE IF EXISTS test';
$pdo->prepare($sql)->execute();

phpinfo();
