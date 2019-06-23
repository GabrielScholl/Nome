<?php
	session_start();
	$unidade=$_SESSION["nomeUnidade"];
	$usuarioLogado=$_SESSION['usuarioLogado'];
	include('02configDB.php');
	echo $unidade.$usuarioLogado;
	$stmt = "DELETE FROM ganhos WHERE login='$usuarioLogado' AND nome='$unidade'";
	$result=mysqli_query($link,$stmt);
	$stmt = "DELETE FROM custos WHERE login='$usuarioLogado' AND nome='$unidade'";
	$result=mysqli_query($link,$stmt);
	$stmt = "DELETE FROM unidades WHERE login='$usuarioLogado' AND nome='$unidade'";
	$result=mysqli_query($link,$stmt);
	header('Location:painelNormal.php');
?>