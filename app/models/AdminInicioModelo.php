<?php

/**
 * Admin Inicio Modelo
 */
class AdminInicioModelo
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
