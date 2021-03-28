<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$loged = mysqli_real_escape_string($conexao, $_POST['usuario']);
$LoginSenha = mysqli_real_escape_string($conexao, $_POST['senha']);

$queryConexao = "select usuario_id, usuario from logins where usuario='{$loged}' and senha=md5('{$LoginSenha}');";

$resultadu = mysqli_query($conexao, $queryConexao);

$row2 = mysqli_num_rows($resultadu);

if($row2 == 1){
    $_SESSION['usuario'] = $loged; 
    header('Location: CadClientes.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');  
    exit();
}

?>