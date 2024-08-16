<?php

$erro = null;

if($_GET){
  if($_GET['erro']){
    $erro = $_GET['erro'];
  }
}


?>
<html>
    <head>
        <title>Login | Medify</title>
        <link rel="stylesheet" href="index.css">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/15c9b739e8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="overlay">
        <section class="container">
            <section>
                    
               <form action="backend/login/login.php" method="post">
                <p class="titulo">Bem vindo</p>
                <p class="titulo">    à    </p>
                <p class="tituloo"> Medify </p>
                
                   <!--<h1> Medify </h1>--> 
                 <i class="fa-solid fa-user"></i>
                 <input
                  type="text"
                  placeholder="E-mail ou número de telefone"
                  class="Grande" name="usuario"/>
                <i class="fa-solid fa-lock"></i>
                 <input type="password" placeholder="Senha" class="Grande" name="senha"/>
                 <?php

               if($erro != null){
                switch($erro){
                  case '401';
                    echo("<p class=\"erro\">Usuário ou senha inválidos</p>");
                    break;
                  case '500';
                    echo("<p class=\"erro\">Erro no servidor, tente novamente mais tarde</p>");
                    break;
                }
               }
               ?>
                 <button class="Entrar" type="submit">Entrar</button>
                 <p class="pp">Esqueceu a senha?</p>
                 <hr class="risco" />
                 <button type="submit" class="criar">Registre-se</button>
               </form>
               
            </section>
          </section>
          
    </div>
    </body>
</html>