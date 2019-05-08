function chamaAjax($rota, $dados, $type)
{
    return $.ajax({ cache: false, type: $type, data: $dados, url : $rota,
             success: function(retorno){ return retorno; }
    }) 
}