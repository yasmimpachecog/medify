<?php

require_once '../database/conexao.php';

$usuario = $_POST["usuario"];
$senha = sha1($_POST["senha"]);

echo("O nome de usuário é: ".$usuario);
echo("E a senha é: ".$senha);




try{
    $estagio = $conexao->prepare('select id from tb_usuario where login = :usuario and senha = :senha');
    $estagio->bindParam(':usuario',$usuario,PDO::PARAM_STR);
    $estagio->bindParam(':senha',$senha,PDO::PARAM_STR);
    $estagio->execute();
    $resultado = $estagio->fetchAll();
     if(count($resultado)==1){
        // o usuario pode logar no sistema
        header('Location:../../paginas/home/home.php');
        die();
     }else{
        // Não Autenticado
        //header('Location:../../index.php?erro=401');
     }
}catch(PDOException $erro){
    echo('erro:'.$erro->getMessage());
    echo('erro:'.$erro->getMessage());
    //header('Location:../../index.php?erro=500');
    die();
}
?>