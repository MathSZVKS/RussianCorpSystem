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

<?php
if(isset($_SESSION['nao_autenticado'])):
?>
  <div class="notificacao">
  <p>Ops! Usuário ou senha inválidos</p>
  </div>
<?php  
endif;
unset($_SESSION['nao_autenticado']);
?>

<?php
if(isset($_SESSION['cadastrado'])):
?>
  <div class="notificacaoCadastrado">
  <p>Usuário Cadastrado</p>
  </div>
<?php  
endif;
unset($_SESSION['cadastrado']);
?>

<form action="login.php" class="box" method="POST">
  <h1>Login</h1>
  <input type="text" name="usuario" placeholder="Username">
  <input type="password" name="senha" placeholder="Password">
  <input type="submit" name="enviar" value="Login">
  <input type="button" onclick="location.href='cadastro.php'" name="enviar" value="Cadastre-se">
</form>





  </body>
</html>
