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
}



 ?>
