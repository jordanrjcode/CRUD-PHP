<?php 
include "conexion.php";
  class Usuario extends BD{
    private $nombre_usuario; 
    private $edad_usuario;

    public function insertar($registro){
      $conexion = parent::conectar();
      try {
        $query = "INSERT INTO `control_usuarios`.usuarios SET nombre_usuario=:nombre_usuario, edad_usuario=:edad_usuario";
        $insertar = $conexion->prepare($query)->execute($registro);
      } catch (Exception $error) {
        echo "<div class='alert alert-danger' role='alert'>". $error->getMessage() ."</div>";
      }
    }
    public function consultar(){
      $conexion = parent::conectar();
      try {
        $query = "SELECT * FROM control_usuarios.usuarios";
        $consulta = $conexion->query($query)->fetchAll();
        return $consulta;
      } catch (Exception $err) {
        echo "<div class='alert alert-danger' role='alert'>". $err->getMessage() ."</div>";
      }
    }
    
    public function consultarOne($registro){
      $conexion = parent::conectar();
      try {
        $query = "SELECT * FROM control_usuarios.usuarios WHERE usuario_id=".$registro;
        $consulta = $conexion->query($query)->fetch();
        return $consulta;
      } catch (Exception $err) {
        echo "<div class='alert alert-danger' role='alert'>". $err->getMessage() ."</div>";
      }
    }

    public function actualizar($registro){
      $conexion = parent::conectar();
      try {
        $query = "UPDATE usuarios SET nombre_usuario=:nombre_usuario, edad_usuario=:edad_usuario";
        $actualizacion = $conexion->prepare($query)->execute($registro);
        return $actualizacion;
      } catch (Exception $err) {
        echo "<div class='alert alert-danger' role='alert'>". $err->getMessage() ."</div>";
      }
    }
    public function eliminar($registro){
      $conexion = parent::conectar();
      try {
        $query = "DELETE FROM usuarios WHERE usuario_id=:usuario_id" ;
        $eliminacion = $conexion->prepare($query)->execute($registro);
        return $eliminacion;
      } catch (Exception $err) {
        echo $err->getMessage();
      }
    }
  }
?>