<?php

   /**
   * @author Rubén Palos Flores
   * @copyright 19/Feb/2024
   * @version: 1
   * @Proposito: Formato para actualizar 
   *
   */
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/estiloMenu.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estiloAzul.css">
  <script src="assets/js/jquery.js"></script>
  <title>Avisos de costeos.</title>
</head>

<body>
  <ul class="menu">
    <li><a href="index.php">Listado</a></li>
    <li><a href="#">Altas de avisos</a></li>
  </ul>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h1>Listado de avisos.</h1>
        <div id="list"></div>
      </div>
    </div>
    <!-- <div class="text-center well">
    </div> -->
  </div>

  <script>
    $(document).ready(function(){
        $("#list").anexGrid({
          class: 'table-striped table-bordered table-condensed table-hover',
          columnas: [
            { leyenda: 'No Diagnostico', style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'diagnostico'  },
            { leyenda: 'Placa',          style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'placa' },
            { leyenda: 'Nombre',    style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'nombre' },
            { leyenda: 'Veces',          style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'veces' },
            { leyenda: 'Estatus',        style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'estatus' },
            { leyenda: 'Acciones',       style: 'width:100px;',  ordenable: false, filtro: false, columna: 'Acciones' }
          ],
          modelo: [
            { propiedad: 'diagnostico' },
            { propiedad: 'placa' },
            { propiedad: 'nombre' },
            { propiedad: 'veces' },
            { formato: function(tr, obj, celda){
              return obj.estatus = 1 ? "Pendiente" : "Terminado" }},

            { formato: function(tr, obj, celda){
              return anexGrid_link({
                class: 'btn-success btn-xs btn-block',
                contenido: 'Enviar',
                href: 'avisos/formAvisoActualiza.php?id=' + obj.id
              });
            }},

            { formato: function(tr, obj, celda){
              return anexGrid_link({
                class: 'btn-warning btn-xs btn-block',
                contenido: 'Editar',
                href: 'avisos/formAvisoActualiza.php?id=' + obj.id
              });
            }}
          ],

          url: 'avisos/avisosData.php',
          paginable: true,
          filtrable: true,
          limite: [20, 60, 100],
          columna: 'diagnostico',
          columna_orden: 'ASC'
        });
      })
  </script>

  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.anexgrid.js"></script>
</body>
</html>