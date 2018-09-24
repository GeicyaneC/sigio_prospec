<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="consultar.php" method="POST">
            <input type="text" name="consultar">
            <input type="submit" name="pesquisar" value="Pesquisar">
        </form>
        <?php
            if($_POST){
                if($_POST['pesquisar']){
                    include './classes/Conexao.class.php';
                    include './classes/DAO/EmpresaDAO.class.php';
                    
                    $Empresa = $_POST['consultar'];
            
                    $EmpresaDAO = new EmpresaDAO();
                    $resultado = $EmpresaDAO->consultar($Empresa);
                    
                    if($resultado == true){
                    
                        for($i = 0; $i < mysqli_num_rows($resultado); $i++){
                            $linha = mysqli_fetch_array($resultado);

                            echo $id[$i] = $linha['id'] . '<br>';
                            echo $cnpj[$i] = $linha['cnpj'] . '<br>';
                            echo $razaoSocial[$i] = $linha['razao_social'] . '<br>';
                            echo $nomeFantasia[$i] = $linha['nome_fantasia'] . '<br>';
                            echo $endereco[$i] = $linha['endereco'] . '<br>';
                            echo $bairro[$i] = $linha['bairro'] . '<br>';
                            echo $cidade[$i] = $linha['cidade'] . '<br>';
                            echo $contato[$i] = $linha['contato'] . '<br>';
                            echo $telefone[$i] = $linha['telefone'] . '<br>';
                            echo $celular[$i] = $linha['celular'] . '<br>';
                            echo $status[$i] = $linha['status'] . '<br>';
                            echo $observacao[$i] = $linha['observacao'] . '<br>';
                        }
                    
                    }else{
                        echo "Nenhum Resultado foi Encontrado!";
                    }
                }
            }
            
            
        ?>
    </body>
</html>
