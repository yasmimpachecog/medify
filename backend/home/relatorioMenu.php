<?php

//requer conexão com o banco de dados
require_once '../../backend/database/conexao.php';

//inicia a estruturra de mensagem
$mensagem_erro = '';

//inicia a estruturra de tentativa try
try{
    //prepara a query SQL para execução
    $preparo = $conexao->prepare("
    select 
     
    
     ");
     //Executa a query
     $preparo->execute();

     //coloca o resultado em um array usando o fetch_assoc
     $relatorio = $preparo->fetchAll();

     // #### testar se deu certo, remover depois ####
     //foreach($relatorio as $linha){
     //  print_r($linha);
     //}


}catch(PDOException $erro){
    //imprime o erro na tela
    print_r($erro);
    //coloca que deu erro na variavel mensagem_erro
    $mensagem_erro = 'erro';
}
?>