<?php
	session_start();
	require('02configDB.php');
	$erro=0;
	$usuarioLogado=$_SESSION['usuarioLogado'];
	$nomeCusto=$_POST['nomeCusto'];
	$ano=$_SESSION['anoSelecionado'];
	$unidade=$_SESSION['nomeUnidade'];
    $stmt = "SELECT * FROM custos WHERE nome='$unidade' AND dataCusto='$ano' AND login='$usuarioLogado'";
    $result = mysqli_query($link,$stmt);
    while ($row = mysqli_fetch_array($result)) {
    	if (strtolower($row['nomeCusto'])==strtolower($nomeCusto)) {
    		$erro=$erro+1;
    	}
    }
	if ($erro==0) {
		$query ="INSERT INTO custos (nome, dataCusto, valor, nomeCusto,login) VALUES('$unidade','$ano',null,'$nomeCusto','$usuarioLogado')";
	    //Executa o comando
	    mysqli_query($link, $query);
	    header('Location:31entraDados2.php');
	}else{
		$_SESSION['erro']="Custo ja cadastrado";
		header('Location:41criaCusto.php');
	}
	
?>