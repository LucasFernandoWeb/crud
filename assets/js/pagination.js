function loadPagination()
{
    var dados = 'tipo=pagination';
    var loadPagination = chamaAjax('index.php', dados, 'POST');

    loadPagination.done(function(retorno)
    {

        if($.isNumeric(retorno) == true)
        {
            var pagValor = retorno;
            var pagValor = parseInt(pagValor) + 1;

            for(var i = 1; i < pagValor; i++)
            {
                if(i != 1)
                {
                    $('.pagination-content').append('<span  class="pagination-item" id="'+i+'">'+i+'</span>');
                }
                
            }
        }
        else
        {

        }

    }).fail(function(retorno)
    {
        $('.msg-erro').html(retorno);
    })
}

$(document).on('click', '.pagination-item', function(e) {
    e.preventDefault();

    idPagination = $(this).attr('id');
    idPagination = idPagination.replace('#', '');

    loadConteudo(idPagination);
})