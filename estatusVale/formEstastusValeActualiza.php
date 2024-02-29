<?php

  /**
   * @author Rubén Palos Flores
   * @copyright 8/May/2023
   * @version: 1
   * @Proposito: Formato para actualizar diagnosticos pendientes de cotizacion
   *
   */

  // Cargamos los valores por default para el servidor
  require_once '../utilerias/constantes.php';

	if (!isset($_GET['idDiagnostico']) ) {
		//echo "No existe la variable.....";

	} else{
  
		$idDiagnostico = $_GET['idDiagnostico'];
    $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

		if (!$conexion) {
			die ('No se pude conectar a MySql: ' .mysqli_connect_error());
		}
    // DATE_FORMAT(Fecha_Nacimiento, "%d/%m/%Y")
		$query = "SELECT numDiagnostico, placa, idDepEnt, dependencia, fecRecepUMSA, 
            servSolicitado, idProveedor, proveedor, fecInicioDiagnostico, 
            fecCotizacion, observaciones, idEstatus
            FROM tbldiagnosticos WHERE idDiagnostico='$idDiagnostico'";
		$results = mysqli_query($conexion, $query) 
			or die ('No se pudo seleccionar registros.'.mysqli_error($conexion));

    while ($row = mysqli_fetch_object($results)){
    
      $numDiagnostico       = $row->numDiagnostico;
      $placa                = $row->placa;
      $idDepEnt             = $row->idDepEnt;
      $dependencia          = $row->dependencia;
      $fecRecepUMSA         = date("Y-m-d", strtotime($row->fecRecepUMSA));
      $servSolicitado       = $row->servSolicitado;
      $idProveedor          = $row->idProveedor;
      $proveedor            = $row->proveedor;
      $fecInicioDiagnostico = date("Y-m-d", strtotime($row->fecInicioDiagnostico));
      $fecCotizacion        = date("Y-m-d", strtotime($row->fecCotizacion));
      $observaciones        = $row->observaciones;
      $idEstatus            = (int)$row->idEstatus;
    }
	}

  $arrDependencias = array();
  $arrProveedores = array();
  $arrEstatus = array();

  // Depencencias
  //
  $queryDependencias = "SELECT idDepEnt, dependencia FROM tbldependencias ORDER BY dependencia";
  $resultsDependencias = mysqli_query($conexion, $queryDependencias);

  while ( $rowDependencias = mysqli_fetch_assoc($resultsDependencias)){
    $arrDependencias[] = $rowDependencias; 
  }

  // Proveedores
  //
  $queryProveedores = "SELECT idProveedor, nombre FROM tblProveedores ORDER BY nombre";
  $resultsProveedores = mysqli_query($conexion, $queryProveedores);

  while ( $rowProveedores = mysqli_fetch_assoc($resultsProveedores)){
    $arrProveedores[] = $rowProveedores; 
  }

  // Estatus
  //
  $queryEstatus = "SELECT idEstatus, descripcionEstatus FROM tblEstatus ORDER BY descripcionEstatus";
  $resultsEstatus = mysqli_query($conexion, $queryEstatus);

  while ( $rowEstatus = mysqli_fetch_assoc($resultsEstatus)){
    $arrEstatus[] = $rowEstatus; 
  }

  var_dump((int)$idDepEnt);

  $totalEstatus = count($arrEstatus);

  for ($i=0; $i < $totalEstatus; $i++) { 
    echo "Registro ".$i;
  }

  

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
  <title>Seguimiento a diagnósticos cotizando</title>
</head>
	<body>
    <ul class="menu">
      <li><a href="../index.php">Listado</a></li>
      <li><a href="formAdelantadoAlta.php">Alta servicios</a></li>
    </ul>
    <section>
      <form class="formulario"
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
          method="post"
          id="formDiagnosticoActualiza" 
          >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2>Actualización de Diagnósticos en cotización.</h2>
          </div>
          <div class="panel-body">
            <fieldset>
              <input type="hidden"
                    class="textbox"
                    name="idDiagnostico"
                    value="<?php echo $idDiagnostico; ?>"
              >

              <label  for="numDiagnostico"	class="etiq">No Diagnóstico:</label>
              <input  type="text"
                      class="textbox numDiagnostico"
                      name="numDiagnostico"
                      maxlength="10"
                      value="<?php echo $numDiagnostico; ?>"
              >
              <br /><br />

              <label  for="placa"	class="etiq">Placa:</label>
              <input  type="text"
                      class="textbox placa"
                      name="placa"
                      value="<?php echo $placa; ?>"
              >
              <br /><br />
















              <br /><br />
              <label  for="idDepEnt" class="etiq">id Dependencia:</label>
              <input  type="text"
                      class="textbox"
                      name="idDepEnt"
                      value="<?php echo $idDepEnt; ?>"
              >
              <br /><br />

              <label  for    ="dependencia"	class="etiq">Dependencia:</label>
              <input  type="text"
                      class="textbox"
                      name="dependencia"
                      value="<?php echo $dependencia; ?>"
              >
              <br /><br />

              <label for="fecRecepUMSA" class="etiq">Recepción en UMSA</label>
              <input  type="date"
                      class="textbox"
                      name="fecRecepUMSA"
                      value="<?php echo $fecRecepUMSA; ?>"
              >
              <br /><br />

              <label  for    ="servSolicitado" class="etiq">Servicio solicitado:</label>
              <textarea  type="textarea"
                      class="form-control servSolicitado"
                      rows="5"
                      name="servSolicitado"
                      maxlength="550"
              ><?php echo $servSolicitado; ?></textarea>
              <br /><br />


              <label  for    ="idProveedor" class="etiq">Id Proveedor:</label>
              <input  type="text"
                      class="textbox"
                      name="idProveedor"
                      value="<?php echo $idProveedor; ?>"
              >
              <br /><br />

              <label  for    ="proveedor" class="etiq">Proveedor:</label>
              <input  type="text"
                      class="textbox"
                      name="proveedor"
                      value="<?php echo $proveedor; ?>"
              >
              <br /><br />

              <label  for ="fecInicioDiagnostico" class="etiq">Inicio Diagnóstico:</label>
              <input  type="date"
                      class="textbox"
                      name="fecInicioDiagnostico"
                      value="<?php echo $fecInicioDiagnostico; ?>"
              >

              <br /><br />
              <label  for="fecCotizacion"	class="etiq">Fecha Cotización:</label>
              <input  type="date"
                      class="textbox"
                      name="fecCotizacion"
                      value="<?php echo $fecCotizacion; ?>"
              >
              <br /><br />

              <label  for="observaciones"	class="etiq">Observaciones:</label>
              <input  type="text"
                      class="textbox"
                      name="observaciones"
                      value="<?php echo $observaciones; ?>"
              >
              <br /><br />

              <label  for ="estatus" class="etiq">Estatus:</label>
              <input  type="text"
                      class="textbox"
                      name="estatus"
                      value="<?php echo $idEstatus; ?>"
              >
              <br /><br />

              <button type="submit" >Actualiza</button>

            </fieldset>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>

<?php
  if ($_POST)
  {
    if (!isset( $_POST['idDiagnostico'], $_POST['numDiagnostico'], $_POST['placa'],
                $_POST['idDepEnt'], $_POST['dependencia'], $_POST['fecRecepUMSA'],
                $_POST['servSolicitado'],$_POST['idProveedor'],
                $_POST['proveedor'], $_POST['fecInicioDiagnostico'], $_POST['fecCotizacion'],
                $_POST['observaciones'], $_POST['estatus']
        ) )
    {
      echo 'Falta llenar datos del formulario, '.
            'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
            '<a href="formDiagnosticoActualiza.php">Regresar a formulario anterior.</a>';
    } else {

      $idDiagnostico        = $_POST['idDiagnostico'];
      $numDiagnostico       = strtoupper($_POST['numDiagnostico']);
      $placa                = strtoupper($_POST['placa']);
      $idDepEnt             = $_POST['idDepEnt'];
      $dependencia          = $_POST['dependencia'];
      $fecRecepUMSA         = $_POST['fecRecepUMSA'];
      $servSolicitado       = strtoupper($_POST['servSolicitado']);
      $idProveedor          = $_POST['idProveedor'];
      $proveedor            = $_POST['proveedor'];
      $fecInicioDiagnostico = $_POST['fecInicioDiagnostico'];
      $fecCotizacion        = $_POST['fecCotizacion'];
      $observaciones        = strtoupper($_POST['observaciones']);
      $estatus              = $_POST['estatus'];

      $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

      $query = "UPDATE tbldiagnosticos SET ".
              "numDiagnostico='$numDiagnostico', ".
              "placa='$placa', ".
              "idDepEnt='$idDepEnt', ".
              "dependencia='$dependencia', ".
              "fecRecepUMSA='$fecRecepUMSA', ".
              "servSolicitado='$servSolicitado', ".
              "idProveedor='$idProveedor', ".
              "proveedor='$proveedor', ".
              "fecInicioDiagnostico='$fecInicioDiagnostico', ".
              "fecCotizacion = '$fecCotizacion', ".
              "observaciones = '$observaciones', ".
              "estatus = '$estatus' ".
              "WHERE idDiagnostico='$idDiagnostico'";

      if (!$conexion)
      {
        die ('No se pude conectar a MySql: ' .mysqli_connect_error()." ".
        mysqli_connect_errno());
      } else {

        mysqli_query( $conexion, $query)
          or die ('No se pudo actualizar el registro.');

        if (!mysqli_affected_rows($conexion) === 1)
        {
          echo '<div class="alert alert-danger alert-dismissible" role="alert">'.
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
          '<span aria-hidden="true">&times;</span></button>'.
          '<strong>Ocurrio un problema.</strong>'.
          '</div>';
        } else {
          echo '<div class="alert alert-success alert-dismissible" role="alert">'.
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
          '<span aria-hidden="true">&times;</span></button>'.
          '<strong>Actualizacion edfectuada exitosamente.</strong>'.
          '</div>';
        }
      }
    }
    mysqli_close($conexion);
    echo '<div class="alert alert-info" role="alert">'.
        '<a href="../index.php" class="alert-link">Listado</a>'.
        '</div>';
  }
?>