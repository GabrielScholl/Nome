<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs\LdeLuna.png'/>
    <!--Texto da aba-->
    <title>Entrar novos dados - Luna</title>
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
<?php $id = 'glebaSafra';
     
      include('barra.php'); ?>
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
    background-color:rgba(245,241,227,0.9);
    /*Forma*/
    border-radius:40px;
    height:auto;
    width:900px;
    /*Margem*/
    margin:50px auto;
}
</style>
 <form action="32guardaDados2.php" method='post'>
    <div class='canvas'>
    <!--Quadrado colorido dentro do glebao-->
    <style>
    .canvas{
        /*Cor*/
        background-color:rgba(0,50,62,0.9);
        /*Forma*/
        border-radius:24px;
        height:auto;
        width:860px;
        /*Margem*/
        margin:20px auto 0 auto;
        border-top:10px;
    }
    </style>
        <div class='title'>
            <h1><?php echo $_SESSION['nomeUnidade'] ?></h1>
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
                margin-bottom:40px;
            }
            </style>
            
            <div class='custos'>
                    
                    <h2>Custos</h2>
                    <?php
                        $i=1;
                        $j=111;
                        require('02configDB.php');
                        $usuarioLogado=$_SESSION['usuarioLogado'];
                        $unidade=$_SESSION['nomeUnidade'];
                        $ano=$_SESSION['anoSelecionado'];
                        $stmt = "SELECT * FROM custos WHERE nome='$unidade' AND dataCusto='$ano' AND login='$usuarioLogado'";
                        $result = mysqli_query($link,$stmt);
                        while ($row = mysqli_fetch_array($result)) {        
                    ?>
                        <div class="botaoExclui">
                             <h3><?php echo $row['nomeCusto']; ?>
                                <!--Esse input e necessario para pegar o valor da pergunta que sera jogada  no bdd-->
                                <input type="hidden" name='<?php echo $i;?>' value="<?php echo $row['nomeCusto']; ?>">
                                <input class='textoI' type='text' placeholder="<?php if($row['valor']!=null){ echo $row['valor'];}else{echo '0';} ?>" name='<?php echo $j;?>'>
                                <a href='33excluiDadosCusto.php?exclui=<?php echo $row['nomeCusto']; ?>'><button class='exclui' type="button">X</button></a>
                            </h3>
                        </div>
                    <?php
                            $i++;
                            $j=$j+111;
                        }
                    ?>
                    <div class='add'><a href='41criaCusto.php'><button class='padrao' type='button'>Adicionar campo</button></a></div>
            </div>
            <div class='producao'>
                    <h2>Produção</h2>
                    <?php
                        $i=1111;
                        $j=11111;
                        require('02configDB.php');
                        $usuarioLogado=$_SESSION['usuarioLogado'];
                        $unidade=$_SESSION['nomeUnidade'];
                        $ano=$_SESSION['anoSelecionado'];
                        $stmt = "SELECT * FROM ganhos WHERE nome='$unidade' AND dataGanho='$ano' AND login='$usuarioLogado'";
                        $result = mysqli_query($link,$stmt);
                        while ($row = mysqli_fetch_array($result)) {        
                    ?> 
                        <div class="botaoExclui">
                             <h3><?php echo $row['nomeGanho']; ?>
                                <!--Esse input e necessario para pegar o valor da pergunta que sera jogada  no bdd-->
                                <input type="hidden" name='<?php echo $i;?>' value="<?php echo $row['nomeGanho']; ?>">
                                <input class='textoI' type='text' placeholder="<?php if($row['valor']!=null){ echo $row['valor'];}else{echo '0';} ?>" name='<?php echo $j;?>'>
                                <a href='33excluiDadosGanho.php?exclui=<?php echo $row['nomeGanho']; ?>'><button class='exclui' type="button">X</button></a>
                            </h3>
                        </div>
                    <?php
                            $i=$i+1111;
                            $j=$j+11111;
                        }
                    ?>    
                    <div class='add'><a href='51criaGanho.php'><button class='padrao' type="button">Adicionar campo</button></a></div>
                <style>
                .add{
                    display:flex;
                    justify-content:space-around;
                }
                .add button{
                    /* Margem */
                    margin:auto auto 30px auto;
                    /* Fonte */
                    font-weight:normal;
                    font-size:18px;
                    /* Forma */
                    width:211px;
                    height:30px;
                    /* Borda */
                    border-radius:4px;
                }
                .botaoExclui{
                    margin-right:258px;
                }
                .exclui{
                    /*Posicao*/
                    height:20px;
                    width:20px;
                    /*Forma*/
                    border-radius:50%;
                    border:none;
                    text-transform: uppercase;
                    /*Cor*/
                    background:linear-gradient(55deg, #b80f0f 0%, #ef392d 51%, #f73a24 85%);
                    color:white;
                    /*Fonte*/

                    font-weight:bold;
                }
                .exclui:hover{
                    cursor:pointer;
                    background:linear-gradient(55deg, #8c0000 0%, #dd0e00 51%, #ff4534 85%);
                    transform: scale(1.05);
                }
                .exclui a{
                        text-decoration:none;
                        color:black;
                        height:50px;
                }
                .exclui h2{
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
            <style>
            h2{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                /*Cor*/
                color:aliceblue;
                /*Margem*/
                margin:40px 20px 20px 20px;
                /*Alinha*/
                text-align:Center;
            }
            h3{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                /*Cor*/
                color:aliceblue;
                /*Margem*/
                margin:20px 40px;
                /*Alinha*/
                text-align:right;
            }
            .textoI{
                /*Margem*/
                margin-left:20px;
                /*Borda*/
                border-radius:4px;
                border:1px solid grey;
                /*Tamanho*/
                height:25px;
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:16px;
                font-weight:bold;
                color:rgba(0,0,0,0.8);
                text-align:center;
                /*Estilo*/
                background-color:rgba(250,252,255,0.7);
            }
            .textoI:focus{
                color:black;
                box-shadow:0 0 0 3px rgb(0,50,62);
                background-color:aliceblue;
                outline:none;
            }
            </style>
        </div>
    </div>

    <button class='padrao' type='submit'>Confirma</button>
</form>
    <style>
    .padrao{
        /*Posicao*/
        margin:15px 0px 50px 350px;
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
    .padrao:hover{
        cursor:pointer;
        background:linear-gradient(55deg, #00ffee 0%, #00e5ff 51%, #00bbff 85%);
		color:black;
    }
    </style>
</div>

<?php


?>

</html>