<!--Cria uma nova linha para uma nova unidade-->
<html>
<?php
session_start();
//Conecta com o banco luna e traz $link
include('02configDB.php');
$erro=0;
$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
$tipo=$_POST['tipo'];
$usuarioLogado=$_SESSION['usuarioLogado'];
$stmt = "SELECT * FROM unidades WHERE login='$usuarioLogado'";
$result = mysqli_query($link,$stmt);

while($row = mysqli_fetch_array($result)){
	//Verifica se existe algum nome igual ao cadastrado no banco de dados
	if(strtolower($nome)==strtolower($row['nome'])){
		$_SESSION['erroNome']="Unidade ja cadastrada";
		$erro=$erro+1;
    }
}
if ($erro==0) {
	$usuarioLogado=$_SESSION['usuarioLogado'];
	//Define o comando
	$query ="INSERT INTO unidades (login,nome, descricao, tipo) VALUES('$usuarioLogado','$nome','$descricao', '$tipo')";
	//Executa o comando
	mysqli_query($link, $query);
	$_SESSION['msg']="Unidade inserida com sucesso";
}
header('Location:22confirmaCard.php');
?>


</html>