<?php
session_start();
// verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gaminghouse";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Erro na conexão: " . $conn->connect_error);
}
// Verificar se o parâmetro de consulta categoria_id foi definido
if (isset($_GET["categoria_id"])) {
	$categoria_id = $_GET["categoria_id"];
} else {
	die("Categoria não encontrada.");
}
// Selecionar todos os itens da categoria especificada
$sql = "SELECT * FROM indicados WHERE categoria_id=".$categoria_id;
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Itens da categoria</title>
</head>
<body>
	<h2>Itens da categoria:</h2>
	<ul>
		<?php
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<li>".$row["nome"]."</li>";
			}
		} else {
			echo "Nenhum item encontrado para esta categoria.";
		}
		$conn->close();
		?>
	</ul>
	<a href="index
