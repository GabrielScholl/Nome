<?php
	session_start();
	$unidade=$_SESSION["nomeUnidade"];
	$ano=$_SESSION['anoSelecionado'];
	$usuarioLogado=$_SESSION['usuarioLogado'];
	include('02configDB.php');
	$nomeGanho=$_GET['exclui'];
	$stmt = "DELETE FROM ganhos WHERE login='$usuarioLogado' AND nome='$unidade' AND nomeGanho='$nomeGanho' AND dataGanho='$ano'";
	$result=mysqli_query($link,$stmt);
	header('Location:31entraDados2.php');
?>