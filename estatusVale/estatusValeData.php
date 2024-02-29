<?php
  require_once '../utilerias/anexgrid.php';
  require_once '../utilerias/constantes.php';
  try
  {
    $anexGrid = new AnexGrid();

    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";

    foreach($anexGrid->filtros as $f)
    {
      if($f['columna'] == 'id')    $wh .= " AND id    LIKE '%" . addslashes ($f['valor']) . "%'";

      if($f['columna'] == 'descripcion') $wh .= " AND descripcion LIKE '%" . addslashes ($f['valor']) . "%'";

       
    }

    $db = new PDO("mysql:dbname=". DB_NAME.";host=localhost;charset=utf8", DB_USERNAME, DB_PASSWORD);
    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT * FROM tblEstatusVale
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
    );

    $total = $db->query("
        SELECT COUNT(*) Total
        FROM tblEstatusVale
        WHERE $wh
    ")->fetchObject()->Total;

    header('Content-type: application/json');
    print_r($anexGrid->responde($registros, $total));
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
