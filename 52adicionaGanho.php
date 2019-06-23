<?php
	session_start();
	require('02configDB.php');
	$erro=0;
	$usuarioLogado=$_SESSION['usuarioLogado'];
	$nomeGanho=$_POST['nomeGanho'];
	$ano=$_SESSION['anoSelecionado'];
	$unidade=$_SESSION['nomeUnidade'];
    $stmt = "SELECT * FROM ganhos WHERE nome='$unidade' AND dataGanho='$ano' AND login='$usuarioLogado'";
    $result = mysqli_query($link,$stmt);
    while ($row = mysqli_fetch_array($result)) {
    	if (strtolower($row['nomeGanho'])==strtolower($nomeGanho)) {
    		$erro=$erro+1;
    	}
    }
	if ($erro==0) {
		echo "entrei";
		$query ="INSERT INTO ganhos (nome, dataGanho, valor, nomeGanho, login) VALUES('$unidade','$ano',null,'$nomeGanho','$usuarioLogado')";
	    //Executa o comando
	    mysqli_query($link, $query);
	    header('Location:31entraDados2.php');
	}else{
		$_SESSION['erro']="Ganho ja cadastrado";
		header('Location:51criaGanho.php');
	}
	
?>