<?php

/**
 *  Admin usuarios modelo
 */
class AdminUsuariosModelo
{
   private $database;
   private $conexion;

   function __construct()
   {
      $this->database = new Mysql();
      $this->conexion = $this->database->getConexion();

   }

   public function altaUsuario($usuario , $correo , $clave , $datetime){
      $query = "INSERT INTO administradores VALUES(?,?,?,?,?,?,?,?,?,?)";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array(null , $usuario , $correo , $clave , 1 , 0 , 0 , 0 , 0, $datetime));

      return $statement->rowCount();
   }
}



 ?>
