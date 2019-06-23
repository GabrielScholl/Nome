<html>

<!--Link do card-->
<a href='<?php echo $linkGleba; ?>?numGlebal=<?php echo $numGleba; ?>' >
<!--Borda do cartao-->
<div class='border'>
    <style>
    .border{
        /*Dimensoes*/
        height:250px;
        width:200px;
        /*Posicionamento*/
        margin:auto;
        /*Cores*/
        background-color:transparent;
        /*Cursor*/
        cursor:pointer;
        /*Borda*/
        border-width:5px;
        border-style:solid;
        border-color:transparent;        
        border-radius:18px;
    }
    </style>
<!--Fundo do cartão-->
<div class='card' id='card'>
    <!--Fundo branco do cartão-->
    <style>
    #card{
        /*Dimensoes*/
        height:242px;
        width:200px;
        /*Posicionamento*/
        padding:8px 0px 0px 0px;
        left:0px;
        /*Cores*/
        background-color:#e8f0ff;
        /*Cursor*/
        cursor:pointer;
        /*Borda*/
        border-radius:15px;
    }
    </style>
    <!--Imagem do meio do cartão-->
    <div class='card' id='img'>
        <!--Cria esquema de cores que indicam a produtividade-->
        <style>
        #img{
        /*Dimensoes*/
        height:170px;
        width:184px;
        /*Posicao*/
        position:sticky;
        margin:0px 8px;
        /*Cores*/
        background-color:rgb(130, 30, 45);/*vermelho*/
        background-color:rgb(0,70,80);/*azul*/
        
        /*Borda*/
        border-radius:10px;
        /*Flex=Posicao da barra*/
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        }
        </style>
        <!--Texto da produtividade-->
        <div class='card' id='prod'>
        <h2><?php
            $row1=null;
            if (isset($_SESSION['anoSelecionado'])) {
                $ano=$_SESSION['anoSelecionado'];
                $usuarioLogado=$_SESSION['usuarioLogado'];
                $stmt1 ="SELECT (SUM(valor)-(SELECT SUM(valor) FROM custos  where dataCusto='$ano' and nome='$numGleba' and login='$usuarioLogado')) as total FROM ganhos where dataGanho='$ano' and nome='$numGleba' and login='$usuarioLogado';";
                //Executa o comando
                $result1 = mysqli_query($link,$stmt1);
                $row1 = mysqli_fetch_array($result1);
                echo 'R$: ';
        ?>
        <?php 
                if ($row1['total']==null) {
                    $usuarioLogado=$_SESSION['usuarioLogado'];
                    $stmt1 ="SELECT -SUM(valor) as total FROM custos  where dataCusto='$ano' and nome='$numGleba' and login='$usuarioLogado';";
                    //Executa o comando
                    $result1 = mysqli_query($link,$stmt1);
                    $row1 = mysqli_fetch_array($result1); 
                }
                if ($row1['total']==null) {
                    $usuarioLogado=$_SESSION['usuarioLogado'];
                    $stmt1 ="SELECT SUM(valor) as total FROM ganhos  where dataGanho='$ano' and nome='$numGleba' and login='$usuarioLogado';";
                    //Executa o comando
                    $result1 = mysqli_query($link,$stmt1);
                    $row1 = mysqli_fetch_array($result1); 
                }
                if ($row1['total']==null) {
                    echo "N/A";
                }else{
                    echo $row1['total']; 
                }
            }
        ?>
        </h2>
            <?php
            if (!isset($_SESSION['anoSelecionado'])) {
                echo "Selecione um Ano";
            }
            ?>
        <style>
        #prod{
            /*Fonte*/
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:15px;
            /*Cores*/
            color:rgba(255,255,255,0.7);
            /*Posicao*/
            margin:auto;
        }
        #prod h2{
            margin:40px 0px 10px 0px;
        }
        </style>
        </div>
        <!--Cria barra indicadora de produtividade-->
        <div class='card' id='barrafundo'>
        <style>   
        #barrafundo{
            /*Forma*/
            height:14px;
            width:140px;
            border-radius:7px;
            /*Cor*/
            background-color:rgba(255,255,255,0.3);
            /*Posicao*/
            margin:auto;
        }
        </style>
        <div class='card' id='barra'>
        <style>
        #barra{
            /*Forma*/
            height:14px;
            width:14px;
            border-radius:7px;
            /*Cor*/
            background-color:rgba(255,255,255,0.7);
            /*Animacao*/
            -webkit-animation-name:barraCresce;
            -webkit-animation-duration:0.5s;
            -webkit-animation-timing-function:cubic-bezier(0.3, 0.9, 1, 1);
            -webkit-animation-fill-mode:forwards;
            animation-name:barraCresce;
            animation-duration:0.5s;
            animation-timing-function:cubic-bezier(0.3, 0.9, 1, 1);
            animation-fill-mode:forwards;
        }
        /*Animacao da barra*/
        @keyframes barraCresce{
            from{width:14px;}
            to{width:88px;}
        }
        </style>
        </div>
        </div>
        <!--Texto da produtividade-->
        <div class='card' id='unit'>
        <h2><?php echo $unidade; ?></h2>
        <style>
        #unit{
            /*Fonte*/
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:12px;
            /*Cores*/
            color:rgba(255,255,255,0.5);
            /*Posicao*/
            margin:auto;
        }
        #unit h2{
        }
        </style>
        </div>
    </div>
    <!--Subdiv permite o uso do flex para posicionar o triangulo a direita do texto-->
    <div class='card' id='subdiv'>
    <!--Coloca o texto e o triangulo em flex row-->
    <style>
        #subdiv{
        /*Posicionamento*/
        display:flex;
        flex-direction:row;
        justify-content:space-around;
        }
    </style>
    <!--Texto na parte de baixo do cartao-->
    <div class='card' id='text'>
        <h1><?php echo $numGleba; ?></h1>
        <!--Determina o estilo do texto mostrado-->
        <style>
        #text{
            /*Posicionamento*/
            position:sticky;
            margin:10px 0px 0px 0px;
            /*Fonte*/
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:11px;
            /*Cores*/
            color:rgba(0,0,0,0.7);
        }
        /*Limpa a tela para o ajuste .text*/
        h1{
            margin:0px;
        }
        h2{

        }
        /*Limpa o texto dos efeitos de ser link*/
        a{
            text-decoration:none;
        }
        </style>
    </div>
    <!--Linha inferior-->
    <div class='card' id='line'>
    <style>
    #line{
        /*Construcao*/
        width:100px;
        height:3px;
        border-radius:2px;
        /*Posicao*/
        position:absolute;
        margin:60px 0px 0px 0px;
        /*Cor*/
        background-color:silver;
        }
    </style>
    </div>
    </div>
</div>
</div>
</a>
<!--Seleciona e muda a cor da borda-->
<?php 
if($cores == 'normal'){
    echo '<style>';
    echo '.border:hover{';
    echo 'background:linear-gradient(55deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 85%);}';
    echo '</style>';
}
elseif($cores == 'safra'){
    echo '<style>';
    echo '.border:hover{';
    echo 'background:linear-gradient(55deg, #8f57dc 0%, #b557dc 51%, #c857dc 85%);}';
    echo '#card{background-color:#f5f1e3;}';
    echo '</style>';
}
?>
<!--Muda a cor da barrinha-->
<style>
/*Border eh um container do resto*/
.border:hover #line{
    background-color:rgba(0,0,0,0.7);
}
</style>

<!--Cor do fundo-->
<style>
body{
    margin:0px;
    background-color:#282828;
}
</style>
</html>