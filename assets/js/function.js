// Arquivo Responsaveis pelas funções sem escopo

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}


// ----------------------  Modal ---------------------- \\

$(document).on('click', '.open-modal', function(e) 
{
    e.preventDefault();

    idModal = $(this).attr('data-open-modal');
    idModal = '#modal-'+idModal;
    

    $(idModal).css('display','flex');

    $('.btn-close-modal').click(function(){
        $(idModal).css('display','none').fadeOut('slow');   
    })
    
})

// Fecha todos os modais 
$(document).ready(function(){
    $('#btn-close-modal').click(function(e){
        e.preventDefault();
        $('.modal').css('display','none').fadeOut('slow');   
    })
})

// ---------------------- End Modal ---------------------- \\

function validaCampos($campo, $type = '')
{   
    if($type == 'email')
    {
        if (!isEmail($campo)) {
            return 'O Email digitado é invalido';
        }else{
            return true;
        }
    }

    if($campo == '')
    {
        return 'Não deixe campos em branco';
    }

    if ($campo.length < 3) 
    {
        return 'O nome de usuario deve conter no minimo 3 letras';
    }

    if ($campo.length > 16)
    {
        return 'O nome de usuario deve conter no maximo 16 letras';
    }

    if ($campo.length < 4) {
        return 'O Email deve conter no minimo 3 caracteres';
    }

    else{
        return true;
    }
}