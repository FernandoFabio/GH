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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="caminhao.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="index" />
    <div class="index screen">
      <div class="background-IO3Fu5"></div>
      <div class="rectangle-1-IO3Fu5"></div>
     
    
      <ul style="background-color: transparent;
    height: 585px;
    left: calc(50.00% - 490px);
    position: absolute;
    top: calc(50.00% - 222px);
    width: 997px;"class="frame-10-IO3Fu5">
    <?php foreach ($categorias as $categoria): ?>
      <li style="font-size:20px; font-weight: bold;" class="list-group-item">
        <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

      <img class="caminhao-IO3Fu5" src="img/caminhao@4x.png" alt="caminhao" />

      <form class="boto-logout-IO3Fu5" method="POST" action="logout.php">
    <button class="title-NqMVGR poppins-medium-log-cabin-24px" type="submit">Logout</button>
  </form>

  <form class="ver-resultado-IO3Fu5 ver-resultado" method="GET" action="resultados.php">
    <button style="   left: calc(50.00% - 149px);
    letter-spacing: 0.00px;
    line-height: normal;
    text-align: center;
    top: calc(50.00% - 23px);
    background-color: #f9bd23;
    border-radius: 30px;
    height: 51px;
    width: 298px;"class="ver-resultado-Uxxozp ver-resultado poppins-medium-log-cabin-24px" type="submit">Ver resultados</button>
  </form>

  <form class="adicionar-indicado-IO3Fu5 adicionar-indicado" method="GET" action="adicionar.php">
    <button class="adicionar-indicado-bjxMeM adicionar-indicado poppins-medium-log-cabin-24px" type="submit">Adicionar um indicado</button>
  </form>

    </div>
  </body>
</html>


