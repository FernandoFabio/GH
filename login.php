<?php
session_start();

if (isset($_SESSION['usuario'])) {
  header('Location: index.php');
  exit();
}

$erro = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

  $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE nome = ?');
  $stmt->execute([$_POST['nome']]);
  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($usuario && $_POST['senha'] === $usuario['senha']) {
    $_SESSION['usuario'] = [
      'id' => $usuario['id'],
      'nome' => $usuario['nome']
    ];

    header('Location: index.php');
    exit();
  } else {
    $erro = 'Nome de usuário ou senha incorretos';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="caminhao.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="login" />
    <div class="login screen">
      <div class="background-b8DrbD"></div>
      <div class="rectangle-1-b8DrbD"></div>

      <form method="POST">
      

      <input style="font-size: 40px;"class=" frame-4-b8DrbD" type="password" id="senha" name="senha" required>
    
      <input style="font-size: 40px;"class="frame-3-b8DrbD" type="text" id="nome" name="nome" required>
    
       
        <button style="font-size: 25px;" style="cursor:pointer"class="frame-5-b8DrbD" type="submit">Entrar</button>

      </form>
      <?php if ($erro): ?>
    <p><?= $erro ?></p>
  <?php endif; ?>
      
      <img class="ellipse-1-b8DrbD" src="img/segundo.png" />
      <img class="ellipse-3-b8DrbD" src="img/terceiro.png" />
      <img class="ellipse-2-b8DrbD" src="img/Primeiro.png" />
      <img class="line-1-b8DrbD" src="img/line-1@2x.png" alt="Line 1" />
      <img class="line-2-b8DrbD" src="img/line-1@2x.png" alt="Line 2" />
      <img class="frame-9-b8DrbD" src="img/frame-9@4x.png" alt="Frame 9" />
    </div>
  </body>
</html>
