<?php
class UsuarioDAO {
    private $conexao;
    
    public function __construct() {
        $this->conexao = new Conexao();
    }
    
    public function login($usuario, $senha){
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$senha'";
        
        $executa = mysqli_query($this->conexao->getCon(), $sql);
        
        if (mysqli_num_rows($executa) > 0){
            return true;
        }else{
            return false;
        }
    }
}
