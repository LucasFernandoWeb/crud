
// contantes

const $rota = 'index.php'; // arquivo onde o Crud será execultado
const $type = 'POST';
const $inserir = 'tipo=cadastro&';
const $deletar = 'tipo=deleteUsuario&id=';
const $atualizar = 'tipo=alterarDados&id=';


function crudDados($const, $dados, $rota, $type)
{
    var $dados = $const+$dados;

    var $requisicao = chamaAjax($rota, $dados,$type);

    return  $requisicao.done(function(sucess){
                return sucess;
            }).fail(function(erro){
                return erro;
            })
}