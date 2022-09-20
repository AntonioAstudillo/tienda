<?php


/**
 * Controlador Admin usuarios
 */
class AdminUsuarios extends Controlador
{
   private $modelo;

   function __construct()
   {
      $this->modelo = $this->modelo('AdminUsuariosModelo');
   }


   public function index(){
      $datos = ['title' => 'Administrativo Usuarios Alta' ,
                 'subtitulo' => 'Lista de usuarios',
                 'menu' => false,
                 'admon' => true,
                  'data' => []
               ];

      $this->vista('adminUsuariosIndexVista' , $datos);
   }

    public function baja()
   {
      echo 'baja de usuarios';
   }

   public function cambio()
 {
     echo 'baja de usuarios';
 }

   public function alta()
   {
      $datos = ['title' => 'Administrativo' ,
                 'subtitulo' => 'Administrar',
                 'menu' => false,
                 'admon' => true,
                  'data' => []
               ];

      $this->vista('adminUsuariosVista' , $datos);
   }
}




 ?>
