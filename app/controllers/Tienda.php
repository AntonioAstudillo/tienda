<?php

class Tienda extends Controlador
{
   function __construct()
   {
      /*En esta linea, creo una instancia de la clase TiendaModelo. Para posteriormente poder hacer uso de sus metodos */
      $this->modelo = $this->modelo('TiendaModelo');
   }

   public function index(){
      $sesion = new Sesion();

      if($sesion->getLogin())
      {
         $datos = ['title' => 'Tienda'];
         $this->vista('tiendaVista' , $datos);

      }else{
         header('Location:'.RUTA);
      }

   }

}



 ?>
