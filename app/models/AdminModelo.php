<?php

/**
 * Administrador Modleo
 */
class AdminModelo
{
   private $database;
   private $conexion;

   function __construct()
   {
      $this->database = new Mysql();
      $this->conexion = $this->database->getConexion();

   }

   public function validarUser($usuario)
   {
      $query = "SELECT clave FROM administradores WHERE correo = ?";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($usuario));

      return $statement->fetch(PDO::FETCH_ASSOC);

   }
}



 ?>
