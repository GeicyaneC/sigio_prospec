<?php
class Empresa {
    private $cnpj;
    private $razaoSocial;
    private $nomeFantasia;
    private $endereco;
    private $bairro;
    private $cidade;
    private $contato;
    private $telefone;
    private $celular;
    private $status;
    private $observacao;
    
    function getCnpj() {
        return $this->cnpj;
    }

    function getRazaoSocial() {
        return $this->razaoSocial;
    }

    function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getContato() {
        return $this->contato;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getStatus() {
        return $this->status;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }


    
}
