<?php

/**
 * Controlador Administrativo
 */
class Admin extends Controlador
{

   private $modelo;

   function __construct()
   {
      $this->modelo = $this->modelo('AdminModelo');
   }

   public function index(){
      $datos = ['title' => 'Administrativo' ,
                 'subtitulo' => 'Administrar',
                 'menu' => false,
                  'data' => []
               ];
      $this->vista('adminVista' , $datos);
   }

   public function verifica()
   {
      $datos = ['title' => 'Administrativo Inicio' ,
                'menu' => false,
                'data' => [],
                'admon' => true
               ];
      $this->vista('adminInicioVista' , $datos);
   }
}




 ?>
