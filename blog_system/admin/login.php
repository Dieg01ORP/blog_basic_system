<?php
session_start();
require __DIR__ . '/../includes/db.php';

if ($_POST) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$u]);
    $user = $stmt->fetch();

    if ($user && password_verify($p, $user['password'])) {
        $_SESSION['admin'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Credenciales inválidas";
    }
}
?>
<link rel="stylesheet" href="../assets/admin.css">

<div class="card">
<h2>Login Admin</h2>

<?php if(!empty($error)): ?>
<p style="color:#f88"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
<input name="username" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button>Entrar</button>
</form>
</div>
