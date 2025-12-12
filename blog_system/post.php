<?php
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/db.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$p = $stmt->fetch();
?>

<div class="post">
    <h2><?= htmlspecialchars($p['title']) ?></h2>
    <p><?= nl2br($p['content']) ?></p>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
