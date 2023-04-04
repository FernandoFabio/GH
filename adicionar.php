<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $categoria = $_POST['categoria'];

  $stmt = $pdo->prepare('INSERT INTO indicados (nome, categoria_id) VALUES (:nome, :categoria)');
  $stmt->bindValue(':nome', $nome);
  $stmt->bindValue(':categoria', $categoria);
  $stmt->execute();

  header('Location: index.php');
  exit();
}

$stmt = $pdo->query('SELECT * FROM categorias');
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="caminhao.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/indicados.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="indicados" />
    <div class="indicados screen">
      <div class="background-aj9o9J"></div>
      <div class="rectangle-1-aj9o9J"></div>
      <h1 class="title-aj9o9J poppins-medium-log-cabin-24px">Nome</h1>
      <div class="categoria-aj9o9J categoria poppins-medium-log-cabin-24px">Categoria</div>
      
      

      <form class="boto-inicio-aj9o9J" method="GET" action="index.php">
    <button class="inicio-CQU0qM poppins-medium-log-cabin-24px" type="submit">Voltar para o início</button>
  </form>

  <form method="POST">
    <label>
     
      <input style="font-family: var(--font-family-poppins);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 500;"class="nome-aj9o9J" type="text" name="nome">
    </label>
    <br>
    <label>
      
      <select style="font-family: var(--font-family-poppins);
  font-size: 18px;
  font-style: normal;
  font-weight: 500;"class="categoria-QNCZni categoria" name="categoria">
        <?php foreach ($categorias as $categoria): ?>
          <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <br>
    <button style="font-family: var(--font-family-poppins);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 500;" class="boto-adicionar-aj9o9J" type="submit">Adicionar</button>
  </form>

      
      <img class="ellipse-4-aj9o9J" src="img/ellipse-4@2x.png" alt="Ellipse 4" />
     
    </div>
  </body>
</html>







