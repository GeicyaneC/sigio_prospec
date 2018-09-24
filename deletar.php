<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './classes/Conexao.class.php';
        include './classes/DAO/EmpresaDAO.class.php';
        include './classes/entidades/Empresa.class.php';
        
        $EmpresaDAO = new EmpresaDAO();
        $Empresa = new Empresa();
        $resultado = $EmpresaDAO->exibirEmpresas();
            
            if($resultado == false){
                echo 'Não existe empresa cadastrada!';
            }else{ echo '<form actcion="alterar.php method="GET">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CNPJ</th>
                                    <th>Razão Social</th>
                                    <th>Nome Fantasia</th>
                                    <th>Endereço</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Contato</th>
                                    <th>Telefone</th> 
                                    <th>Celular</th>
                                    <th>Status</th>
                                    <th>Observação</th>
                                </tr>
                            
                        
                       
                     ';
            }
            
        
        for ($i = 0; $i < mysqli_num_rows($resultado); $i++){
                    $linha = mysqli_fetch_array($resultado);
                    
                    echo "
                        <tr>
                            <td>".$linha['id']. "</td>
                            <td>".$linha['cnpj']. "</td>
                            <td>".$linha['razao_social']. "</td>
                            <td>".$linha['nome_fantasia']. "</td>
                            <td>".$linha['endereco']. "</td>
                            <td>".$linha['bairro']. "</td>
                            <td>".$linha['cidade']. "</td>
                            <td>".$linha['contato']. "</td>
                            <td>".$linha['telefone']. "</td>
                            <td>".$linha['celular']. "</td>
                            <td>".$linha['status']. "</td>
                            <td>".$linha['observacao']. "</td>
                            <td> <a href='deletar.php?id=" . $linha['id'] . "'>Excluir</a></td>
                        

                        ";
                }
                echo "</thead>
                      </table>
                      </form>
                      

                ";
                
                if($_GET){
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        
                        $resultadoConsulta = $EmpresaDAO->consultarId($id);
                        for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++){
                        $linha = mysqli_fetch_array($resultadoConsulta);
                        $cnpj = $linha['cnpj'];
                        $razaoSocial = $linha['razao_social'];
                        $nomeFantasia = $linha['nome_fantasia'];
                        $endereco = $linha['endereco'];
                        $bairro = $linha['bairro'];
                        $cidade = $linha['cidade'];
                        $contato = $linha['contato'];
                        $telefone = $linha['telefone'];
                        $celular = $linha['celular'];
                        $status = $linha['status'];
                        $observacao = $linha['observacao'];

                        }
                        echo '<h2>Excluir Informações</h2>
                               
                            <form action="deletar.php" method="POST">
                               CNPJ: <input type="text" name="cnpj" value="'.$cnpj.'">
                               Razão Social: <input type="text" name="razaosocial" value="'.$razaoSocial.'">
                               Nome Fantasia: <input type="text" name="nomefantasia" value="'.$nomeFantasia.'">
                               Endereço: <input type="text" name="endereco" value="'.$endereco.'">
                               Bairro: <input type="text" name="bairro" value="'.$bairro.'">
                               Cidade: <input type="text" name="cidade" value="'.$cidade.'">
                               Contato: <input type="text" name="contato" value="'.$contato.'">
                               Telefone: <input type="text" name="telefone" value="'.$telefone.'">
                               Celular: <input type="text" name="celular" value="'.$celular.'">
                               Status: <input type="text" name="status" value="'.$status.'">
                               Observação: <input type="text" name="observacao" value="'.$observacao.'">
                               
                               <input type="submit" value="excluir" name="excluir">
                            </form>
                            ';
                        
                            $_SESSION['id'] = $id;
                    }
                    
                }
        
        if($_POST){
                    $id = $_SESSION['id'];
                    $cnpj = $_POST['cnpj'];
                    $razaoSocial = $_POST['razaosocial'];
                    $nomeFantasia = $_POST['nomefantasia'];
                    $endereco = $_POST['endereco'];
                    $bairro = $_POST['bairro'];
                    $cidade = $_POST['cidade'];
                    $contato = $_POST['contato'];
                    $telefone = $_POST['telefone'];
                    $celular = $_POST['celular'];
                    $status = $_POST['status'];
                    $observacao = $_POST['observacao'];
                    
                if($_POST['excluir']){
                    $resultadoDeletar = $EmpresaDAO->deletar($id, $cnpj, $razaoSocial, $nomeFantasia, $endereco, $bairro, $cidade, $contato, $telefone, $celular, $status, $observacao);
                    if($resultadoDeletar == true){
                        echo 'Dados Excluídos com Sucesso!';
                    }else{
                        echo 'Os Dados não foram Excluídos! ';
                    }
                }
                 
                }
        ?>
    </body>
</html>
