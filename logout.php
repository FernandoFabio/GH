<?php
session_start();
// encerra a sessão do usuário
session_unset();
session_destroy();
header("Location: login.php");
?>
