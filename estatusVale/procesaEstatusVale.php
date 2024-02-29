
<?php
  if ($_POST)
  {
    if (!isset( $_POST['diagnostico'],$_POST['placa'], $_POST['idDepEnt']) )
    {
      echo 'Falta llenar datos del formulario, '.
          'favor de regresar con el siguiente enlace y llenear los datos';

      // echo "<br><pre>";
      // var_dump($_POST);
      // echo "</pre>";
      // die();

      echo '<br /><a href="formAvisoAlta.php">Regresar a formulario anterior.</a>';
    } else {
      require_once '../utilerias/constantes.php';

      $diagnostico = strtoupper( $_POST['diagnostico']);
      $placa       = strtoupper($_POST['placa']);
      $idDepEnt    = $_POST['idDepEnt'];
      $fecha = DATE('d/m/y H:i:s');
      $veces = 1;
      $estatus = 1;

      $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

      $query = "INSERT INTO avisos(id, idDepEnt, fecha, placa, diagnostico, veces, estatus) VALUES
                (null,'$idDepEnt', '$fecha', '$placa', '$diagnostico', '$veces', '$estatus')";

      if (!$conexion)
      {
        die ('No se pude conectar a MySql: ' .mysqli_connect_error()." ".
        mysqli_connect_errno());
      } else {

        $varx =  mysqli_query($conexion, $query);

        if ($varx)
        {

          echo '<div class="alert alert-success alert-dismissible" role="alert">'.
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
              '<span aria-hidden="true">&times;</span></button>'.
              '<strong>Alta exitosamente.</strong>'.
              '</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">'.
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
              '<span aria-hidden="true">&times;</span></button>'.
              '<strong>Ocurrio un problema.</strong>'.
              '</div>';
        }
      }

      mysqli_close($conexion);
      echo '<div class="alert alert-info" role="alert">'.
            '<a href="..\index.php" class="alert-link">Listado</a>'.
            '</div>';
    }
  }
