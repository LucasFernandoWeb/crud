<?php
require_once('classes/crud.php');

$crud = new crud;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciar Usuarios</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/js/crud.js"></script>
    <script src="assets/js/chamaAjax.js"></script>
    <script src="assets/js/pagination.js"></script>
    <script src="assets/js/function.js"></script>
    <script src="assets/js/getDados.js"></script>
</head>

<body>

    <header class="header clierfix">
        <div class="container-brand">
            <h1 class="brand">Header-Generica</h1>
        </div>

        <nav class="navbar">
            <ul class="nav-menu">
                <li class="menu-item">
                    <a href="#" class="menu-link">Infomações</a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link open-modal" data-open-modal="1">Empresa</a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">Gerenciar Clientes</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container-display">
        <div class="container-title">
            <h1 class="title">Gerenciar usuarios</h1>
            <h4 class="subtitle">Gerenciar seus usuários nunca foi tão fácil, adicione ou exclua usuários em um click.
            </h4>
        </div>

        <form class="form-adicionarUsuarios" id="form-add-usuarios">
            <div class="form-group">
                <input type="text" name="nome" class="form-input" placeholder="Nome do usuario" id="nomeUsuario"
                    requerid>
                <input type="email" name="email" class="form-input" placeholder="Email do usuario" id="emailUsuario"
                    requerid>
                <button type="submit" class="btn form-btn" id="adicionarUsuarios">Adicionar usuario</button>
                <div class="msg-erro"></div>
            </div>
        </form>
        <div class="container-table">
            <div class="box-table" style="overflow: auto;">
                <table class="table table-resp">
                    <thead>
                        <tr>
                            <th class="th-id">Id</th>
                            <th class="th-nome">Nome</th>
                            <th class="th-email">email</th>
                            <th class="th-acao">Ação</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr></tr>
                    </tbody>


                </table>
            </div>
            <div class="pagination-content">
                <span class="pagination-item" id="1">1</span>
            </div>
        </div>
    </main>

    <div class="modal" id="modal-1">

        <div class="modal-content">

            <div class="modal-header">

                <div class="btn-close-modal">x</div>

                <h3 class="modal-title">Alterar dados do usuario</h3>

            </div>
            <div class="modal-body">
                <p class="description">

                    Altere os dados de maneira simples, digite os novos valores e salve. Em alguns segundos os dados já
                    estaram disponiveis novamente.

                </p>
                <form class="form" class="form-alterar-dados">

                    <div class="form-group">

                        <input type="text" name="alterarNome" class="form-input" placeholder="Nome do usuario"
                            id="alterarNomeUsuario" requerid>
                        <input type="email" name="alterarEmail" class="form-input" placeholder="Email do usuario"
                            id="alterarEmailUsuario" requerid>
                        <button type="submit" class="btn form-btn" id="alterarDados">Alterar Dados</button>
                        <div class="msg-erro-alterar"></div>

                    </div>

                </form>

            </div>
        </div>
    </div>


        <!-- delete -->

        <div class="container-delete">

            <div class="modal" id="modal-2">
                <div class="modal-content">
                    <div class="modal-header">

                        <div class="btn-close-modal">x</div>

                    </div>
                    <div class="modal-body">

                        <div class="box-consulta">

                            <h3 class="title">Você deseja realmente deletar este usuario?</h3>
                            <div class="btn-group">

                                <button class="btn btn-delete" id="deletarUsuarioTrue">Deletar</button>
                                <button class="btn btn-cancelar" id="btn-close-modal">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    </div>

    <script>
    </script>

</body>

</html>