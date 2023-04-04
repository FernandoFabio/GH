<?php
session_start();

if (isset($_SESSION['usuario'])) {
  header('Location: index.php');
  exit();
}

$erro = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

  $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
  $stmt->execute([$_POST['email']]);
  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($usuario && password_verify($_POST['senha'], $usuario['senha'])) {
    $_SESSION['usuario'] = [
      'id' => $usuario['id'],
      'nome' => $usuario['nome'],
      'email' => $usuario['email']
    ];

    header('Location: index.php');
    exit();
  } else {
    $erro = 'Email ou senha incorretos';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <?php if ($erro): ?>
    <p><?= $erro ?></p>
  <?php endif; ?>

  <form method="POST">
    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>
    </div>

    <button type="submit">Entrar</button>
  </form>
</body>
</html>
