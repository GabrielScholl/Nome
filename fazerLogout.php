<?php
session_start();
unset($_SESSION['usuarioLogado']);
unset($_SESSION['anoSelecionado']);
session_destroy();
unset($_POST['botao']);
header("Location: 01telaLogin.php");

?>