<html>
<?php
session_start();
$i=1;
$j=111;
$usuarioLogado=$_SESSION['usuarioLogado'];
$ano=$_SESSION['anoSelecionado'];
$unidade=$_SESSION['nomeUnidade'];
$existePergunta;
require('02configDB.php');
$existePergunta=true;
    while ($existePergunta==true) {
        if (isset($_POST[$i])) {
            if(strlen($_POST[$j])>0){
                $nomeCusto=$_POST[$i];
                $valor=$_POST[$j];
                $query ="UPDATE custos SET valor='$valor' WHERE dataCusto='$ano' and nome='$unidade' and nomeCusto='$nomeCusto' and login='$usuarioLogado'";
                //Executa o comando
                mysqli_query($link, $query);
            }
            //$_SESSION['msg']="Cadastro efetuado com sucesso";
            $j=$j+111;
            $i++;
        }else{
            $existePergunta=false;
        }
    }
$i=1111;
$j=11111;
$existePergunta=true;
    while ($existePergunta==true) {
        if (isset($_POST[$i])) {
            if(strlen($_POST[$j])>0){
                $nomeGanho=$_POST[$i];
                $valor=$_POST[$j];
                $query ="UPDATE ganhos SET valor='$valor' WHERE dataGanho='$ano' and nome='$unidade' and nomeGanho='$nomeGanho' and login='$usuarioLogado'";
                //Executa o comando
                mysqli_query($link, $query);
            }
            //$_SESSION['msg']="Cadastro efetuado com sucesso";
            $j=$j+11111;
            $i=$i+1111;
        }else{
            $existePergunta=false;
        }
    }
    header('Location:11analisaDados.php');
?>
