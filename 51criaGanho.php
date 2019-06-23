<?php
    session_start();
?>
<html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs\LdeLuna.png'/>
    <!--Texto da aba-->
    <title>Criar novo ganho - Luna</title>
</head>

<style>
body{
    /*Cor do fundo*/
    background:linear-gradient(0deg, #080818, #282838);
}
</style>

<!--Barra-->
<div class='barra'>
<!--Traz do arquivo-->
<?php $id = 'criaGanho'; include('barra.php'); ?>
<style>.barra{width:100%;}</style>
</div>

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
            <h1>Nova produção</h1>
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
                margin:20px auto 0px auto;
                font-size:44px;
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
            <form method="POST" action="52adicionaGanho.php">
                <div class='pergunta'>
                    <h3>Nome do novo ganho: <input type='text' name='nomeGanho'></h3>
                    <?php
                        //Verifica se existe a variavel erro dentro das variaveis globais
                        if (isset($_SESSION['erro'])){
                            if($_SESSION['erro']=="Ganho ja cadastrado"){
                    ?>
                                <label for="erro" class="erro"><b><?php echo $_SESSION['erro'] ?></b></label>
                                <?php  
                                    //Atribui nada a erro, caso o usuario atualize a pagina não mostrara o erro novamente
                                    $_SESSION['erro']=''
                                ?>
                    <?php
                            }
                        }
                    ?>
                </div>
                    <button type='submit'>Confirma</button>
            </form>
            <style>
            h3{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:32px;
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
    button{
        /*Posicao*/
        margin:90px 335px;
        /*Forma*/
        height:50px;
        width:200px;
        border-radius:10px;
        border:none;
        /*Cor*/
        background:linear-gradient(55deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 85%);
        color:white;
        /*Fonte*/
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size:20px;
        font-weight:bold;
    }
    button:hover{
        cursor:pointer;
        background:linear-gradient(55deg, #00ffee 0%, #00e5ff 51%, #00bbff 85%);
		color:black;
    }
    .erro{
        margin-left:42%;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: red;
    }
    </style>
</div>

</html>