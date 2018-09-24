<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LOGIN - SIGIO PROSPEC</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.login.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
</head>
    
<body>
    
    <div class="pg-centro">
        
        <div class="title">
            <h3 class="text-muted">Login</h3>
	</div>
        
        <div class="login">
            <form action="" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="usuario" name="usuario" placeholder="Usuário" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Logar">

            </form>
        </div>
        
        <div class="loginExceptions">
            <?php
                if ($_GET){
                    if (isset($_GET['loginErro'])){
                        echo 'Usuário ou Senha incorretos!';
                    }
                }
            ?>
        </div>
        
    </div>
        <?php
            if ($_POST){
                include './classes/Conexao.class.php';
                include './classes/DAO/UsuarioDAO.class.php';
                
                $usuarioDAO = new UsuarioDAO();
                
                $usuario = $_POST['usuario'];
                $senha = md5($_POST['senha']);
                
                $user = $usuarioDAO->login($usuario, $senha);
                
                if ($user == true){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['senha'] = $senha;
                    header("location: painel.php");
                }else{
                    header("location: index.php?loginErro");
                }
            }
        ?>
    
    </body>
</html>