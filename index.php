<?php
session_start();
// verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>
	<h2>Bem-vindo <?php echo $_SESSION['username']; ?></h2>
	<p>Esta é a página de índice.</p>
	<a href="logout.php">Sair</a>
</body>
</html>
