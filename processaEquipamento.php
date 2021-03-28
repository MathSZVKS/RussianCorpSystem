<?php

include_once("conexao.php");

//VARIÁVEIS DE COMUNICAÇÃO COM O BANCO DE DADOS//
$marca = $_POST['marca'];
$problemaCitado = $_POST['problemaCitado'];
$dataRecebimento = $_POST['dataRecebimento'];
$id_user = $_POST['select_pessoas_cadastradas'];
$tipo = $_POST['tipo'];
$modelo = $_POST['modelo'];
$observacao = $_POST['observacao'];

//VARIAVEL QUE ARMAZENA COMANDOS SQL//
$sql2 = "insert into equipamento (marca,problema_citado,dt_recebimento, codigo_usuario, tipo, modelo, observacao) values ('$marca','$problemaCitado','$dataRecebimento', '$id_user', '$tipo', '$modelo', '$observacao');";
//VARIAVEL QUE REGISTRA OS COMANDOS NO BANCO//
$salvar2 = mysqli_query($conexao,$sql2);
//VERIFICA SE HOUVE ALTERAÇÃO EM ALGUMA LINHA NO BANCO//
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
