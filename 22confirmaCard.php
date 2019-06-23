<?php  
session_start();
?>
<html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs\LdeLuna.png'/>
    <!--Texto da aba-->
    <title>Cirar novo card - Luna</title>
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
<?php $id = 'criaCard'; include('barra.php'); ?>
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
    height:auto;
    width:900px;
    /*Margem*/
    margin:60px auto;
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
        height:auto;
        width:860px;
        /*Margem*/
        margin:20px auto;
        border-top:10px;
    }
    </style>
        <div class='title'>
            <h1>Novo card</h1>
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
                /*flex-direction:column;*/
                margin-bottom:40px;
            }
            </style>
            <table class="tabela">
                <form action="23criadorGlebal.php" method="post" id="form">
                <tr>
                    <th>
                        <h3>Nome da unidade:</h3>
                    </th>
                    <th>
                        <input type='text' name='nome' autofocus required>
                        <br>
                    <?php
                        //Verifica se existe a variavel erro dentro das variaveis globais
                        if (isset($_SESSION['erroNome'])){
                            if($_SESSION['erroNome']=="Unidade em branco" || $_SESSION['erroNome']=="Unidade ja cadastrada"){
                    ?>  
                          
                                <label for="erro" class="erro"><b><?php echo $_SESSION['erroNome'];?></b></label>
                    </th>
                                <?php  
                                    //Atribui nada a erro, caso o usuaro atualize a pagina não mostrara o erro novamente
                                    $_SESSION['erroNome']='';
                                ?>
                    <?php
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th>
                        <h3>Descrição:</h3>
                    </th>
                    <th>
                        <input type='text' name='descricao' autofocus required>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Tipo:</h3>
                    </th>
                    <th>
                        Lucro:<input type='radio' name='tipo' value="Lucro" autofocus required>
                        Despesa:<input type='radio' name='tipo' value="Despesa" autofocus required>
                    </th>
                </tr>
                </table>
                </form>
            </div>
            <style>
            .tabela{
                margin:20px auto 0px auto;
            }
            h3{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:26px;
                /*Cor*/
                color:aliceblue;
                
                /*Alinha*/
                text-align:center;
            }           
            </style>
        </div>
         <?php
                //Verifica se existe a variavel msg dentro das variaveis globais
            if (isset($_SESSION['msg'])){
                if($_SESSION['msg']=="Unidade inserida com sucesso"){
        ?>
                    <label for="msg" class="sucesso"><b><?php echo $_SESSION['msg'];?></b></label>                        
                    <?php  
                        //Atribui nada a erro, caso o usuaro atualize a pagina não mostrara o erro novamente
                        $_SESSION['msg']='';
                    ?>
        <?php
                }
            }
        ?>
        <div class='botoes'>
        <button type='submit' form="form">Confirma</button></a>
        </div>
            <style>
            button{
                /*Posicao*/
                margin:20px 350px;
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
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: red;
            }
            .sucesso{
                margin-left:350px; 
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: green;
            }
            </style>
    </div>
    </div>
    
</div>

</html>