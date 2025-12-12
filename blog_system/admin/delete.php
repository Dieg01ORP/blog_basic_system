<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

require __DIR__ . '/../includes/db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM posts WHERE id=?")->execute([$id]);

header("Location: index.php");
