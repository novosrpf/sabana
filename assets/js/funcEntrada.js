$(document).on('ready', funcPrincipal);

function funcPrincipal() 
{
  $("#btnNuevaEntrada").on('click', funcNuevoRenglon);
  
  $("body").on('click', ".btn-danger", funcEliminarFila);
}

function funcEliminarFila() 
{
	$(this).parent().parent().fadeOut( "slow", function() { $(this).remove(); } );
}

function funcNuevoRenglon(){
  
  $("#tablaEntradas")
    .append
    (
      $('<tr>')
      .append
      (
        $('<td>')
        .append
        (
          $('<label>')
          .text('Numero')
        )
      )
    
      .append
      (
        $('<td>')
        .append
        (
          $('<label>')
          .text('Rin')
        )
      )
      
    .append
      (
        $('<td>')
        .append
        (
          $('<label>')
          .text('Descripcion')
        )
      )
  
      .append
      (
        $('<td>')
        .append
        (
          $('<input>')
          .attr('type', 'number')
          .attr('placeholder', 'Escriba la cantidad')
          .addClass('form-control').attr('name', 'cantidad[]')
        )
      )                    
          
      .append
      (
        $('<td>').addClass('text-center')
        .append
        (
          $('<div>').addClass('btn btn-primary').text('Buscar')
        )
        .append
        (
          $('<div>').addClass('btn btn-danger').text('Eliminar')
        )
      )     
    );
  
  
  
}