<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

require __DIR__ . '/../includes/db.php';

if($_POST){
    $stmt = $pdo->prepare("INSERT INTO posts(title,content,created_at) VALUES(?,?,datetime('now'))");
    $stmt->execute([$_POST['title'], $_POST['content']]);
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="../assets/admin.css">

<div class="card">
<h2>Nuevo Artículo</h2>

<form method="POST">
<input name="title" placeholder="Título" required>
<textarea name="content" rows="8" placeholder="Contenido..." required></textarea>
<button>Guardar</button>
</form>
</div>
