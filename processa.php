<?php

include_once("conexao.php");

//VARIÁVEIS DE COMUNICAÇÃO COM O BANCO DE DADOS//
$nome = $_POST['nome'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];
$dataNascimento = $_POST['dataNascimento'];
$gender = $_POST['genero'];

//VARIAVEL QUE ARMAZENA COMANDOS SQL//
$sql = "insert into usuarios (nome,email,profissao,dt_nascimento,sexo) values ('$nome','$email','$profissao','$dataNascimento','$gender')";
//VARIAVEL QUE REGISTRA OS COMANDOS NO BANCO//
$salvar = mysqli_query($conexao,$sql);
//VARIAVEL QUE VERIFICA SE HOUVE ALTERAÇÃO COM ALGUMA LINHA DO BANCO//
$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>RussianCorp</title>
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="icon" type="image/jpg" href="_css/icon.ico" />
    </head>
    <body style="background-image: url('_imagens/Fundo.jpg')">
    <div class="container">
            <nav>
                <ul class="menu">
                <a href="CadClientes.php"><li>Cadastro de Clientes</li></a>
                <a href="entregaManutencao.php"><li>Cadastro para manutenção</li></a>
                <a href="consultas.php"><li>Consultas</li></a>
                </ul>
            </nav>
            <section>
                <h1 class="titulos">Confirmação de Cadastro</h1>
                <br><br>

                <?php
                    if($linhas == 1){
                        print "Cadastro efetuado com sucesso!";
                    }else{
                        print "Cadastro Não Efetuado.<br>Já existe um usuário com este e-mail!";
                    }
                ?>
               <br><br>
            </section>

    </body>
</html>
