<?php 
	//Abre a sessão, para criar váriaveis que são usadas por todos os códigos
	session_start();
?>
<html>
<!--Head-->
<head>
	<link type='image/x-icon' rel='shortcut icon' href='imgs/LdeLuna.png'/>
		
	<link type='text/css' rel='stylesheet' href='estilo_login.css'>
		
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">

	<title>Luna - Recuperar Senha</title>
</head>
<!--Body-->
<body>
	<!--Fundo-->
	<style>
	body{
		background-image:url('imgs/LunaLogin.jpg');
		color:white;
	}
	</style>
	<!--Cria o formulario de login-->
	<form action="62verificaLogin.php" method='post'>
		<!--Imagem no topo-->
		<div class="imgcontainer">
			<img src="imgs/Luna.png" alt="Avatar" class="avatar">
		</div>
		<!--Input e botao-->
		<div class="container">
			<!--Estilo da entrada-->
			<style>
			input[type=text], input[type=password]{
				/*Posicao*/
				width:24%;
				padding:12px 20px;
				margin-top:8px;
				margin-left:38%;
				margin-right:38%;
				margin-bottom:16px;
				display:inline-block;
				/*Estilo*/
				border:1px solid #c6fd56;
				box-sizing:border-box;
				border-radius:8px;
				/*Fonte*/
				font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			}
			</style>
			<!--Input-->
			<label for="uname"><b>Usuário</b></label>
			<input type="text" placeholder="Entre o Usuário" name="uname" required>
			<?php
				//Verifica se existe a variavel erro dentro das variaveis globais
				if (isset($_SESSION['erro'])){
					if($_SESSION['erro']=="Usuario incorreto"){
			?>
						<label for="erro" class="erro"><b><?php echo $_SESSION['erro'] ?></b></label>
						<?php  
							//Atribui nada a erro, caso o usuaro atualize a pagina não mostrara o erro novamente
							$_SESSION['erro']=''
						?>
			<?php
					}
				}
			?>
			<!--Estilo do botao-->
			<style>
			button{
				/*Cores*/
				background:linear-gradient(55deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 85%);
				color:white;
				/*Posicao*/
				padding:14px 20px;
				margin-top:8px;
				margin-left:38%;
				margin-right:38%;
				margin-bottom:10px;
				width:24%;
				/*Borda*/
				border:none;
				border-radius:10px;
				/*Cursor*/
				cursor:pointer;
				/*Fonte*/
				font-size:20px;
				font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			}	
			</style>
			<!--Botao-->
			<button type="submit">Enviar</button>
			<br>
		</div>
	</form>
	<style>
	button:hover {
		background:linear-gradient(55deg, #00ffee 0%, #00e5ff 51%, #00bbff 85%);
		color:black;
	}
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}
	img.avatar {
		width: 24%;
	}
	.container {
		padding: 16px;
	}
	b{
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		font-weight:normal;
	}
	label{
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		margin-left: 38%;
		margin-right: 38%;
	}
	.psw{
		margin-left:38%;
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}
	.cadastro{
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		color:#29b9e5;
		text-decoration: none;
	}
	.cadastro:hover{
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		color:#2490b1;
		text-decoration: none;
	}
	a{
		color:#c6fd56;
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}
	.erro{
		margin-left:38%;
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		color: red;
	}
	.sucesso{
		margin-left:38%;
		font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		color: green;
	}
	</style>
</body>
</html>
