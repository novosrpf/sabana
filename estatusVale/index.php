<?php

  /**
  * @author Rubén Palos Flores
  * @copyright 29/Feb/2024
  * @version: 1
  * @Proposito: Listado de Estatus del vale
  *
  */

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/estiloMenu.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/estiloAzul.css">
  <script src="../assets/js/jquery.js"></script>
  <title>Estatus de los Vales.</title>
</head>

<body>
  <ul class="menu">
    <li><a href="index.php">Listado</a></li>
    <li><a href="#">Alta de Estatus de los Vales</a></li>
  </ul>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h1>Listado Estatus de Vales.</h1>
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
            { leyenda: 'Id',             style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'id'  },
            { leyenda: 'Descripción',    style: 'width:200px;', ordenable: true,  filtro: true,  columna: 'Descripcion' },
            { leyenda: 'Acciones',       style: 'width:100px;',  ordenable: false, filtro: false, columna: 'Acciones' }
          ],
          modelo: [
            { propiedad: 'id' },
            { propiedad: 'Descripcion' },
            
            
            { formato: function(tr, obj, celda){
              return anexGrid_link({
                class: 'btn-warning btn-xs btn-block',
                contenido: 'Editar',
                href: 'avisos/formAvisoActualiza.php?id=' + obj.id
              });
            }}
          
          ],

          url: 'estatusValeData.php',
          paginable: true,
          filtrable: true,
          limite: [20, 60, 100],
          columna: 'descripcion',
          columna_orden: 'ASC'
        });
      })
  </script>

  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.anexgrid.js"></script>
</body>
</html>