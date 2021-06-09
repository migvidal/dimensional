<?php

require_once('database.php');

/*BDD*/
function crearConexion() {
    if (!isset($db) || $db === NULL) {
        $db = new Database();
    }
    return $db;
}

function selectModelo($campos, $tabla, $id_modelo, $categoria) {
    $con = crearConexion();
    if (count($campos) == 3) {
        $sql = "SELECT $campos[0], $campos[1], $campos[2]
                FROM $tabla";
    } else {
        $sql = "SELECT $campos[0], $campos[1]
                 FROM $tabla";
    }
    /* where */
    if ($id_modelo !== null) {
        $sql .= " WHERE id_modelo = $id_modelo";
    }
    if ($categoria !== null) {
        $sql .= " WHERE categoria = $categoria";
    }
    /* / where*/
    $sql .= ";";
    $con->hacerConsulta($sql);
    $filas = $con->getRows();
    $con->disconnect();//quitar esto?
    /*var_dump($sql);*/
    return $filas;
}

function selectUsuarios($usuario) {
    $con = crearConexion();
    $sql = "SELECT *
            FROM usuario
            WHERE nombre_usuario = '$usuario';";
    $con->hacerConsulta($sql);
    if ($con->getNumRows() === 0) {
        return false;
    }
    $filas = $con->getRows();
    $con->disconnect();//quitar esto?
    /* es solo una fila */
    $fila = $filas[0];

    return $fila;
}


function insertModelo($titulo, $ruta, $miniatura, $categ, $usuario)  {
    $con = crearConexion();
    $sql = "INSERT INTO modelo (titulo, ruta, miniatura, categoria, usuario)
            VALUES ('$titulo', '$ruta', '$miniatura', $categ, $usuario);";
    $con->hacerConsulta($sql);
    return $con->getNumRows();
}

function deleteModelo($idModelo)  {
    $con = crearConexion();
    $sql = "DELETE FROM modelo
            WHERE id_modelo = {$idModelo};";
    $con->hacerConsulta($sql);
    return $con->getNumRows();
}


/* sesiones */
/* usar en upload, etc. */
function checkRedireccionarLogin() {
    if (!isset($_SESSION['id_usuario'])) {
        //header("Location:".$_SERVER['PHP_SELF']);
        header('Location:login.php');
    }
//header('Location:login.php');
}

/* END BDD*/



/* filtrar inputs */

function textoCorrecto($input) {
    // longitud
    $longitudTexto = strlen($input);
    if ($longitudTexto < 2 || $longitudTexto > 30 ) {
        return false;
    }
    // comience por número
    if (preg_match('/^[0-9]/', $input)) {
        return false;
    }
    // contenga caracteres especiales
    if (preg_match('/[$€&+,:;=?@#|\'<>.^*()%!-]/', $input)) {
        return false;
    }

}

/*$db = new Database();
$db->mi_query("SELECT * FROM pelicula");
if($db->get_num_rows() == 0){
    echo "No hay películas<br/>";
}
else{
    $mis_pelis = $db->rows();
    foreach($mis_pelis as $peli){
        echo $peli['id_pelicula']." - <strong>".$peli['titulo']."</strong> - ".$peli['sinopsis'].
            " - ".$peli['director']."<br/>";
    }
}
$db->disconnect();*/

?>