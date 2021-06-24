<!-- ATENCIÓN:
 Por seguridad, este archivo se sitúa fuera de la carpeta public_html en producción.
 Lo he incluido aquí para facilitar la corrección.
 -->

<?php

class Database
{
    private static $dbHost = "localhost";
    private static $dbUser = "miguel"; // aquí el usuario
    private static $dbPass = "miguel"; // aquí la contraseña
    private static $dbName = "dimensional"; // aqui la base de datos

    private $con;
    private $resultado;
    private $miNumRows;
    private $idFilaInsertada; //id de la fila recién insertada

    public function __construct()
    {
        $this->con = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName)
        or die("Error al conectar con la base de datos");
    }

    public function disconnect()
    {
        $this->con->close();
    }

    public function hacerConsulta($sql)
    {
        $this->resultado = $this->con->query($sql);
        if ($this->resultado && $this->resultado !== true) {
            $this->miNumRows = $this->resultado->num_rows;
        }
        $this->idFilaInsertada = $this->con->insert_id;


    }

    /**
     * @return mixed
     */
    public function getResultado()
    {
        return $this->resultado;
    }


    public function getNumRows()
    {
        return $this->miNumRows;
    }

    public function getRows()
    {
        $rows = array();
        for ($i = 0; $i < $this->miNumRows; $i++) {
            $rows[$i] = $this->resultado->fetch_assoc();
        }
        return $rows;
    }

    /**
     * @return mixed
     */
    public function getIdFilaInsertada()
    {

        return $this->idFilaInsertada;
    }


}

?>