<!--Recebe os dados-->
<?php
//Abre a sessão, para criar váriaveis que são usadas por todos os códigos
session_start();
$login = $_POST['uname'];
$senha = $_POST['psw'];
$senhaConfirma = $_POST['pswR'];
$email = $_POST['email'];
$perguntaS = $_POST['perguntaS'];
$respostaS = $_POST['respostaS'];
$erro=0;

require('02configDB.php');

$stmt = "SELECT * FROM usuarios";
$result = mysqli_query($link,$stmt);
while($row = mysqli_fetch_array($result)){
	//Verifica se existe algum login igual ao cadastrado no banco de dados
	if($login==$row['login']){
		$_SESSION['erroLogin']="Usuario ja cadastrado";
		$erro=$erro+1;
    }
	//Verifica se existe algum email igual ao cadastrado no banco de dados
	if ($email==$row['email']) {
		$_SESSION['erroEmail']="Email ja cadastrado";
		$erro=$erro+1;
	}
	//Verifica se as senhas são iguais
	if ($senha!=$senhaConfirma) {
		$_SESSION['erroSenha']="Senha diferente";  
		$erro=$erro+1;
	}	
	if ($erro>0) {
		header('Location:00telaCadastro.php');
	}
}
$row = mysqli_fetch_array($result);
if ($row==null) {
	//Verifica se as senhas são iguais
	if ($senha!=$senhaConfirma) {
		$_SESSION['erroSenha']="Senha diferente";  
		$erro=$erro+1;
	}	
	if ($erro>0) {
		header('Location:00telaCadastro.php');
	}
}
if ($erro==0) {
	//Define o comando
	$query ="INSERT INTO usuarios (login, email, senha, perguntaS, respostaS) VALUES('$login','$email','$senha','$perguntaS','$respostaS')";
	//Executa o comando
	mysqli_query($link, $query);
	$_SESSION['msg']="Cadastro efetuado com sucesso";
	header('Location:01telaLogin.php');
}
?>
