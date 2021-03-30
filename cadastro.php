<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RussianCorp</title>
    <link rel="stylesheet" href="_css/styleLoginPage.css">
    <link rel="icon" type="image/jpg" href="_css/icon.ico" />
  </head>
  <body>

<form action="processaCadastro.php" class="box" method="POST">
  <h1>Cadastro :D</h1>
  <input type="text" name="usuarioo" placeholder="Username">
  <input type="text" name="emaill" placeholder="Email">
  <input type="password" name="senhaa" placeholder="Password">
  <input type="submit" name="enviar" value="Cadastrar">
  <input type="button" onclick="location.href='index.php'" name="enviar" value="Retornar">
</form>


<!--A SESSION CONTADOR RECEBER TRUE SE O ROW4 EM PROCESSA CADASTRO RETORNAR ALGUM VALOR MAIOR QUE 0 (SIGNIFICA QUE JA EXISTE UM EMAIL IGUAL CADASTRADO NO BANCO, SE ELA RECEBE TRUE ELA ABRE ESSA DIV)-->
<?php
if(isset($_SESSION['contador'])):
?>
  <div class="notificacao3">
  <p>Email já Cadastrado</p>
  </div>
<?php  
endif;
unset($_SESSION['contador']);
?>

  </body>
</html>
