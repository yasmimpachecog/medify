<?php
//Requer conexão com o banco de dados
require_once '../database/conexao.php';

//Coloca todas as informações recibidas via POST
//em uma variavel para ser utilizada posteriormente
$requisicao= $_POST;
$senha = sha1('123Mudar!');

//Utiliza uma estrutura de tentativa para tentar
//inserir as informações no banco de dados
try{ 
    //Utiliza o método prepare() da variavel conexão(que está disponivel
    //no arquivo por meio do require_once),para preparar um instrução
    //sql (banco de dados).
  $preparacao=$conexao->prepare("
  insert into tb_medicamento(
    nome,controlado,alta_vigilancia,valor,ativo
  ) values (
    :nome,:controlado,:alta_vigilancia,:valor,:ativo
  )
  ");
  //Utiliza o método bindParam da classe PreparedStatement dísponivel
  //na variavel preparação, que recebeu a preparação acima.
  //A função bindParam troca um dos parametros da instrução sql pelo
  //valor contido em uma variável.Não esquecer de mudar o tipo no
  // ultimo argumento.
  $preparacao->bindParam(':nome',$requisicao['nome'],PDO::PARAM_STR);
  $preparacao->bindParam(':alta_vigilancia',$requisicao['Alta_ vigilancia'],PDO::PARAM_STR);
  $preparacao->bindParam(':controlado',$requisicao['controlado'],PDO::PARAM_STR);
  $preparacao->bindParam(':valor',$requisicao['valor'],PDO::PARAM_STR);
  $preparacao->bindParam(':ativo',$requisicao['ativo'],PDO::PARAM_INT);
 //Ao final da troca  dos parametros, estamos prontos para executar
 //a instrução por isso utilizamos o método execute() da classe
 //PreparedStatement
  $preparacao->execute();
  //Ao executar,precisamos verificar se o valor foi de fato
  //inserido no banco de dados,para isso verificamos se o valor do
 //rowCount() é igual a 1 (quantidade de linhas que forma inseridas)
    if($preparacao->rowCount()==1){
        //Caso isso seja positivo, retorna para a pagina de cadastro
        //com o status 201 (Created )
        header(
            'location:../../paginas/cad-medicamentoS/med.php?status=201' );
            //Morre a execução para evitar lacunas de segurança.
            die();

    }else{
        //Caso a quantidade não seja 1, retorna  com os status 
        //400 (Bad Request),informando que faltou algo
        header(
            'location:../../paginas/cad-medicamentoS/med.php?status=500');
            //Morre a execução para evitar lacunas de segurança
            die();
    }
}catch(PDOException $erro){
    //Executa caso receba algum erro
    //Volta para a página de cadastro e apresenta 
    //Um erro do tipo 500(Server Error)
    //header('location:../../paginas/cad-medicamentoS/med.php?status=500');
    print_r($erro->getMessage());
    //Morre a execução para evitar lacunas de segurança
    die();
}









?>