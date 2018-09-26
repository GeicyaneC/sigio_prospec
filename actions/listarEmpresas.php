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
                        <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-ver".$linhaListarEmpresas['id']."'>Visualizar</button>
                        <button type='button' class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#modal-editar".$linhaListarEmpresas['id']."'>Editar</button>
                        <button type='button' class='btn btn-danger btn-sm' onclick=''>Excluir</button>
                    </td>
                </tr>

                ";
        }
    }else{
        echo 'Não existem dados para serem exibidos!';
    }
