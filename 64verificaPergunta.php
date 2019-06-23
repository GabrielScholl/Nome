<?php
session_start();
$login = $_SESSION['login'];
require('02configDB.php');
//Pega a senha do banco
$stmt = "SELECT * FROM usuarios WHERE login='$login'";
$result = mysqli_query($link,$stmt);
$row = mysqli_fetch_array($result);
$respostaBD=$row['respostaS'];
$respostaS = $_POST['respostaS'];
if ($respostaS==$respostaBD) {
	header('Location:65redefineSenha.php');
}else{
	$_SESSION['erro']='Resposta incorreta';
	header('Location:63exibePergunta.php');
}

?>