function buscaDadosUsuario(id)
{
    var dados = 'tipo=buscaDadosUsuarios&id='+id;
    return chamaAjax('index.php',dados,'POST');
}


function loadConteudo(paginationNun){

    if($.isNumeric(paginationNun) == false)
    {
        $('.msg-erro').html('Erro: parâmetro invalido');
        return false;
    }

    var dados = 'tipo=conteudo&pagId='+paginationNun;
    var loadConteudo = chamaAjax('index.php',dados,'POST');


    loadConteudo.done(function(resposta)
    {
        $('table').append('<tr><td class="loading" colspan="4"><div class="loading-table">Carregando..</div></td></tr>');

        var delay = 3000;

        setTimeout(function(){ $('table tbody').html(resposta); },delay);

    }).fail(function(resposta){

        $('.msg-erro').html(resposta);

    })

}


// ---------------------- Editar e deletar do Crud ---------------------- \\



$(document).on('click', '.btn-acao', function(e) {

    e.preventDefault();
    
    var tipoAcao = $(this).attr('data-acao');

    if(tipoAcao.indexOf('acao=editar') != '-1')
    {

        var id = tipoAcao.replace('acao=editar&id=','');

        IDEDITAR = id; // id que deve ser deletada

        var busca = buscaDadosUsuario(id);
        

        busca.done(function(json){

            var retorno = JSON.parse(json);

            $('#alterarNomeUsuario').attr('value', retorno['nome']);

            $('#alterarEmailUsuario').attr('value', retorno['email']);
            
        }).fail(function(erro){
            $('.msg-erro-alterar').html(erro);
        })
 
    }
    else
    {
        var id = tipoAcao.replace('acao=deletar&id=','');

        IDDELETEUSUARIO = id; // id que deve ser deletada
    }
})

// ---------------------- End Editar e deletar do Crud ---------------------- \\



// delete usuario
$(document).ready(function(){

    $("#deletarUsuarioTrue").click(function(){

        var id = IDDELETEUSUARIO;

        $dados = 'tipo=deleteUsuario&id='+id;

        var deletaUsuario = chamaAjax('index.php',$dados,'POST');

        deletaUsuario.done(function(resposta)
        {
            if(resposta == true)
            {
                $('.msg-erro').html('Usuario exluido com sucesso');
            }
            else
            {
                $('.msg-erro').html(resposta);
            }

        }).fail(function(resposta){
            $('.msg-erro').html(resposta);
        })

    })
})


// Update

$(document).ready(function(){
    $('#alterarDados').click(function(e){
        e.preventDefault();

        var id = IDEDITAR;

        var email = 'alterarNome='+$('#alterarNomeUsuario').val();
        var nome =  'alterarEmail='+$('#alterarEmailUsuario').val();

        var novosDados = email+'&'+nome;

        var dados = 'tipo=alterarDados&'+novosDados+'&id='+id;

        'tipo=alterarDados&id=ID&novosDados';

        var alterarDados = chamaAjax('index.php',dados,'POST');
        alterarDados.done(function(resposta)
        {
            if(resposta == true)
            {
                loadConteudo(1);
                $('.msg-erro-alterar').html('Dados atualizados com sucesso');
            }else{
                $('.msg-erro-alterar').html(resposta); 
            }
        })
    })
})



// ---------------------- Cadastrar Novo Usuario ---------------------- \\

$(document).ready(function() {

    loadConteudo(1);

    $('.form-btn').click(function(e) {
        e.preventDefault();

            var nomeUsuario = $('#nomeUsuario').val();
            var emailUsuario = $('#emailUsuario').val();

            var verificaCampoNome = validaCampos(nomeUsuario);
            var verificaCampoEmail =  validaCampos(emailUsuario,'email');
            

            if(verificaCampoNome != true)
            {
                $('.msg-erro').html(verificaCampoNome);
            }

            if(verificaCampoEmail != true)
            {
                $('.msg-erro').html(verificaCampoEmail); 

            }
            else{

                var $dados = $('#form-add-usuarios').serialize();

                var $cadastrarUsuario = crudDados($inserir, $dados, $rota, $type);

                $cadastrarUsuario.done(function(sucess){
                    if(sucess == true)
                    {
                        $('.msg-erro').html('Usuario adicionando com sucesso');
                    }else{
                        $('.msg-erro').html(sucess);
                    }
                }).fail(function(erro){
                    $('.msg-erro').html(erro);
                })

               

            }

    })

})

loadPagination();