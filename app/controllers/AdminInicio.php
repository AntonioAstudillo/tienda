<?php

class AdminInicio extends Controlador
{
   function __construct()
   {
      /*En esta linea, creo una instancia de la clase TiendaModelo. Para posteriormente poder hacer uso de sus metodos */
      $this->modelo = $this->modelo('AdminInicioModelo');
   }

   public function index(){
      $datos = ['title' => 'Administrativo | inicio' ,
                 'menu' => false,
                 'admon' => true,
                 'data' => []
              ];
      $this->vista('adminInicioVista' , $datos);
   }

}



 ?>
