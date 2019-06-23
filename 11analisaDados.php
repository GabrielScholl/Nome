<?php
    session_start();
    if (isset($_GET['numGlebal'])) {
         $_SESSION["nomeUnidade"] = $_GET['numGlebal'];
    }
   
?>
<!DOCTYPE html>
<html>
<head>
    <!--Icone da aba-->
	<link type='image/x-icon' rel='shortcut icon' href='imgs\LdeLuna.png'/>
    <!--Texto da aba-->
    <title>Análise da gleba - Luna</title>
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
<?php $id = 'glebaNormal'; 
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
    background-color:rgba(240,248,255,0.9);
    /*Forma*/
    border-radius:40px;
    height:1100px;
    width:1200px;
    /*Margem*/
    margin:50px auto;
}
</style>
    <div class='canvas'>
    <!--Quadrado colorido dentro do glebao-->
    <style>
    .canvas{
        /*Flex*/
        display:flex;
        flex-direction:row;
        justify-content:center;
        /*Cor*/
        background-color:rgba(0,50,62,0.9);
        /*Forma*/
        border-radius:24px;
        height:1040px;
        width:1160px;
        /*Margem*/
        margin:20px auto 0 auto;
        border-top:10px;
    }
    </style>
    <!--Esquerda-->
    <div class='analiseEsq'>
        <h1>Informações 
        <?php
            echo $_SESSION['anoSelecionado'];
        ?>
        </h1>
        <br>
        <h2>Custos</h2>
        <style>
        .analiseEsq{
            /*Posicao*/
            margin:40px auto 40px 160px;
            /*Cor*/
            color:aliceblue;
            /*Texto*/
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:20px;
            /*Tamanho*/
            width:569px;
        }
        .analiseEsq h1{
            text-align:center;
        }
        .analiseEsq h3{
            text-align:center;
            margin-top:-15px;
            font-weight:normal;
            font-style:italic;
        }
        </style>
        <div class='container'>
            <style>
            .container{
                display:flex;
            }
            </style>
            <div class='label'>
                <table class="tabela1">
                    <?php
                        require('02configDB.php');
                        $usuarioLogado=$_SESSION['usuarioLogado'];
                        $unidade=$_SESSION['nomeUnidade'];
                        $ano=$_SESSION['anoSelecionado'];
                        $stmt = "SELECT * FROM custos WHERE nome='$unidade' AND dataCusto='$ano' AND login='$usuarioLogado'";
                        $result = mysqli_query($link,$stmt);
                        while ($row = mysqli_fetch_array($result)) {
                            
                    ?>
                        <tr>
                            <th><?php echo $row['nomeCusto']; ?></th>
                            <td>R$: <?php echo $row['valor']; ?></td>
                        </tr>
                    <?php
                        }
                        
                    ?>
                </table>
            <style>
            .label{
                text-align:left;
            }
            </style>
            </div>
            <div class='numbers'>
            <?php
            ?>
            <style>
            .numbers{
                
            }
            </style>
            </div>
        </div>
        <div class='producao'>
            <h2>Produção</h2>
            <table>
                    <?php
                        require('02configDB.php');
                        $unidade=$_SESSION['nomeUnidade'];
                        $ano=$_SESSION['anoSelecionado'];
                        $stmt = "SELECT * FROM ganhos WHERE nome='$unidade' AND dataGanho='$ano' AND login='$usuarioLogado'";
                        $result = mysqli_query($link,$stmt);
                    ?>
                        
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            
                    ?>
                        <tr>
                            <th><?php echo $row['nomeGanho']; ?></th>
                            <td>R$: <?php echo $row['valor']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                        <tr>
                            <td><h2>Total</h2></td>
                        </tr>
                        <tr>
                            <td>R$:
            <?php
                $stmt1 ="SELECT (SUM(valor)-(SELECT SUM(valor) FROM custos  where dataCusto='$ano' and nome='$unidade' and login='$usuarioLogado')) as total FROM ganhos where dataGanho='$ano' and nome='$unidade' and login='$usuarioLogado';";
                //Executa o comando
                $result1 = mysqli_query($link,$stmt1);
                $row1 = mysqli_fetch_array($result1);
                if ($row1['total']==null) {
                    $usuarioLogado=$_SESSION['usuarioLogado'];
                    $stmt1 ="SELECT -SUM(valor) as total FROM custos  where dataCusto='$ano' and nome='$unidade' and login='$usuarioLogado';";
                    //Executa o comando
                    $result1 = mysqli_query($link,$stmt1);
                    $row1 = mysqli_fetch_array($result1); 
                }
                if ($row1['total']==null) {
                    $usuarioLogado=$_SESSION['usuarioLogado'];
                    $stmt1 ="SELECT SUM(valor) as total FROM ganhos  where dataGanho='$ano' and nome='$unidade' and login='$usuarioLogado';";
                    //Executa o comando
                    $result1 = mysqli_query($link,$stmt1);
                    $row1 = mysqli_fetch_array($result1); 
                }
                if ($row1['total']==null) {
                    echo "N/A";
                }else{
                    echo $row1['total']; 
                }
            ?>
                    </td>
                </tr>
            </table>
            <style>
            .producao{
                text-align:left;
            }
            </style>
        </div>
    </div>
    <!--Linha divisoria central-->
    <div class='linhaDiv'>
    <style>
    .linhaDiv{
        /*Forma*/
        width:5px;
        height:800px;
        border-radius:1px;
        /*Cor*/
        background-color:rgba(240,245,255,0.1);
        /*Margem*/
        margin:40px auto auto 160px;
    }
    </style>
    </div>  
    <div class='analiseEsq'>
        <h1>Informações</h1> 
        <div class='escolhaAno'>
            <form method="post" action="11analisaDados.php">
                <select name='anoCompara'>
                    <?php
                        require('02configDB.php');
                        $usuarioLogado=$_SESSION['usuarioLogado'];
                        $stmt = "SELECT dataCusto FROM custos WHERE login='$usuarioLogado' UNION SELECT dataGanho FROM ganhos WHERE login='$usuarioLogado'";
                        $result = mysqli_query($link,$stmt);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['dataCusto']!=$_SESSION['anoSelecionado']){
                        ?>
                            <option value="<?php echo $row['dataCusto']; ?>" 
                                <?php 
                                    if (isset($_POST['anoCompara'])) {
                                        if($_POST['anoCompara']==$row['dataCusto']){ 
                                            $_SESSION['anoCompara']=$_POST['anoCompara'];
                                ?>
                                            selected
                                <?php
                                        }
                                    }
                                    if (isset($_SESSION['anoCompara'])) {
                                        if ($row['dataCusto']==$_SESSION['anoCompara']) {
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
                        }
                        ?>
                </select>
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
        </div>

        
        <style>
        .analiseEsq{
            /*Posicao*/
            margin:40px auto 40px 160px;
            /*Cor*/
            color:aliceblue;
            /*Texto*/
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:20px;
            /*Tamanho*/
            width:569px;
        }
        .analiseEsq h1{
            text-align:center;
        }
        .analiseEsq h3{
            text-align:center;
            margin-top:-15px;
            font-weight:normal;
            font-style:italic;
        }
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
        .tabela1 td{
            padding-left: 10px;
        }
        </style>
        <div class='container'>
            <style>
            .container{
                display:flex;
            }
            </style>
            <div class='label'>
                <table>
                    <?php
                        if(isset($_POST['anoCompara'])){
                            require('02configDB.php');
                            $usuarioLogado=$_SESSION['usuarioLogado'];
                            $unidade=$_SESSION['nomeUnidade'];
                            $anoCompara=$_POST['anoCompara'];
                            $stmt = "SELECT * FROM custos WHERE nome='$unidade' AND dataCusto='$anoCompara' AND login='$usuarioLogado'";
                            $result = mysqli_query($link,$stmt);
                    ?>
                            <h2>Custos</h2>
                    <?php
                            while ($row = mysqli_fetch_array($result)) {
                                
                    ?>
                            <tr>
                                <th><?php echo $row['nomeCusto']; ?></th>
                                <td>R$: <?php echo $row['valor']; ?></td>
                            </tr>
                    <?php
                            }
                            
                        }
                    ?>
                </table>
            <style>
            .label{
                text-align:left;
            }
            </style>
            </div>
            <div class='numbers'>
            <?php
            ?>
            <style>
            .numbers{
                
            }
            </style>
            </div>
        </div>
        <div class='producao'>
            <h2>Produção</h2>
            <table>
                    <?php
                        if(isset($_POST['anoCompara'])){
                            require('02configDB.php');
                            $usuarioLogado=$_SESSION['usuarioLogado'];
                            $unidade=$_SESSION['nomeUnidade'];
                            $anoCompara=$_POST['anoCompara'];
                            $stmt = "SELECT * FROM ganhos WHERE nome='$unidade' AND dataGanho='$anoCompara' AND login='$usuarioLogado'";
                            $result = mysqli_query($link,$stmt);
                    ?>
                            
                    <?php
                            while ($row = mysqli_fetch_array($result)) {
                                
                    ?>
                            <tr>
                                <th><?php echo $row['nomeGanho']; ?></th>
                                <td>R$: <?php echo $row['valor']; ?></td>
                            </tr>
                            <tr>
                                <td><h2>Total</h2></td>
                            </tr>
                            <tr>
                                <td>R$: 
                    <?php
                            }
                            $stmt1 ="SELECT (SUM(valor)-(SELECT SUM(valor) FROM custos  where dataCusto='$anoCompara' and nome='$unidade' and login='$usuarioLogado')) as total FROM ganhos where dataGanho='$anoCompara' and nome='$unidade' and login='$usuarioLogado';";
                            //Executa o comando
                            $result1 = mysqli_query($link,$stmt1);
                            $row1 = mysqli_fetch_array($result1);
                            if ($row1['total']==null) {
                                $usuarioLogado=$_SESSION['usuarioLogado'];
                                $stmt1 ="SELECT -SUM(valor) as total FROM custos  where dataCusto='$anoCompara' and nome='$unidade' and login='$usuarioLogado';";
                                //Executa o comando
                                $result1 = mysqli_query($link,$stmt1);
                                $row1 = mysqli_fetch_array($result1); 
                            }
                            if ($row1['total']==null) {
                                echo "N/A";
                            }else{
                                echo $row1['total'];;
                            }
                        }
                    ?>
                                </td>
                            </tr>
            </table>
            <style>
            .producao{
                text-align:left;
            }
            </style>
        </div>
    </div>
    <!--Direita-->
    <div class='analiseDir'>
    <style>
    .analiseDir{
        width:619px;
    }
    </style>
    </div>
    </div>
</div>
</html>