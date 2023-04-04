<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM indicados WHERE categoria_id = ?');
$stmt->execute([$_GET['id']]);
$indicados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pontuacoes = $_POST['pontuacoes'];

  foreach ($pontuacoes as $indicado_id => $pontuacao) {
    $stmt = $pdo->prepare('UPDATE indicados SET pontuacao = pontuacao + ? WHERE id = ?');
    $stmt->execute([$pontuacao, $indicado_id]);
  }

  header('Location: index.php');
  exit();
}
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
    <link rel="stylesheet" type="text/css" href="css/votacao.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="votacao" />
    <div class="votacao screen">
      <div class="background-24HFUk"></div>

      <img class="rectangle-1-24HFUk" src="img/rectangle-1.png" alt="Rectangle 1" />


      
  <form class="frame-11-24HFUk" method="POST">
    <?php foreach ($indicados as $indicado): ?>
      <div class="alert alert-dark" >
        <h2 style="font-family: var(--font-family-poppins);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 500;"><?= $indicado['nome'] ?></h2> </br>

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="100" id="pontuacao-50-<?= $indicado['id'] ?>" unchecked_value="0">
        <label style="font-family: var(--font-family-poppins);
  font-size: 15px;
  font-style: normal;
  font-weight: 400;" for="pontuacao-50-<?= $indicado['id'] ?>">100</label>&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="60" id="pontuacao-40-<?= $indicado['id'] ?>" unchecked_value="0">
        <label style="font-family: var(--font-family-poppins);
  font-size: 15px;
  font-style: normal;
  font-weight: 400;"for="pontuacao-40-<?= $indicado['id'] ?>">60</label>&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="40" id="pontuacao-30-<?= $indicado['id'] ?>" unchecked_value="0">
        <label style="font-family: var(--font-family-poppins);
  font-size: 15px;
  font-style: normal;
  font-weight: 400;"for="pontuacao-30-<?= $indicado['id'] ?>">40</label>&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="20" id="pontuacao-20-<?= $indicado['id'] ?>"unchecked_value="0">
        <label style="font-family: var(--font-family-poppins);
  font-size: 15px;
  font-style: normal;
  font-weight: 400;"for="pontuacao-20-<?= $indicado['id'] ?>">20</label>&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="-30" id="pontuacao-10-<?= $indicado['id'] ?>"unchecked_value="0">
        <label style="font-family: var(--font-family-poppins);
  font-size: 15px;
  font-style: normal;
  font-weight: 400;"for="pontuacao-10-<?= $indicado['id'] ?>">-30</label>&nbsp;&nbsp;
      </div>
    <?php endforeach; ?>


<audio id="pontuacao-sound">
  <source src="final.mp3" type="audio/mpeg">
</audio>

<audio id="pontuacao-sound2">
  <source src="toque.mp3" type="audio/mpeg">
</audio>

<button class="enviar-pontuao-BbxyAG enviar-pontuao" type="submit" onclick="playSound()">Enviar pontuações</button>
  </form>


      <form class="boto-inicio-24HFUk" method="GET" action="index.php">
    <button class="title-TTcxn4" type="submit">Voltar para o início</button>
  </form>
      

      <img class="caminhao-24HFUk" src="img/caminhao@2x.png" alt="caminhao" />

      


      <div class="enviar-pontuao-24HFUk enviar-pontuao">
        
      </div>





    </div>
  </body>

  <script>
  // Seleciona o elemento de áudio
  var audio = document.getElementById("pontuacao-sound");

  // Adiciona um listener para quando o formulário for enviado
  document.querySelector("form").addEventListener("submit", function() {
    // Toca o som
    audio.play();

    // Exibe o alerta
    alert("Pontuação registrada!");

    // Redireciona para a página inicial
    window.location.href = "index.php";
  });
</script>

  <script>
    function playSound() {
      document.getElementById('pontuacao-sound').play();
    }
  </script>

<script>
    function playSound2() {
      document.getElementById('pontuacao-sound2').play();
    }
  </script>
</html>

