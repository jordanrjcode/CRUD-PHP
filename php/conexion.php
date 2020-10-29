<?php 
  //Pdo es la manera recomandable para conectarte en la base de datos
  const DB = "mysql";
  const DB_SERVIDOR = "localhost";
  const DB_CHARSET = "utf8";
  abstract class BD{
    private static $usuario = "root"; 
    private static $pass = ""; 
    private static $servidor = DB_SERVIDOR; 
    private static $nombredb = "control_usuarios"; 
    private static $charset = DB_CHARSET;
    private $conexion;

    public function conectar(){
      try {
        $cadena = "mysql:host=".self::$servidor.";dbname=".self::$nombredb;
        $pdo = new PDO($cadena, self::$usuario, self::$pass);
        $pdo->exec("SET CHARACTER SET ". self::$charset);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
      } catch (PDOException $error) {
        echo "Error {$error->getMessage()}";
      }
    }

    private function desconectarse(){
      $this->conexion = null;
    }

    //c-r-u-d
    abstract protected function insertar($registro);
    abstract protected function consultar();
    abstract protected function consultarOne($registro);
    abstract protected function actualizar($registro);
    abstract protected function eliminar($registro);
  }

?>