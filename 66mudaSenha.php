<?php
session_start();
require('02configDB.php');
//Pega a senha do banco
$login = $_SESSION['login'];
$novaSenha=$_POST['psw'];
$novaSenhaConfirma=$_POST['pswR'];
if ($novaSenha!=$novaSenhaConfirma) {
	$_SESSION['erro']="Senha diferente";  
	header('Location:65redefineSenha.php');
}else{
	$stmt = "UPDATE usuarios SET senha='$novaSenha' WHERE login='$login'";
	$result = mysqli_query($link,$stmt);
	$_SESSION['msg']='Senha alterada com sucesso';
	header('Location:01telaLogin.php');
}


?>