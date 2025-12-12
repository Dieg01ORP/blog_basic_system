<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

require __DIR__ . '/../includes/db.php';
$posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
?>
<link rel="stylesheet" href="../assets/admin.css">

<h1 style="text-align:center;">Administración de Posts</h1>

<a class="btn" href="create.php">Nuevo artículo</a>

<table>
<tr><th>ID</th><th>Título</th><th>Fecha</th><th>Acciones</th></tr>
<?php foreach($posts as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= htmlspecialchars($p['title']) ?></td>
<td><?= $p['created_at'] ?></td>
<td>
<a class="btn" href="edit.php?id=<?= $p['id'] ?>">Editar</a>
<a class="btn" href="delete.php?id=<?= $p['id'] ?>">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<a href="logout.php">Cerrar sesión</a>
