<?php

  /**
   * @author Rubén Palos Flores
   * @copyright 29/Feb/2024
   * @version: 1
   * @Proposito: Formato para dar de alta los estatus de los vales
   *
   */

  // Cargamos los valores por default para el servidor
  require_once '../utilerias/constantes.php';

   
  $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if (!$conexion) {
    die ('No se pude conectar a MySql: ' .mysqli_connect_error());
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
  <script src="../assets/js/validarAviso.js"></script>

  <title>Alta Estatus de Vales</title>
</head>
	<body>
    <ul class="menu">
      <li><a href="../index.php">Listado</a></li>
      <li><a href="#">Pendiente</a></li>
    </ul>
    <section>
      <form name="formulario"
            class="formulario"
          action="procesaEstatusVale.php"
          method="post"
          onsubmit="return validarAviso();"
          >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2>Alta Estatus de Vale.</h2>
          </div>
        <div class="panel-body">

          <!-- Campos necesarios para el formulario -->
          <fieldset>
          <input  type="hidden" name="opcion" value="1">


            <label  for="diagnostico"	class="etiq">Diagnóstico:</label>
            <input  type="text"
                    maxlength="10"
                    class="textbox form-form-control"
                    name="diagnostico"
                    id="diagnostico"
            >
            <br /><br />

            <button class="btn btn-success" type="submit" name="enviar_btn" id="enviar_btn">Guardar</button>

            <button class="btn btn-warning"  type="reset" name="limpiar-btn" id="limpiar" onclick="limpiarForm()">Limpiar</button>  

          </fieldset>
        </div>
      </form>
    </section>
  </body>
</html>
