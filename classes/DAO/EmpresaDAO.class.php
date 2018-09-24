<?php
class EmpresaDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($Empresa) {
        $sql = "INSERT INTO empresa (cnpj, razao_social, nome_fantasia, endereco, bairro, cidade, contato, telefone, celular, status, observacao) VALUES("
                . "'" . $Empresa->getCnpj() . "', "
                . "'" . $Empresa->getRazaoSocial() . "', "
                . "'" . $Empresa->getNomeFantasia() . "', "
                . "'" . $Empresa->getEndereco() . "', "
                . "'" . $Empresa->getBairro() . "', "
                . "'" . $Empresa->getCidade() . "', "
                . "'" . $Empresa->getContato() . "', "
                . "'" . $Empresa->getTelefone() . "', "
                . "'" . $Empresa->getCelular() . "', "
                . "'" . $Empresa->getStatus() . "', "
                . "'" . $Empresa->getObservacao() . "'"
                . ")";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function consultar($Empresa) {
        $sql = "SELECT * FROM empresa WHERE id = '$Empresa'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if(mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }
    
    public function alterar($id,$cnpj,$razao_social,$nome_fantasia,$endereco,$bairro,$cidade,$contato,$telefone,$celular,$status,$observacao){
        $sql = "UPDATE empresa SET cnpj = '$cnpj', razao_social = '$razao_social', nome_fantasia = '$nome_fantasia', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade',
               contato = '$contato', telefone = '$telefone', celular = '$celular', status = '$status', observacao = '$observacao'
               WHERE id = '$id'";
        if(mysqli_query($this->conexao->getCon(), $sql)){
            return true;
        }else{
            return false;
        }
                
    }
    
    public function exibirEmpresas(){
        $sql = "SELECT * FROM empresa ORDER BY id";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if(mysqli_num_rows($resultado) > 0){
            return $resultado;
        }else{
            return false;
        }
                
    }
    
    public function consultarId($id){
        $sql = "SELECT * FROM empresa WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if(mysqli_num_rows($resultado) > 0){
            return $resultado;
        }else{
            return false;
        }
                
    }
    
    public function deletar($Empresa){
        $sql = "DELETE FROM empresa WHERE id = '$Empresa'";
        if(mysqli_query($this->conexao->getCon(), $sql)){
            return true;
        }else{
            return false;
        }
                
    }
}
