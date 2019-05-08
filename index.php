<?php
include_once('classes/crud.php');

$crud = new crud;
// $crud->delete('usuarios','WHERE id = ?')->run([55]);

$paginationItens = 15;

function retornArray($select)
{

    foreach ($select as $users) {
        
        $arrayCom[] = $users;
       
    }

    return $arrayCom;
}

if(isset($_POST['tipo'])):

    if(!empty($_POST['tipo'])):

        $tipoRequisicao = $_POST['tipo'];

        if($tipoRequisicao == 'pagination'):

            $array = retornArray(retornArray($crud->selectAll('*','usuarios')->run([])));
            $countArray = count($array);

            if($countArray <= $paginationItens):

                echo 1;

            else:

                $paginationTamanho = $countArray / $paginationItens;
                $paginationTamanho = round($paginationTamanho);
                echo $paginationTamanho;

            endif;


        endif;



        if($tipoRequisicao == 'conteudo'):

            if(isset($_POST['pagId'])):

                if(!empty($_POST['pagId'])):

                    $pagId = $_POST['pagId'];

                else:

                    $pagId = 1;

                endif;

                $array = retornArray(retornArray($crud->selectAll('*','usuarios')->run([])));

                $countArray = count($array);

                $nunRetornoMin = ($pagId * $paginationItens) -  $paginationItens;
                $nunRetornoMax = ($pagId * $paginationItens);
                $i = $nunRetornoMin;


                for(;$i < $nunRetornoMax; $i++):

                    $link = '<a class="btn-acao open-modal"  data-open-modal="1" data-acao="acao=editar&id='.$array[$i]['id'].'">Editar</a><a class="btn-acao open-modal"  data-open-modal="2"  data-acao="acao=deletar&id='.$array[$i]['id'].'">Deletar</a>';

                    if($array[$i]['id'] != ''):

                        echo '
                        <tr>'
                           .'<td>'.$array[$i]['id'].'</td>'
                           .'<td>'.$array[$i]['nome'].'</td>'
                           .'<td>'.$array[$i]['email'].'</td>'
                           .'<td>'.$link.'</td>'.
   
                       '</tr>';

                    endif;
                   

                endfor;


            else:

                echo "Link Passado é invalido";

            endif;

        endif;
        
    
        
        if($tipoRequisicao == 'cadastro'):

            if(!empty($_POST['nome']) & !empty($_POST['email'])):

                $nomeUsuario = $_POST['nome'];
                $emailUsuario = $_POST['email'];

                $nomeUsuario = htmlspecialchars($nomeUsuario);
                $emailUsuario = htmlspecialchars($emailUsuario);

                $crud = new Crud;
                $insere = $crud->insert('usuarios', 'nome = ?, email = ?')->run([$nomeUsuario, $emailUsuario]);

                if($insere):

                echo true;                

                else:

                    echo "Erro ao cadastrar usuario.";
                
                endif;
                

            else:

                echo "Erro, os dados estão em brancos";

            endif;

            

        endif;



        if($tipoRequisicao == 'alterarDados'):

            if(!empty($_POST['alterarNome']) & !empty($_POST['alterarEmail']) & !empty($_POST['id'])):

                $idUsuario = $_POST['id'];
                $alterarNome = $_POST['alterarNome'];
                $alterarEmail = $_POST['alterarEmail'];

                $update = $crud->update('usuarios','nome = ?, email = ?','WHERE id = ?')->run([$alterarNome, $alterarEmail, $idUsuario]);

                if($update):

                    echo true;

                else:
                    echo 'Erro ao atualizar dados do usuario';

                endif;


            else:

                echo 'Erro ao alterar dados do usuario';

            endif;

        endif;



        if($tipoRequisicao == 'buscaDadosUsuarios'):

            if(!empty($_POST['id'])):

                $idUsuario = $_POST['id'];

                $respostaSelect = $crud->select('*','usuarios','WHERE id = ?')->run([$idUsuario])->fetch();
                
                if($respostaSelect):

                    echo json_encode($respostaSelect);

                else:

                    echo "Usuario não encontrado";
                    
                endif;



            else:

                echo 'O parâmetro passado é invalido';

            endif;

        endif;



        if($tipoRequisicao == 'deleteUsuario'):

            if(!empty($_POST['id'])):

                $id = $_POST['id'];

                $delete = $crud->delete('usuarios','WHERE id = ?')->run([$id]);

                if($delete):

                    echo true;

                else:
                
                    echo "Erro ao exluir usuario";

                endif;


            else:

                echo "Erro ao exluir usuario";

            endif;

        endif;





    else:

        echo "Erro tipo foi deixado em branco";
        exit();

    endif;

else:
    echo "Erro a variavel não foi setada";
    exit();
endif;
