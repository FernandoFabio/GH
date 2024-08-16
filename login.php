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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/caminhao-maior-1@2x.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="login" />
    <div class="login screen">
      <div class="background-b8DrbD"></div>
      <div class="rectangle-1-b8DrbD"></div>
   
   
  <?php if ($erro): ?>
    <p><?= $erro ?></p>
  <?php endif; ?>

  <form method="POST">
    <div>
      <label for="nome">Nome de usuário:</label>
      <input style="font-size:24px; font-weight:bold"class="frame-3-b8DrbD" type="text" id="nome" name="nome" required>
    </div>

    <div>
      <label for="senha">Senha:</label>
      <input style="font-size:24px; font-weight:bold" class="frame-4-b8DrbD" type="password" id="senha" name="senha" required>
    </div>

    <button style="font-size:24px; font-weight:bold;"class="frame-5-b8DrbD" type="submit">Login</button>
  </form>

  <img style="background-color: transparent;
    height: 273px;
    left: calc(50.00% - 124px);
    object-fit: cover;
    position: absolute;
    top: calc(50.00% + 120px);
    width: 251px;z-index:2;" src="img/primeiro.png" alt="Line 1" />
  <img style="background-color: transparent;
    height: 273px;
    left: calc(50.00% - 274px);
    object-fit: cover;
    position: absolute;
    top: calc(50.00% + 120px);
    width: 251px;" src="img/segundo.png" alt="Line 1" />
  <img style="background-color: transparent;
    height: 273px;
    left: calc(50.00% - -52px);
    object-fit: cover;
    position: absolute;
    top: calc(50.00% + 120px);
    width: 251px;" src="img/terceiro.png" alt="Line 1" />
     
      
      <img class="frame-9-b8DrbD" src="img/frame-9@4x.png" alt="Frame 9" />
    </div>
  </body>
</html>

