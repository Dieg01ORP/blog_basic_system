<?php
$dbFile = __DIR__ . '/database.sqlite';

if (file_exists($dbFile)) {
    die("La base de datos ya existe.");
}

$db = new PDO("sqlite:" . $dbFile);

$db->exec("
CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT,
    password TEXT
);
CREATE TABLE posts(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT,
    content TEXT,
    created_at TEXT
);
");

$pass = password_hash("admin123", PASSWORD_DEFAULT);
$db->prepare("INSERT INTO users(username, password) VALUES('admin', ?)")->execute([$pass]);

echo "Base de datos creada correctamente. Usuario admin / admin123";
