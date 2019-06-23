<?php
session_start();
$login = $_POST['uname'];
require('02configDB.php');
//Pega a senha do banco
$stmt = "SELECT * FROM usuarios WHERE login='$login'";
$result = mysqli_query($link,$stmt);
$row = mysqli_fetch_array($result);
$usuarioBD = $row['login'];
if ($usuarioBD == null){
    //Atribui a variável global erro
	$_SESSION['erro']="Usuario incorreto";
	header('Location: 61esqueciSenha.php');
 }else{
 	$_SESSION['login']=$login;
 	$_SESSION['perguntaS']=$row['perguntaS'];
 	header('Location: 63exibePergunta.php');
}
?>