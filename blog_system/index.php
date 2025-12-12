<?php include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/db.php';

$posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
?>

<?php foreach($posts as $p): ?>
<div class="post">
    <h2><?= htmlspecialchars($p['title']) ?></h2>
    <p><?= nl2br(substr($p['content'],0,200)) ?>...</p>
    <a href="post.php?id=<?= $p['id'] ?>">Leer más</a>
</div>
<?php endforeach; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
