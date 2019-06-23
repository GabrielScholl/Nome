<!--Processa os dados de login e compara com o banco de dados-->
<!--Recebe os dados-->
<?php
//Abre a sessão, para criar váriaveis que são usadas por todos os códigos
session_start();
$usuario = $_POST['uname'];
$senhaFORM = $_POST['psw'];
?>
<!--Compara com o banco de dados-->
<?php
require('02configDB.php');
//Pega a senha do banco
$stmt = "SELECT * FROM usuarios WHERE login='$usuario'";
$result = mysqli_query($link,$stmt);
$row = mysqli_fetch_array($result);
$usuarioBD = $row['login'];
$senhaBD = $row['senha'];
echo $usuarioBD;


if ($usuarioBD == null){
    //Atribui a variável global erro
	$_SESSION['erro']="Usuario incorreto";
    header('Location: 01telaLogin.php');  
}else{
	//Compara
	if ($senhaFORM == $senhaBD){
		$_SESSION['usuarioLogado']=$usuario;
	    header('Location:painelNormal.php');
	}
	else{
		//Atribui a variável global erro
		$_SESSION['erro']="Senha incorreta";
	    header('Location: 01telaLogin.php');

	}
}

?>