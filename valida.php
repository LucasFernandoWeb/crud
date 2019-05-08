<?php

require_once('classes/crud.php');


function retornArray($select)
{

    foreach ($select as $users) {
        
        $arrayCom[] = $users;
       
    }

    return $arrayCom;
}


if(!isset($_POST['nome']) & !isset($_POST['email'])){
    header('Location: login.php');
}
else{
    if(empty($_POST['nome']) & empty($_POST['email'])){
        echo 'Não deixe campos em branco';
    }else{

        $nomeUsuario = $_POST['nome'];
        $emailUsuario = $_POST['email'];
        $nomeUsuario = htmlspecialchars($nomeUsuario);
        $emailUsuario = htmlspecialchars($emailUsuario);

        $crud = new Crud;
        $insere = $crud->insert('usuarios', 'nome = ?, email = ?')->run([$nomeUsuario, $emailUsuario]);
        
        if($insere){
            $array = retornArray($crud->selectAll('*','usuarios')->run([]));
            echo json_encode($array);
        }else{
            echo "Erro ao cadastrar usuario.";
        }

    }
}

