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
}



 ?>
