<!--Entra no database luna-->
<?php
$servidor = 'localhost';
$username = 'root';
$password = '';
$database = 'luna';

$link=mysqli_connect($servidor,$username,$password,$database);

if(!$link) {
    die("Falha de conexao: " . mysqli_connect_error());
}
?>