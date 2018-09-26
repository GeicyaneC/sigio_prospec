<?php
    $verEmpresa = $EmpresaDAO->exibirEmpresas();
        if($verEmpresa == true){
            for($i = 0; $i < mysqli_num_rows($verEmpresa); $i++){
                $linhaVerEmpresa = mysqli_fetch_array($verEmpresa);
                    echo '
                        <div class="modal fade" id="modal-ver'.$linhaVerEmpresa['id'].'" tabindex="-1" role="dialog" aria-labelledby="modal-ver'.$linhaVerEmpresa['id'].'" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Código da Empresa: '.$linhaVerEmpresa['id'].'</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="cnpj">CNPJ</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['cnpj'].'">
                                            </div>

                                            <div class="col-sm-8">
                                                <label for="razao_social">Razão Social</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['razao_social'].'">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="nome_fantasia">Nome Fantasia</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['nome_fantasia'].'">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="endereco">Endereço</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['endereco'].'">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="bairro">Bairro</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['bairro'].'">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="cidade">Cidade</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['cidade'].'">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['telefone'].'">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="celular">Celular</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['celular'].'">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="contato">Contato Responsável</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['contato'].'">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="status">Status</label>
                                                <input type="text" class="form-control" readonly value="'.$linhaVerEmpresa['status'].'">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="observacao">Observações</label>
                                                <textarea class="form-control" name="observacao" rows="2" readonly>'.$linhaVerEmpresa['observacao'].'</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
            }
        }else{
            echo 'Não existem dados para serem exibidos!';
        }
