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


//ESSA QUERY FAZ UMA CONSULTA NO BANCO E ENTREGA OS RESULTADOS COM EMAIL IGUAL AO QUE A PESSOAS DIGITAR//
$queryLogins= "select * from logins where email = '{$email2}';";
//RESULTADOSS FAZ A CONSULTA PROPRIAMENTE DITA NO BANCO//
$resultadoss = mysqli_query($conexao, $queryLogins);
//ROW4 RECEBE A QAUNTIDADE DE LINHAS QUE A QUERY ACIMA RETORNA, SE TEM USUARIO COM O EMAIL QUE O CARA DIGITOU NO BANCO ELE VAI TRAZER ALGUM VALOR MAIOR QUE 0//
$row4 = mysqli_num_rows($resultadoss);

//SE ROW4 TIVER UM VALOR MAIOR QUE 0 SIGNIFICA QUE JÁ EXISTE UM EMAIL IGUAL NO BANCO ENTAO ELE IRA RETORNAR PARA A PAGINA DE CADASTRO E A SESSION CONTADOR RECEBE TRUE//
if($row4 >= 1){
    header('Location: cadastro.php');
    $_SESSION['contador'] = true;
  }
  else{
    $queryConexao = "insert into logins (usuario, senha, email) values ('{$loged2}', md5('{$LoginSenha2}'), '{$email2}');";
  }


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









