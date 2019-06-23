<!DOCTYPE html>
<script src="https://kit.fontawesome.com/f8ec645e57.js"></script>
<?php
    if (isset($_POST['novoAno'])) {
        if (strlen($_POST['novoAno'])>=4) {
            $_POST['ano']=$_POST['novoAno'];
            $_SESSION['anoSelecionado']=$_POST['novoAno'];
        }
    }
?>
<!--Define o conteudo da barra-->
<?php
switch($id){
    case 'painelNormal':
        $titulo = 'PAINEL DE CONTROLE - MODO ANÁLISE';
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp ';
        $botoes = '';
        $img = 'imgs/lapis.png';
        break;

    case 'criaCusto':
        $titulo = 'CRIAÇÃO DE CUSTO';
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp <a href="11analisaDados.php?numGleba='.'        ">ANÁLISE DE DADOS</a> &nbsp / &nbsp <a href="31entraDados2.php?numGleba='.'">ENTRADA DE DADOS</a> &nbsp/ &nbsp <a href="41criaCusto.php">CRIAÇÃO DE CUSTO</a> &nbsp /';
        $botoes = 'painelSafra.php';
        $img = 'imgs/lapis.png';
        break;

    case 'criaGanho':
        $titulo = 'CRIAÇÃO DE GANHO';
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp <a href="11analisaDados.php?numGleba='.'        ">ANÁLISE DE DADOS</a> &nbsp / &nbsp <a href="31entraDados2.php?numGleba='.'">ENTRADA DE DADOS</a> &nbsp/ &nbsp <a href="51criaGanho.php">CRIAÇÃO DE GANHO</a> &nbsp /';
        $botoes = 'painelSafra.php';
        $img = 'imgs/lapis.png';
        break;

    case 'painelSafra':
        $titulo = 'PAINEL DE CONTROLE - MODO ENTRADA DE DADOS';
        $caminho = '<a href="painelSafra.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp ';
        $botoes = 'painelNormal.php';
        $img = 'imgs/graph.png';
        $numGleba = '1';
        break;

    case 'glebaNormal':
        $titulo =  $_SESSION['nomeUnidade'].' - MODO ANÁLISE';//Ver se da pra adicionar numero de gleba
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp 
                    <a href="11analisaDados.php?numGleba='.'">ANÁLISE DE DADOS</a> &nbsp / &nbsp ';
        $botoes = '31entraDados2.php?numGleba=';
        $img = 'imgs/lapis.png';
        break;

    case 'glebaSafra':
        $titulo = $_SESSION['nomeUnidade'].' - MODO ENTRADA DE DADOS';
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp <a href="11analisaDados.php?numGleba='.'        ">ANÁLISE DE DADOS</a> &nbsp / &nbsp <a href="31entraDados2.php?numGleba='.'">ENTRADA DE DADOS</a> &nbsp/ &nbsp ';
        $botoes = '11analisaDados.php?numGleba=';
        $img = 'imgs/graph.png';
        break;

    case 'criaCard':
        $titulo = 'CRIAÇÃO DE CARD';
        $caminho = '<a href="painelNormal.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp 
                    <a href="22confirmaCard.php">CRIAR CARD</a> &nbsp / &nbsp ';
        $botoes = '22criaCard.php';
        $img = 'imgs/graph.png';
        break;

    case 'processaCard':
        $titulo = 'CRIAÇÃO DE CARD - PROCESSANDO';
        $caminho = '<a href="painelSafra.php">PAINEL DE CONTROLE</a> &nbsp / &nbsp 
                    <a href="22criaCard.php">CRIAR CARD</a> &nbsp / &nbsp 
                    <a href="23processaCard.php">PROCESSANDO CARD</a> &nbsp / &nbsp ';
        $botoes = '23processaCard.php';
        $img = 'imgs/graph.png';
        break;
    }
?>

<html>
<!--Elemento barra-->
<div class='barra'>
    <style>
    .barra{
        /*Posiciona relativamente os blocos*/
        display:flex;
        flex:row;
        justify-content:left;
    }
    </style>
    <!--Parte da esquerda-->
    <?php
        if ($id!='painelNormal') {
        
    ?>
    <div class='esq'>
        <a href='<?php echo 'painelNormal.php'; ?>'><h2><i class="fas fa-home"></i></h2></a>
        <style>
        .esq{
            /*Dimensoes*/
            height:50px;
            width:85px;
            min-width:35px;
            /*Cores*/
            background-color:#5d0e2f;
            /*Posicao*/
            margin:20px 0px 30px 20px;
            /*Borda*/
            border-radius:15px 0px 0px 15px;
        }
        /*Xis*/
        .esq h2{
            /*Posicao*/
            display:flex;
            justify-content:space-around;
            margin-top:6px;
            /*Cor*/
            color:#971047;
            /*Estilo*/
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size:32px;
            /*Aumenta o clicavel*/
            height:50px;
        }
        .esq a{
            text-decoration:none;
        }
        .esq:hover{
            /*Cores*/
            background-color:#971047;
        }
        .esq:hover h2{
            /*Cores*/
            color:#ea005e;
        }
        </style>
    </div>
    <?php
        }else{
    ?>
    <div class='esq'>
        <a href='<?php echo 'confirmaLogout.php'; ?>'><h2><i class="fas fa-times"></i></h2></a>
        <style>
        .esq{
            /*Dimensoes*/
            height:50px;
            width:85px;
            min-width:35px;
            /*Cores*/
            background-color:#5d0e2f;
            /*Posicao*/
            margin:20px 0px 30px 20px;
            /*Borda*/
            border-radius:15px 0px 0px 15px;
        }
        /*Xis*/
        .esq h2{
            /*Posicao*/
            display:flex;
            justify-content:space-around;
            margin-top:6px;
            /*Cor*/
            color:#971047;
            /*Estilo*/
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size:32px;
            /*Aumenta o clicavel*/
            height:50px;
        }
        .esq a{
            text-decoration:none;
        }
        .esq:hover{
            /*Cores*/
            background-color:#971047;
        }
        .esq:hover h2{
            /*Cores*/
            color:#ea005e;
        }
        </style>
    </div>
    <?php
        }
    ?>
    <!--Pedaco da direita-->
    <div class='centro'>
        <style>
        .centro{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            /*Dimensoes*/
            height:50px;
            width:100%;
            /*Cores*/
            background-color:rgba(250, 250, 255, 0.9);
            background-image:url('imgs/vikingFundo.png');
            background-size:40px;
            background-blend-mode:saturation;
            /*Posicao*/
            margin:20px 0px 30px 0px;
        }
        </style>
        <!--Texto escrito no titulo-->
        <div class='texto'>
            <!--Dentro da barra-->
            <h1><?php echo $titulo; ?></h1>
            <style>
            .texto h1{    
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:26px;
                /*Posicao*/
                margin:8px 20px auto 20px;
                /*Estilo*/
                font-weight:bold;
                color:#444;

            }
            </style>
            <!--Abaixo da barra-->
            <p><?php echo $caminho; ?></p>
            <style>
            /*Arruma o breadcrums*/
            .texto p{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:12px;
                /*Posicao*/
                margin:20px auto 30px 20px;
                /*Estilo*/
                font-weight:bold;
                color:rgb(170,170,170);
            }
            /*Arruma o clicavel*/
            .texto a{
                /*Fonte*/
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size:12px;
                /*Estilo*/
                font-weight:bold;
                color:rgb(170,170,170);
                /*Sublinhado*/
                text-decoration:none;
            }
            /*Brilho do clicavel ao sobrevoar*/
            .texto a:hover{
                color:#8f57dc;
            }
            </style>
        </div>
        <?php
            if ($id=='painelNormal') {
            
        ?>
        <div class='escolhaAno'>
        <form method="post" action="painelNormal.php">
            <select id ='ano' name='ano'>
                <?php
                    require('02configDB.php');
                    $usuarioLogado=$_SESSION['usuarioLogado'];
                    $stmt = "SELECT dataCusto FROM custos WHERE login='$usuarioLogado' UNION SELECT dataGanho FROM ganhos WHERE login='$usuarioLogado'";
                    $result = mysqli_query($link,$stmt);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row['dataCusto']; ?>" 
                            <?php 
                                if (isset($_POST['ano'])) {
                                    if($_POST['ano']==$row['dataCusto']){ 
                                        $_SESSION['anoSelecionado']=$_POST['ano'];
                            ?>
                                        selected
                            <?php
                                    }
                                }
                                if (isset($_SESSION['anoSelecionado'])) {
                                    if ($row['dataCusto']==$_SESSION['anoSelecionado']) {
                            ?>
                                        selected
                            <?php                
                                    }
                                }
                                
                            ?>
                        >
                            <?php
                                echo $row['dataCusto'];
                            ?>
                        </option>
                    <?php
                    }
                    if (isset($_SESSION['anoSelecionado'])) {
                        if ($_SESSION['anoSelecionado']==$_POST['novoAno']) {
                    ?>
                            <option value="<?php echo $_POST['novoAno']; ?>" selected>
                                <?php
                                    echo $_POST['novoAno'];
                                ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                <option value="Outro">Outro...</option>
            </select>
            <?php
                if (isset($_POST['ano'])) {
                    if ($_POST['ano']=='Outro') {
            ?>
                        <input type="text" name="novoAno">
            <?php
                    }
                }
            ?>
            <button type="submit" class="dir2">OK</button>
            <style>
                .dir2{
                    /*Dimensoes*/
                    height:50px;
                    width:85px;
                    min-width:35px;
                    /*Cores*/
                    background-color:#2c5d55;
                    margin:0px 0px 30px 0px;
                }
                .dir2 a{
                    width:85px;
                }
                .dir2:hover{
                    background-color:#4cb8a5;
                }
            </style>
        </form>
        <!-- <script type="text/javascript">
            window.onload = function(){
                    location.href=document.getElementById("selectbox").value;                }
            }       
        </script> -->
    
        <style>
        .escolhaAno select{
            /*height:50px;*/
            width:120px;
            border:3px solid #4cb8a5;
            /* Fonte */
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:22px;
            font-weight:bold;
            color:#2c5d55;
            /* Espacamento */
            padding-left:20px;
            margin-right: 10px;
            /* Cor */
            background-color:#f0fff8;
        }
        </style>
        </div>
        <?php
            }
        ?>
        <?php
            if ($id=='glebaNormal') {
        ?>
        <div class="dir2">
            <form method="POST" action="confirmaExclusao.php">
                <input type="hidden" name="<?php echo $_SESSION["nomeUnidade"]; ?>">
                <button type="submit" class="dir2">Exclui</button>
            </form>
            <style>
                .dir2{
                    /*Dimensoes*/
                    height:50px;
                    width:85px;
                    min-width:35px;
                    /*Cores*/
                    background-color:#2c5d55;
                    margin:0px 0px 30px 0px;
                }
                .dir2 a{
                    width:85px;
                }
                .dir2:hover{
                    background-color:#4cb8a5;
                }
            </style>
        </div>
        <?php
            }
        ?>
    </div>
    <?php
        if ($id!='painelNormal') {
    ?>
            <div class = 'dir'>
            <a href='<?php echo $botoes; ?>'><img src='<?php echo $img; ?>' height='40' width='40' alt='E'></a>
                <style>
                .dir{
                    display:flex;
                    justify-content:center;
                    /*Dimensoes*/
                    height:50px;
                    width:85px;
                    min-width:35px;
                    /*Cores*/
                    background-color:#2c5d55;
                    /*Posicao*/
                    margin:20px 20px 30px 0px;
                    /*Borda*/
                    border-radius:0px 15px 15px 0px;
                }
                .dir img{
                    margin:6px 20px;
                }
                .dir a{
                    width:85px;
                }
                .dir:hover{
                    background-color:#4cb8a5;
                }
                </style>
            </div>
    <?php
        }
    ?>
</div>
<style>
    body{
        /*Ajusta o site com as bordas do navegador*/
        margin:0px;
    }
</style>
</html>