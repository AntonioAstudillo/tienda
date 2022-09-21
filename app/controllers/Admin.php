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
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $errores = array();
         $data = array();

         $usuario = isset($_POST['user']) ? Helpers::limpiarDato($_POST['user']) : '';
         $clave = isset($_POST['password']) ? Helpers::limpiarDato($_POST['password']) : '';

         if(empty($usuario)){
            $errores[] = 'El usuario es requerido';
         }

         if(empty($clave)){
            $errores[] = 'La clave es requerida';
         }

         if(count($errores) > 0){
            //hubo errores

         }else{
            //no hubo errores
            $respuesta = $this->modelo->validarUser($usuario);



            if(!$respuesta)
            {
               echo 'no existe ese usuario';
            }else{
               if(Helpers::verificarClave($clave , $respuesta['clave']))
               {

               }
               else{
                  
               }
            }




         }


      }
      else
      {

      }
      $datos = ['title' => 'Administrativo Inicio' ,
                'menu' => false,
                'data' => [],
                'admon' => true
               ];
      $this->vista('adminInicioVista' , $datos);
   }
}




 ?>
