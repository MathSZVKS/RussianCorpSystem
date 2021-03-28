<?php

include_once("conexao.php");
include('verifica_login.php');

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select usuarios.codigo, usuarios.nome, usuarios.email, usuarios.profissao, usuarios.dt_nascimento, equipamento.problema_citado from usuarios, equipamento where usuarios.codigo = equipamento.codigo_usuario and usuarios.nome like '%$filtro%' order by usuarios.nome";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);


?>


<h2 class="Ola" style="text-align:right;">Olá, <?php echo $_SESSION['usuario'];?></h2>
<h3 class="Sair" style="text-align:right;"><a href="logout.php">Sair</a></h3>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>RussianCorp</title>
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="icon" type="image/jpg" href="_css/icon.ico" />
    </head>
    <body style="background-image: url('_imagens/Fundo.jpg')" >
    <div class="container">
            <nav>
                <ul class="menu">
                <a href="CadClientes.php"><li>Cadastro de Clientes</li></a>
                <a href="entregaManutencao.php"><li>Cadastro para manutenção</li></a>
                <a href="consultas.php"><li>Consultas</li></a>
                </ul>
            </nav>
            <section>
                <h1 class="titulos">Consultas</h1>
                <br><br>

                <form method="get" action="">
                    Filtrar por Nome: <input type ="text" name="filtro" class="campo" required autofocus>
                    <input type="submit" value="Pesquisar" class="btn">
                </form>

                <?php

                print "Resultado da pesquisa com a palavra <strong>$filtro</strong>.<br><br>";

                print "$registros registros encontrados.";

                print"<br><br>";

                while($exibirRegistros = mysqli_fetch_array($consulta)){

                    $codigo = $exibirRegistros[0];
                    $nome = $exibirRegistros[1];
                    $email = $exibirRegistros[2];
                    $profissao = $exibirRegistros[3];
                    $dataNascimento = $exibirRegistros[4];
                    $problemaCitado= $exibirRegistros[5];

                    print "<article>";

                    print("<strong>Código:</strong> $codigo<br>");
                    print("<strong>Nome:</strong> $nome<br>");
                    print("<strong>Email:</strong> $email<br>");
                    print("<strong>Profissão:</strong> $profissao<br>");
                    print("<strong>Nascimento:</strong> $dataNascimento<br>");
                    print("<strong>Problema citado:</strong> $problemaCitado<br>");
                    
                    print "</article>";

                }

                mysqli_close($conexao);
                   
                ?>
               
            </section>
            

    </body>
</html>