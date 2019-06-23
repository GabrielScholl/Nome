<?php
    session_start();
?>
<html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs\LdeLuna.png'/>
    <!--Texto da aba-->
    <title>Confirma Logout</title>
</head>

<style>
body{
    /*Cor do fundo*/
    background:linear-gradient(0deg, #080818, #282838);
}
</style>


<!--Glebao-->
<div class='glebao'>
<!--Card grandao-->
<style>
.glebao{
    /*Posicao*/
    display:flex;
    justify-content:space-between;
    flex-direction:column;
    /*Cor*/
    background-color:rgba(245,245,255,0.8);
    /*Forma*/
    border-radius:40px;
    height:400px;
    width:900px;
    /*Margem*/
    margin:50px auto;
}
</style>
    <div class='canvas'>
    <!--Quadrado colorido dentro do glebao-->
    <style>
    .canvas{
        /*Cor*/
        background-color:rgb(100,100,110);
        /*Forma*/
        border-radius:24px;
        height:240px;
        width:860px;
        /*Margem*/
        margin:20px auto 0 auto;
        border-top:10px;
    }
    </style>
        <div class='title'>
            <h1>Tem certeza que deseja fazer LOGOUT?</h1>
            <style>
            .title{
                display:flex;
                flex-direction:column;
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                /*Cor*/
                color:aliceblue;
            }
            .title h1{
                margin:70px auto 0px auto;
                font-size:36px;
            }
            </style>   

        </div>
        <div class='entradas'>
            <style>
            .entradas{
                display:flex;
                flex-direction:column;
            }
            </style>
            <div>
                    <a href="fazerLogout.php"><button class="botao1">Sim</button></a>
                    <a href="painelNormal.php"><button class="botao2">Não</button></a>
            </div>
            <style>
            h3{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:26px;
                /*Cor*/
                color:aliceblue;
                /*Margem*/
                margin:60px 20px 5px 80px;
                /*Alinha*/
                text-align:center;
            }           
            </style>
        </div>
    </div>
    <style>
    .botao1{
        /*Posicao*/
        margin-top: 175px;
        margin-left: 330px;
        height:50px;
        width:85px;

        /*Forma*/
        border-radius:30px;
        border:none;
        text-transform: uppercase;
        /*Cor*/
        background:linear-gradient(55deg, #39b80f 0%, #47ef2d 51%, #25f744 85%);
        color:white;
        /*Fonte*/

        font-weight:bold;
    }
    .botao1:hover{
        cursor:pointer;
        background:linear-gradient(55deg, #228c00 0%, #1ddd00 51%, #35ff52 85%);
		color:black;
		transform: scale(1.05);
    }
    .botao1 a{
            text-decoration:none;
            color: black;
            height:50px;
    }
    .botao1 h2{
            /*Posicao*/
            display:flex;
            justify-content:space-around;
            margin-top:6px;
            /*Estilo*/
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /*Aumenta o clicavel*/
            height:50px;
    }
    .botao2{
        /*Posicao*/
        height:50px;
        width:85px;

        /*Forma*/
        border-radius:30px;
        border:none;
        text-transform: uppercase;
        /*Cor*/
        background:linear-gradient(55deg, #b80f0f 0%, #ef392d 51%, #f73a24 85%);
        color:white;
        /*Fonte*/

        font-weight:bold;
    }
    .botao2:hover{
        cursor:pointer;
        background:linear-gradient(55deg, #8c0000 0%, #dd0e00 51%, #ff4534 85%);
        transform: scale(1.05);
    }
    .botao2 a{
            text-decoration:none;
            color:black;
            height:50px;
    }
    .botao2 h2{
            /*Posicao*/
            display:flex;
            justify-content:space-around;
            margin-top:6px;
            /*Estilo*/
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /*Aumenta o clicavel*/
            height:50px;
    }
    </style>
    
</div>

</html>