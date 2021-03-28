<?php
include('verifica_login.php');
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
                <h1 id="cadastroUsuario" class="titulos">Cadastro de Clientes</h1>
                <br><br>

                <!-- LINK COM A PAGINA PROCESSA.PHP QUE IRÁ SUBMETER OS DADOS AO BANCO E CRIAÇÃO DOS BOTÕES PARA ENVIO-->
                <form method="post" action="processa.php">
                   <input type="submit" value="Salvar" class="btn2">
                   <input type="reset" value="Limpar" class="btn2">
                   <br><br>
                <!-- -------------------------------------------------------------------------------------------------- -->

                <!-- NOME, EMAIL, PROFISSAO E DATANASCIMENTO SÃO VARIAVEIS QUE SERÃO REPASSADAS A PAGINA PROCESSA.PHP PELO METODO POST -->
                   Nome<br>
                   <input type="text" name="nome" class="campo" maxlength="40" required autofocus></br>
                   Email<br>
                   <input type="email" name="email" class="campo" maxlength="50" required autofocus></br>
                   Profissão<br>
                   <input type="text" name="profissao" class="campo" maxlength="40" required autofocus></br>                    
                   Data de Nascimento<br>
                   <input type="date" name="dataNascimento" class="campo" maxlength="40" required></br>
                   <br>
                   <input type="radio" id="masculino" name="genero" class="sexo" value="masculino">
                   <label for="masculino">Masculino</label><br>
                   <input type="radio" id="feminino" name="genero" class="sexo" value="feminino">
                   <label for="feminino">Feminino</label><br>
                <!-- ----------------------------------------------------------------------------------------------------------------- -->  
               
                <br>
                </form>
            </section>

    </body>
</html>
