<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

// Verifica se o filtro de categoria foi selecionado
if (isset($_GET['categoria'])) {
  $stmt = $pdo->prepare('SELECT * FROM indicados WHERE categoria_id = :categoria ORDER BY pontuacao DESC');
  $stmt->bindValue(':categoria', $_GET['categoria']);
} else {
  $stmt = $pdo->prepare('SELECT * FROM indicados ORDER BY pontuacao DESC');
}

$stmt->execute();
$indicados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT * FROM categorias');
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Separa os três itens com mais pontuação
$podio = array_slice($indicados, 0, 3);
$lista = array_slice($indicados, 3);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="caminhao.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/resultados.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="resultados" />
    <div class="resultados screen">
      <div class="background-xGv8qE"></div>
      <div class="rectangle-1-xGv8qE"></div>
      <h1 class="title-xGv8qE poppins-medium-log-cabin-24px">Filtro</h1>
      <div class="frame-3-xGv8qE"></div>

      <form class="boto-inicio-xGv8qE method="GET" action="index.php">
    <button style="background-color: transparent;
    height: auto;
    left: calc(50.00% - 148px);
    letter-spacing: 0.00px;
    line-height: normal;
    mix-blend-mode: normal;
    position: absolute;
    text-align: center;
    top: calc(50.00% - 24px);
    width: auto;
    width: 298px;
    height: 51px;
    border-radius: 30px;"class="inicio-CC1LTx poppins-medium-log-cabin-24px"  type="submit">Voltar para o início</button>
  </form>

  <form class="boto-logout-xGv8qE" method="POST" action="logout.php">
    <button class="logout-uFBVxc poppins-medium-log-cabin-24px" type="submit">Logout</button>
  </form>

  <form method="GET" action="resultados.php">
    
    <select style="font-family: var(--font-family-poppins);
  font-size: 18px;
  font-style: normal;
  font-weight: 500;"class="frame-3-xGv8qE" name="categoria" id="categoria">
      <option value="">Todas as categorias</option>
      <?php foreach ($categorias as $categoria): ?>
        <option value="<?= $categoria['id'] ?>" <?= (isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id']) ? 'selected' : '' ?>><?= $categoria['nome'] ?></option>
      <?php endforeach; ?>
    </select>
    <button style="font-family: var(--font-family-poppins);
  font-size: 18px;
  font-style: normal;
  font-weight: 500;"class=" filtro" type="submit">Filtrar</button>
  </form>

  <h2>Lista</h2>
  <ul class="lista flex-container">
    <?php foreach ($lista as $indicado): ?>
      <li class="alert alert-primary"style="font-family: var(--font-family-poppins);
  font-size: 18px;
  font-style: normal;
  font-weight: 500;">
        <?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?>
      </li>
    <?php endforeach; ?>
  </ul>


  <ol>
    <?php foreach ($podio as $posicao => $indicado): ?>
      <li style="font-family: var(--font-family-poppins);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 500;"class="lista2">
        <?php if ($posicao == 0): ?>
          <strong   ><?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?></strong>
        <?php elseif ($posicao == 1): ?>
          <em><?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?></em>
        <?php else: ?>
          <?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>

      <img class="caminhao-xGv8qE" src="img/caminhao@2x.png" alt="caminhao" />
     
      <div class="top3-xGv8qE">
        <div class="rectangle-5-iKB75m"></div>
        <img  style="height: 172px; left: calc(50.00% - 289px);  mix-blend-mode: normal; position: absolute; top: calc(50.00% - 81px);width: 358px;"src="img/terceiro.png">
      </div>

      <div class="top2-xGv8qE">
        <div class="rectangle-3-wt65nu"></div>
    <img style="    height: 186px;
    left: calc(50.00% - 326px);
    mix-blend-mode: normal;
    position: absolute;
    top: calc(50.00% - 90px);
    width: 381px;" src="img/segundo.png">
      </div>

      <div class="top1-xGv8qE">
        <div class="rectangle-2-L2FvmN"> </div>
      <img style="height: 214px;
    left: calc(50.00% - 393px);
    mix-blend-mode: normal;
    position: absolute;
    top: calc(50.00% - 102px);
    width: 435px;
    width: 441px;" src="img/primeiro.png">
      </div>
      
    </div>
  </body>
</html>





  

