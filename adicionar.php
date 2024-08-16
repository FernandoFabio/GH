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
  <title>Adicionar Indicado</title>
</head>
<body>
  <h1>Adicionar Indicado</h1>

  <form method="POST">
    <label>
      Nome:
      <input type="text" name="nome">
    </label>
    <br>
    <label>
      Categoria:
      <select name="categoria">
        <?php foreach ($categorias as $categoria): ?>
          <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <br>
    <button type="submit">Adicionar</button>
  </form>

  <form method="GET" action="index.php">
    <button type="submit">Voltar para o início</button>
  </form>
</body>
</html>
