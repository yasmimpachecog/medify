<?php
//Inclui o relatório de usuários
include_once '../../backend/venda/relatorioVenda.php';


//Inicializa uma variavel com nome de mensagem com valor null
$mensagem = null;
//Verifica se recebeu alguma informação por meio de GET
if ($_GET) {
  // Verifica se essa informção é um status
  if ($_GET['status']) {
    //Utiliza a estrutura de decisão switch para verificar qual
    //status foi recebido e atribuir uma mensagem conforme necessário
    switch ($_GET['status']) {
      case 201:
        //Criado
        $mensagem = 'Adicionado com sucesso!';
        break;
      case 400:
        //Bad Request
        $mensagem = 'Inserção não funcionou';
        break;
      case 500:
        //Erro no servidor
        $mensagem = 'Erro ao tentar inserir informações';
        break;

    }
  }
}
?>

<html>

<head>
  <title>Venda | Medify</title>
  <link rel="stylesheet" href="venda.css" />
  <link rel=stylesheet href="../../cad-venda/venda.php">
</head>

<body>
  <?php
  include_once '../../componentes/menu/menu.php';
  ?>
  <section class="pagina">
    <header>
      <h1>Venda | Medicamentos<h1>
    </header>
    <form action="../../backend/venda/criarVenda.php" method="post">

      <div class="inputs">
        <div class="linha">
          <input type="date" name="dt_venda" placeholder="Data de Venda">
        </div>
        <div class="linha">
          <input type="date" name="dt_pagamento" placeholder="Data de Pagamento">
        </div>
        <div class="linha">
          <input type="text" name="cliente" placeholder="Cliente">
          
        </div>
        <div class="linha">
            <select name="metodo_pagamento">
              <option value="">Pagamento</option>
              <option value="Crédito">Crédito</option>
              <option value="Débito">Débito</option>
              <option value="Dinheiro">Dinheiro</option>
              <option value="Pix">Pix</option>
              <select>

          </div>
          <div class="linha">
            <select name="situacao">
              <option value="">Situação</option>
              <option value="1">Pendente</option>
              <option value="2">Em Processo</option>
              <option value="3">Finalizado</option>
              <select>

          </div>
        <div class="controles">
          <button type="subimit" class="salvar">Salvar</button>
          <button type="reset" class="cancelar">Cancelar</button>

          <?php
          echo ('<p>' . $mensagem . '</p>');
          ?>
        </div>
    </form>
    <div class="relatorio">
      <h1>Relatório</h1>
      <table>
        <tr>
          <th>Ação</th>
          <th>Id</th>
          <th>Data de Venda</th>
          <th>Situação</th>
          <th>Método de Pagamento</th>
          <th>Cliente</th>
        </tr>

        <tr>
          <td><button>Excluir</button></td>
          <td>1</td>
          <td>07/08/2024</td>
          <td>07/08/2024</td>
          <th>Débito</th>
          <td></td>

        </tr>
        <?php
        //Utilizar a função foreach
        //para interar entre os itens do array
        //que é o nosso $relatorio
        foreach ($relatorio as $Venda) {
          echo ("
              <tr>
          <td><button>Excluir</button></td> 
          <td>" . $Venda['id'] . "</td> 
          <td>" . $Venda['dt_venda'] . "</td> 
          <td>" . $Venda['ds_situacao'] . "</td> 
          <td>" . $Venda['metodo_pagamento'] . "</td> 
          <td>" . $Venda['cliente'] . "</td> 
     
        </tr>
          ");
        }