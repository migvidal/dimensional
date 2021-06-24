<?php

require_once('database.php');

/* utilidades */
// 'empty' múltiple
function mempty()
{
    foreach (func_get_args() as $arg) {
        if (empty($arg))
            return true;
    }
    return false;
}


function redirigirRefIndex()
{
    // si no se ha iniciado sesión, regresa a la página
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location:' . $_SERVER['HTTP_REFERER']);
        exit();
        // o vuelve al index
    }
    header('Location:index.php');
    exit();

}


/* mensajes al usuario */

function crearMensaje($mensaje, $tipo)
{
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['tipo-mensaje'] = $tipo; //1-exito, 2-info, 3-error
}

function mostrarMensaje()
{
    global $_SESSION;

    if (!isset($_SESSION["mensaje"], $_SESSION["tipo-mensaje"])) {
        // si no hay mensaje que mostrar
        return false;
    }

    $mensaje = $_SESSION["mensaje"];
    $tipoMensaje = $_SESSION["tipo-mensaje"];
    switch ($tipoMensaje) {
        case 1:
            $class = 'mensaje-exito';
            break;
        case 2:
            $class = 'mensaje-info';
            break;
        case 3:
            $class = 'mensaje-error';
            break;
        default:
            $class = 'mensaje-generico';
            break;
    }

    //include_once ('includes/mensaje_info.php');

    unset($_SESSION["mensaje"]);
    unset($_SESSION["tipo-mensaje"]);

    return array($mensaje, $class);
}


/*BDD*/
function crearConexion()
{
    if (!isset($db) || $db === NULL) {
        $db = new Database();
    }
    return $db;
}

function selectModelo($campos, $id_modelo, $categoria, $usuario)
{
    $con = crearConexion();
    //select
    $sql = "SELECT";
    foreach ($campos as $clave => $valor) {
        if ($clave === count($campos) - 1) {
            $sql .= " $valor "; //última sin coma
        } else
            $sql .= " $valor, ";
    }
    $sql .= " FROM modelo ";
    //where
    if ($id_modelo !== null) {
        $sql .= " WHERE id_modelo = $id_modelo";
    } else
    if ($categoria !== null) {
        $sql .= " WHERE categoria = $categoria";
    } else
    if ($usuario !== null) {
        $sql .= " WHERE usuario = $usuario";
    } else {
        $sql .= " ORDER BY id_modelo DESC LIMIT 10"; //para los destacados

    }
    $sql .= ";";
    //consulta
    $con->hacerConsulta($sql);
    $filas = $con->getRows();
    $con->disconnect();//quitar esto?
    return $filas;
}

function selectCategorias()
{
    $con = crearConexion();
    //select
    $sql = "SELECT * FROM categoria;";
    //consulta
    $con->hacerConsulta($sql);
    $filas = $con->getRows();
    $con->disconnect();
    return $filas;
}

function selectUsuarios($usuario = null)
{
    $con = crearConexion();
    //sql
    $sql = "SELECT *
            FROM usuario";
    if (!is_null($usuario)) {
        if (is_numeric($usuario)) {
            $sql .= " WHERE id_usuario = '$usuario'";
        } elseif (is_string($usuario)) {
            $sql .= " WHERE nombre_usuario = '$usuario'";
        }
    }
    $sql .= ";";

    //consulta
    $con->hacerConsulta($sql);
    if ($con->getNumRows() === 0) {
        return false;
    }
    $filas = $con->getRows();

    /* si es solo una fila */

    if ($con->getNumRows() < 2) {
        $fila = $filas[0];
        return $fila;
    }

    $con->disconnect();
    return $filas;
}


function insertModelo($titulo, $ruta, $miniatura, $categ, $usuario)
{
    $con = crearConexion();
    $sql = "INSERT INTO modelo (titulo, ruta, miniatura, categoria, usuario)
            VALUES ('$titulo', '$ruta', '$miniatura', $categ, $usuario);";
    $con->hacerConsulta($sql);
    if (!$con->getResultado()) {
        return false;
    }
    $con->disconnect();

    return $con->getIdFilaInsertada();
}

function insertUsuario($nombre_usuario, $pass)
{
    $con = crearConexion();
    $sql = "INSERT INTO usuario (nombre_usuario, " . "pass" . ")
            VALUES ('$nombre_usuario', '$pass');";
    $con->hacerConsulta($sql);
    $con->disconnect();
    return $con->getResultado();
}


//delete

function deleteModelo($idModelo)
{
    $con = crearConexion();
    $sql = "DELETE FROM modelo
            WHERE id_modelo = {$idModelo};";
    $con->hacerConsulta($sql);
    $con->disconnect();
    return $con->getNumRows();
}

function deleteUsuario($usuario)
{

}

/* END BDD*/


/* sesiones */
/* usar en upload, etc. */
function checkRedireccionarLogin()
{
    if (!isset($_SESSION['user_id'])) {
        //header("Location:".$_SERVER['PHP_SELF']);
        header('Location:login.php');
    }
//header('Location:login.php');

}

function checkSesion()
{
    if (!isset($_SESSION['user_id'])) {
        redirigirRefIndex();
    }
}

/* elimina archivo y crea mensaje de error/info */
function eliminarArchivo($idModelo, $rutaModelo, $rutaMiniatura)
{

    // 1 - Eliminar registro BDD
    if (isset($idModelo)) {
        deleteModelo($idModelo);
        crearMensaje("Eliminado de BDD", 2);
    }


    // 2 - Eliminar archivo modelo
    if (isset($rutaModelo)) {
        if (unlink($rutaModelo)) {
            crearMensaje("Archivo eliminado", 2);
        } else {
            crearMensaje("Error al eliminar el archivo", 3);
        }
    }

    // 3 - Eliminar miniatura
    if (isset($rutaMiniatura)) {
        unlink($rutaMiniatura) || crearMensaje("Error: la miniatura no se ha eliminado", 2);;
    }
}


/* filtrar inputs */
function textoIncorrecto($input)
{ //devuelve false si es correcto
    // longitud
    $longitudTexto = strlen($input);
    if ($longitudTexto > 30) {
        return 'Demasiado largo';
    }
    if ($longitudTexto < 2) {
        return 'Demasiado corto';
    }
    // comience por número
    if (preg_match('/^[0-9]/', $input)) {
        return 'No debe comenzar por un número';
    }
    // contenga caracteres especiales
    if (preg_match('/[$€&+,:;=?@#|\'<>.^*()%!-]/', $input)) {
        return 'No debe contener caracteres especiales';
    }
    return false;

}
?>