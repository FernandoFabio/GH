<?php
$pdo = new PDO('mysql:host=localhost;dbname=gaminghouse;charset=utf8', 'root', '');

$stmt = $pdo->prepare('UPDATE indicados SET pontuacao = pontuacao + ? WHERE id = ?');
$stmt->execute([$_POST['pontuacao'], $_POST['indicado_id']]);
?>

<p>Pontuação registrada com sucesso!</p>
