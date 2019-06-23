<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs/LdeLuna.png'/>
    <!--Charset-->
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <!--Texto da aba-->
    <title>Painel de controle - Luna</title>
</head>


<html>
<!--Barra-->
<div class='barra'>
<!--Traz do arquivo-->
<?php $id = 'painelNormal'; 
      include('barra.php'); ?>
<style>.barra{width:100%;}</style>
</div>

<!--Cartoes-->
<div class='corpo'>
<!--Organiza os cards-->
<style>
.corpo{
    /*A cor do fundo esta no fim do barra.html*/
    display:grid;
    grid-template-columns:auto auto auto auto auto;
    grid-row-gap:20px;
    grid-column-gap:40px;
    justify-content:space-evenly;
    min-height:604px;
    width:1065px;
    margin:50px auto auto auto;
}
body{
    background:linear-gradient(0deg, #080818, #282838);
}
</style>
<!--Traz os cards-->
<?php

//Conecta com o banco luna e traz $link
include('02configDB.php');
$usuarioLogado=$_SESSION['usuarioLogado'];
$stmt = "SELECT * FROM unidades WHERE login='$usuarioLogado'";
$result = mysqli_query($link,$stmt);

while($row = mysqli_fetch_array($result)){
    $linkGleba = "11analisaDados.php";//calculaProd($x, $_GET['ano']);//descrita abaixo
    $unidade = $row['tipo'];
    $numGleba = $row['nome'];
    $cores = 'normal';
    include('card.php');
}

include('21novoCard.html');

?>
</div>
</html>