<?php
	session_start();
	$unidade=$_SESSION["nomeUnidade"];
	$ano=$_SESSION['anoSelecionado'];
	$usuarioLogado=$_SESSION['usuarioLogado'];
	include('02configDB.php');
	$nomeCusto=$_GET['exclui'];
	$stmt = "DELETE FROM custos WHERE login='$usuarioLogado' AND nome='$unidade' AND nomeCusto='$nomeCusto' AND dataCusto='$ano'";
	$result=mysqli_query($link,$stmt);
	header('Location:31entraDados2.php');
?>