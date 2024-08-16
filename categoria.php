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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/caminhao-maior-1@2x.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/votacao.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
  </head>
  <body style="margin: 0; background: #ebe1e1">
    <input type="hidden" id="anPageName" name="page" value="votacao" />
    <div class="votacao screen">
      <div class="background-24HFUk"></div>
      <img class="rectangle-1-24HFUk" src="img/rectangle-1.png" alt="Rectangle 1" />
      
      <img class="caminhao-24HFUk" src="img/caminhao@2x.png" alt="caminhao" />
      
      


      <form class="lista" method="POST">
    <?php foreach ($indicados as $indicado): ?>
      <div class="alert alert-warning ">  
        <h2 style="font-size:24px; font-weight:bold"><?= $indicado['nome'] ?></h2>

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="100" id="pontuacao-50-<?= $indicado['id'] ?>" unchecked_value>
        <label for="pontuacao-50-<?= $indicado['id'] ?>">100</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="60" id="pontuacao-40-<?= $indicado['id'] ?>"unchecked_value>
        <label for="pontuacao-40-<?= $indicado['id'] ?>">60</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="40" id="pontuacao-30-<?= $indicado['id'] ?>"unchecked_value>
        <label for="pontuacao-30-<?= $indicado['id'] ?>">40</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="20" id="pontuacao-20-<?= $indicado['id'] ?>"unchecked_value>
        <label for="pontuacao-20-<?= $indicado['id'] ?>">20</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="radio" onclick="playSound2()" name="pontuacoes[<?= $indicado['id'] ?>]" value="-30" id="pontuacao-10-<?= $indicado['id'] ?>"unchecked_value>
        <label for="pontuacao-10-<?= $indicado['id'] ?>">-30</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    <?php endforeach; ?>


<audio id="pontuacao-sound">
  <source src="urna.mp3" type="audio/mpeg">
</audio>

<audio id="pontuacao-sound2">
  <source src="tecla.mp3" type="audio/mpeg">
</audio>

    <button style="font-size:24px; font-weight:bold   ; background-color: #fe8869;
    border-radius: 30px;
    height: 51px;
    left: calc(50.00% - -296px);
    top: calc(50.00% + -453px);
    width: 298px;" class="enviar-pontuao-24HFUk enviar-pontuao" type="submit" onclick="playSound()">Enviar pontuações</button>
  </form>
      
  <form method="GET" action="index.php">
    <button style="font-size:24px; font-weight:bold" class="boto-inicio-24HFUk" type="submit">Voltar para o início</button>
  </form>

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




 




