<?php
session_start();
$host = "containers-us-west-102.railway.app"; // endereço do servidor de banco de dados
$user = "root"; // usuário do banco de dados
$password = "trq5WQeR5hAMNWAEWDIT"; // senha do banco de dados
$dbname = "railway"; // nome do banco de dados

// cria a conexão com o banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// verifica se a conexão foi bem-sucedida
if (!$conn) {
	die("Conexão falhou: " . mysqli_connect_error());
}

// recebe as informações do formulário de login
$username = $_POST['username'];
$password = $_POST['password'];

// verifica se o nome de usuário e senha estão corretos
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// se o login foi bem-sucedido, redireciona para a página de índice
if (mysqli_num_rows($result) == 1) {
	$_SESSION['username'] = $username;
	header("Location: index.php");
} else {
	echo "Nome de usuário ou senha incorretos.";
}

mysqli_close($conn);
?>
