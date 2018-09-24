<?php
    session_start();
        if(!(isset($_SESSION['usuario']))){
            header("location: index.php");
        }
        
    include './classes/conexao.class.php';
    include './classes/DAO/EmpresaDAO.class.php';
    include './classes/entidades/Empresa.class.php';
    
    $EmpresaDAO = new EmpresaDAO();
    $Empresa = new Empresa();
    
    require_once './actions/inserirEmpresa.action.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIGIO - PAINEL</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.painel.css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.3.1.slim.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
    </head>
<body>
    
    <div class="panelbar">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-inserir">Novo Registro</button>
    </div><!--panelbar-->
    
    <div class="tabela-dados">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $listarEmpresas = $EmpresaDAO->exibirEmpresas();
                        if($listarEmpresas == true){
                            for($i = 0; $i < mysqli_num_rows($listarEmpresas); $i++){
                            $linhaListarEmpresas = mysqli_fetch_array($listarEmpresas);
                            echo "

                                <tr>
                                    <th>".$linhaListarEmpresas['id']."</th>
                                    <td>".$linhaListarEmpresas['cnpj']."</td>    
                                    <td>".$linhaListarEmpresas['razao_social']."</td>
                                    <td>".$linhaListarEmpresas['nome_fantasia']."</td>
                                    <td>".$linhaListarEmpresas['telefone']."</td>
                                    <td>".$linhaListarEmpresas['celular']."</td>
                                    <td>".$linhaListarEmpresas['contato']."</td>
                                    <td>".$linhaListarEmpresas['status']."</td>
                                    <td>
                                        <button type='button' class='btn btn-primary btn-sm'>Visualizar</button>
                                        <button type='button' class='btn btn-secondary btn-sm'>Editar</button>
                                        <button type='button' class='btn btn-danger btn-sm' onclick=''>Excluir</button>
                                    </td>
                                </tr>

                                 ";
                            }
                        }else{
                            echo 'Não existem dados para serem exibidos!';
                        }
                ?>
            </tbody>
        </table>
    </div><!--tabela-dados-->
    
    <div class="modal fade" id="modal-inserir" tabindex="-1" aria-labelledby="modal-inserir" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Inserir Novo Registro</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <form action="painel.php" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj">
                            </div>

                            <div class="col-sm-8">
                                <label for="razao_social">Razão Social</label>
                                <input type="text" class="form-control" name="razaosocial" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nome_fantasia">Nome Fantasia</label>
                                <input type="text" class="form-control" name="nomefantasia" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" name="endereco">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" name="bairro">
                            </div>

                            <div class="col-sm-6">
                                <label for="cidade">Cidade</label>
                                <select class="custom-select" name="cidade" required="">
                                    <option selected>Selecione a Cidade</option>
                                    <option value="Jaboatão dos Guararapes">Jaboatão dos Guararapes</option>
                                    <option value="Recife">Recife</option>
                                    <option value="Olinda">Olinda</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" name="telefone" required>
                            </div>

                            <div class="col-sm-3">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" required>
                            </div>

                            <div class="col-sm-2">
                                <label for="contato">Contato</label>
                                <input type="text" class="form-control" name="contato" required>
                            </div>

                            <div class="col-sm-4">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status" required>
                                    <option selected>Selecione o Status</option>
                                    <option value="Contato Futuro">A Contatar</option>
                                    <option value="Contato Feito">Contato Feito</option>
                                    <option value="Contato Interrompido">Contato Interrompido</option>
                                    <option value="A Visitar">A Visitar</option>
                                    <option value="Visitado">Visitado</option>
                                    <option value="A Fechar">A Fechar</option>
                                    <option value="Fechado">Fechado</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="observacao">Observações</label>
                                <textarea class="form-control" name="observacao" rows="2"></textarea>
                            </div>
                        </div>
                    </div><!--modal-body-->
                
            
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary btn-sm" value="Limpar Campos">
                        <input type="submit" class="btn btn-primary btn-sm" name="cadastrar" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    </body>
</html>
