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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="shortcut icon" type="image/png" href="img/caminhao-maior-1@2x.png" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/resultados.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="resultados" />
    <div class="resultados screen">
      <div class="background-xGv8qE"></div>
      <div class="rectangle-1-xGv8qE"></div>
      <h1 style="font-size:24px; font-weight:bold" class="title-xGv8qE poppins-medium-log-cabin-24px">Filtro</h1>
      
     
      <img class="caminhao-xGv8qE" src="img/caminhao@2x.png" alt="caminhao" />
    
      <div class="top3-xGv8qE">
        <div class="rectangle-5-iKB75m"></div>
        <div class="ellipse-8-iKB75m"></div>
      </div>

      <form method="GET" action="resultados.php">
    <label for="categoria">Filtrar por categoria:</label>
    <select class="frame-3-xGv8qE" name="categoria" id="categoria">
      <option style="font-size:24px; font-weight:bold" value="">Todas as categorias</option>
      <?php foreach ($categorias as $categoria): ?>
        <option style="font-size:24px; font-weight:bold" value="<?= $categoria['id'] ?>" <?= (isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id']) ? 'selected' : '' ?>><?= $categoria['nome'] ?></option>
      <?php endforeach; ?>
    </select>
    <button  class="boto-inicio-xGv8qE2"type="submit">Filtrar</button>
  </form>

   <form method="POST" action="logout.php">
    <button style="font-size:24px; font-weight:bold" class="boto-logout-xGv8qE" type="submit">Logout</button>
  </form>

  <form method="GET" action="index.php">
    <button style="font-size:24px; font-weight:bold" class="boto-inicio-xGv8qE" type="submit">Voltar para o início</button>
  </form>

  <ol class="podio">
    <?php foreach ($podio as $posicao => $indicado): ?>
      <li>
        <?php if ($posicao == 0): ?>
          <strong><?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?></strong>
        <?php elseif ($posicao == 1): ?>
          <em><?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?></em>
        <?php else: ?>
          <?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>

  
  <ul  class="lista">
    <?php foreach ($lista as $indicado): ?>
      <li style="font-size:16px; font-weight:bold" class="alert alert-warning">
        <?= $indicado['nome'] ?> - <?= $indicado['pontuacao'] ?>
      </li>
    <?php endforeach; ?>
  </ul>




      <div class="top2-xGv8qE">
        <div class="rectangle-3-wt65nu"></div>
        <div class="ellipse-6-wt65nu"></div>
      </div>
      <div class="top1-xGv8qE">
        <div class="rectangle-2-L2FvmN"></div>
        <div class="ellipse-5-L2FvmN"></div>
      </div>
    </div>
  </body>
</html>


  

  
