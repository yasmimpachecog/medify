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
        v.id,
        v.metodo_pagamento,
        v.dt_venda,
        v.cliente,
        v.tb_situacao_id,
        s.descricao as ds_situacao
    from tb_venda v
        inner join tb_situacao s on s.id = v.tb_situacao_id
        
    
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