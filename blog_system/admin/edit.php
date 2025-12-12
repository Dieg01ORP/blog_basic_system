<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

require __DIR__ . '/../includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if($_POST){
    $pdo->prepare("UPDATE posts SET title=?, content=? WHERE id=?")
        ->execute([$_POST['title'], $_POST['content'], $id]);
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="../assets/admin.css">

<div class="card">
<h2>Editar Artículo</h2>

<form method="POST">
<input name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
<textarea name="content" rows="8" required><?= htmlspecialchars($post['content']) ?></textarea>
<button>Actualizar</button>
</form>
</div>
