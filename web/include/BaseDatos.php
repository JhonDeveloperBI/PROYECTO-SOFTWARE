<?php

class BaseDatos
{
    private $servidor;
    private $puerto;
    private $usuario;
    private $clave;
    private $dbName;
    private $conexion;

    // Metodo constructora
    public function __construct($servidor, $puerto, $usuario, $clave, $dbName) {
        $this->servidor = $servidor;
        $this->puerto = $puerto;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->dbName = $dbName;
        $this->conexion = null;

    }

    // Conectar a la base de datos
    public function conectar() {
        $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->dbName, $this->puerto);

        if (mysqli_connect_errno()) {
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            exit();
        }else{
            $charset = mysqli_set_charset ( $this->conexion , "utf-8" );
        }



    }

    // Ejecutar una consulta
    public function ejecutarConsulta($consulta) {
        $this->conectar();
        $sql = $consulta;
        return $resultado = mysqli_query($this->conexion, trim($sql));
        if ($resultado = mysqli_query($this->conexion, trim($sql))) {
            echo $resultado;
            $this->desconectar();
            return $resultado;
        }else{
            $this->desconectar();
            return null;
        }
    }
    // Traer el array de datos
    public function obtenerFila($resultado) {
        return mysqli_fetch_array($resultado);
    }

    // Traer cantidad de filas
    public function numeroFilas($resultado) {
        return mysqli_num_rows($resultado);
        //return $resultado->num_rows;
    }

    public function proteger($string) {
       //return mysqli_real_escape_string ( $this->conexion , $string);
        return $string;

    }
    public function desconectar(){
        mysqli_close($this->conexion);
    }

    public function __destruct() {

    }
}
?>
