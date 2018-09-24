<?php 
    if($_POST){
        if($_POST['cadastrar']){
            $cnpj         = $_POST['cnpj'];
            $razaoSocial  = $_POST['razaosocial'];
            $nomeFantasia = $_POST['nomefantasia'];
            $endereco     = $_POST['endereco'];
            $bairro       = $_POST['bairro'];
            $cidade       = $_POST['cidade'];
            $contato      = $_POST['contato'];
            $telefone     = $_POST['telefone'];
            $celular      = $_POST['celular'];
            $status       = $_POST['status'];
            $observacao   = $_POST['observacao'];  

            $Empresa->setCnpj($cnpj);
            $Empresa->setRazaoSocial($razaoSocial);
            $Empresa->setNomeFantasia($nomeFantasia);
            $Empresa->setEndereco($endereco);
            $Empresa->setBairro($bairro);
            $Empresa->setCidade($cidade);
            $Empresa->setContato($contato);
            $Empresa->setTelefone($telefone);
            $Empresa->setCelular($celular);
            $Empresa->setStatus($status);
            $Empresa->setObservacao($observacao);

            $resultado = $EmpresaDAO->inserir($Empresa);
                if($resultado == true){
                    header('location: painel.php');
                }else{
                    echo 'Falha ao Inserir Usuário';
                }
        }
    }