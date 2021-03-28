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
                <h1 id="cadastroUsuario" class="titulos">Cadastro Para Manutenção</h1>
                <br><br>
                <!-- LINK COM A PAGINA PROCESSAEQUIPAMENTO.PHP QUE IRÁ SUBMETER OS DADOS AO BANCO E CRIAÇÃO DOS BOTÕES PARA ENVIO-->
                <form method="post" action="processaEquipamento.php">
                   <input type="submit" value="Salvar" class="btn2">
                   <input type="reset" value="Limpar" class="btn2">
                   <br><br>
                <!-- ----------------------------------------------------------------------------------------------------------- -->

                <!-- MARCA, PROBLEMACITADO, DATARECEBIMENTO SÃO VARIAVEIS QUE SERÃO REPASSADAS A PAGINA PROCESSAEQUIPAMENTO.PHP PELO METODO POST -->
                   Tipo<br>
                   <input type="text" name="tipo" class="campo" maxlength="40" required autofocus></br>
                   Marca<br>
                   <input type="text" name="marca" class="campo" maxlength="40" required autofocus></br>
                   Modelo<br>
                   <input type="text" name="modelo" class="campo" maxlength="40" required autofocus></br>
                   Problema Citado<br>
                   <input type="text" name="problemaCitado" class="campo" maxlength="50" required autofocus></br>
                   Data do recebimento<br>
                   <input type="date" name="dataRecebimento" class="campo" maxlength="40" required autofocus></br>
                   Observação<br>
                   <textarea name="observacao" class="campo" maxlength="800" autofocus></textarea></br>
                <!-- ---------------------------------------------------------------------------------------------------------------------------- --> 

                <!-- CAIXA DE SELEÇÃO DE CLIENTES PREVIAMENTE CADASTRADOS NO SISTEMA, ESSE SELECT RETORNA NA TELA OS NOMES E RETORNA PARA SI O VALOR DO ID DESSE CLIENTE,  -->
                <!-- ESSE ID POR SUA VEZ É REPASSADO A PAGINA PROCESSAEQUIPAMENTO PARA INSERÇÃO NO BANCO DE DADOS  -->
                   Pessoa Cadastrada:<br> 
                                <select name="select_pessoas_cadastradas">
                                    <option id="selecionador">Selecione uma pessoa</option>
                                    <?php
                                        include_once("conexao.php");
                                        $query_pessoas_cadastradas = "SELECT * FROM usuarios;"; 
                                        $resultado_pessoas_cadastradas = mysqli_query($conexao, $query_pessoas_cadastradas);
                                        while ($row_pessoas_cadastradas = mysqli_fetch_assoc($resultado_pessoas_cadastradas)) { ?>
                                            <option value="<?=$row_pessoas_cadastradas['codigo'];?>"><?=$row_pessoas_cadastradas['nome'];?>
                                            </option> <?php
                                        }
                                    ?>
                                </select>
                <!-- -----------------------------------------------------------------------------------------------------------------------------------------------------  -->
                                     
                    <br><br>
                </form>
            </section>

    </body>
</html>
