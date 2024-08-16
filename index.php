<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM categorias');
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>





  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="index" />
    <div class="index screen">
      <div class="background-IO3Fu5"></div>
      <div class="rectangle-1-IO3Fu5"></div>
     


      <ul class="frame-10-IO3Fu5 ">
    <?php foreach ($categorias as $categoria): ?>
      <li style="font-size:20px;font-Weight:bold" class="alert alert-primary">
        <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

  <form method="POST" action="logout.php">
    <button style="cursor:pointer;font-size:20px;font-Weight:bold" class="boto-logout-IO3Fu5" type="submit">Logout</button>
  </form>

  <form method="GET" action="resultados.php">
    <button style="cursor:pointer;font-size:20px;font-Weight:bold" class="ver-resultado-IO3Fu5 ver-resultado" type="submit">Ver resultados</button>
  </form>

  <form method="GET" action="adicionar.php">
    <button style="cursor:pointer;font-size:20px;font-Weight:bold" class="adicionar-indicado-IO3Fu5 adicionar-indicado" type="submit">Adicionar indicados</button>
  </form>



      <img class="caminhao-IO3Fu5" src="img/caminhao@4x.png" alt="caminhao" />
    </div>






</body>
</html>