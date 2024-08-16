<?php
//inclue o relatorio de usuario
include_once '../../backend/medicamento/relatorioMedicamento.php';



//Inicializa uma variavel com nome de mensagem com o valor null
$mensagem= null;
//Verifica se recebeu alguma informação por meio de GET
if($_GET){
    //Verifica se essa informação é um status 
    if($_GET['status']){
        //Utiliza a estrutura de decisão switch para verificar qual
        //status foi recebido e atribuir uma messagem conforme necessário
        switch($_GET['status']){
            case 201:
                //Criado
                $mensagem='Adicionado com sucesso';
                break;
                case 400:
                    //Bad Request
                    $mensagem ='Incerção não funcionou';
                    break;
                    case 500:
                    //Erro no servidor
                    $mensagem='Erro ao tentar inserir informações';
                    break;
        }
    }
}
?>

<html>
    <head>
       <title>Medicamento | Medify</title>
       <link rel="stylesheet" href="med.css">
       <link rel="stylesheet" href="../../componetes/menu/menu.css">
    </head>

    <body>
        <?php
            include_once '../../componentes/menu/menu.php';
        ?>
        <section class="pagina">
            <header>
                <h1>Administração | Medicamentos</h1>
            </header>
            <form action="../../backend/medicamento/criarMedicamento.php" method="post">
                <div class="inputs">
                    <input type="text" name="nome" placeholder="Nome">
                <div class="linha">
                    <input type="text" name="valor" placeholder="Valor">
                </div>
                <div class="linha">
                    <select name="controlado">
                        <option value="">Controlado</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                    <select name="alta vigilancia">
                        <option value="">Alta Vigilancia</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                    <select name="ativo">
                        <option value="">ativo</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
                </div>
                
                <div class="controles">
                    <button type="subimit" class="salvar">Salvar</button>
                    <button type="reset" class="cancelar">Cancelar</button>
                    <?php
                    echo('<p>'.$mensagem.'</p>');
                    ?>
                </div>  
            </form>
            <div class="relatorio">
                <h1>relatório</h1>
                <table>
                    <tr>
                        <th>Ação</th>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Controlado</th>
                        <th>Alta Vigilancia</th>
                        <th>Ativo</th>
                    </tr> 
                    <?php
                    
                    //Utilizar a função foreach
                    //para iterar entre os itens do array
                    //que é o nosso $relatorio

                    foreach($relatorio as $med){
                        echo("
                            <tr>
                                <td><button class=\"excluir\">Excluir</button></td>
                                <td>".$med['id']."</td>
                                <td>".$med['nome']."</td>
                                <td>".$med['valor']."</td>
                                <td>".($med['controlado']==1?"Sim":"Não")."</td>
                                <td>".($med['alta_vigilancia']==1?"Sim":"Não")."</td>
                                <td>".($med['ativo']==1?"Sim":"Não")."</td>
                            </tr>
                        ");
                    };

                    ?>
                </table>

            </div>
    </section>
    </body>
</html>