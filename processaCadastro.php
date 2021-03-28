<?php
session_start();
include('conexao.php');

if(empty($_POST['usuarioo']) || empty($_POST['senhaa']) || empty($_POST['emaill'])){
    header('Location: cadastro.php');
    exit();
}

$loged2 = mysqli_real_escape_string($conexao, $_POST['usuarioo']);
$LoginSenha2 = mysqli_real_escape_string($conexao, $_POST['senhaa']);
$email2 = mysqli_real_escape_string($conexao, $_POST['emaill']);

$queryConexao = "insert into logins (usuario, senha, email) values ('{$loged2}', md5('{$LoginSenha2}'), '{$email2}');";

$resultadu2 = mysqli_query($conexao, $queryConexao);

if($resultadu2 == 1){
    $_SESSION['usuario'] = $loged2; 
    $_SESSION['cadastrado'] = true;
    header('Location: index.php');
    exit();
}else{
    header('Location: processaCadastro.php');
    exit();
}

?>
