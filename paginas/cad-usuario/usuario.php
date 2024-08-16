<?php
//inclue o relatorio de usuario
include_once '../../backend/usuario/relatorioUsuario.php';



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
        <title>Usuario | Medify</title>
        <link rel="stylesheet" href="usuario.css">
        <link rel="stylesheet" href="../../componetes/menu/menu.css">
    </head>
    <body>
        <?php
            include_once '../../componentes/menu/menu.php';
        ?>
        <section class="pagina">
            <header>
                <h1>Administração | Cadastro de Usuário</h1>
            </header>
            <form action="../../backend/usuario/criarUsuario.php" method="post">
                <div class="inputs">
                    <input type="text" name="nome" placeholder="Nome">
                    <input type="text" name="sobrenome" placeholder=" Sobrenome">
                    <input type="text"name="endereco" placeholder="Endereço">
                <div class="linha">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="telefone" placeholder="Telefone">
                </div>
                <div class="linha">
                    <input type="text" name="usuario" placeholder="Usuário">
                    <select name="tipo">
                        <option value="">Tipo de Usuário</option>
                        <option value="300">Adiministrador</option>
                        <option value="301">Normal</option>
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
                        <th>Telefone</th>
                        <th>Login</th>
                        <th>Cargo</th>
                    </tr>  
                    <?php
                    
                    //Utilizar a função foreach
                    //para iterar entre os itens do array
                    //que é o nosso $relatorio

                    foreach($relatorio as $usuario){
                        echo("
                            <tr>
                                <td><button class=\"excluir\">Excluir</button></td>
                                <td>".$usuario['id']."</td>
                                <td>".$usuario['nome']." ".$usuario['sobrenome']."</td>
                                <td>".$usuario['telefone']."</td>
                                <td>".$usuario['login']."</td>
                                <td>".$usuario['descricao']."</td>
                            </tr>
                        ");
                    };

                    ?>
                </table>

            </div>
    </section>
    </body>
</html>