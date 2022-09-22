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
      //Recibimos datos de la vista
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
            $datos = ['title' => 'Administrativo Inicio' ,
                      'menu' => false,
                      'data' => [],
                      'admon' => true,
                      'errores' => $errores
                     ];
            $this->vista('adminVista' , $datos);

         }
         else
         {
            //no hubo errores
            $respuesta = $this->modelo->validarUser($usuario);

            if(!$respuesta)
            {
               $errores[] = 'Datos incorrectos';

               $datos = ['title' => 'Administrativo Inicio' ,
                         'menu' => false,
                         'user' => $usuario,
                         'clave' => $clave,
                         'admon' => true,
                         'errores' => $errores
                        ];
               $this->vista('adminVista' , $datos);
            }
            else
            {
               if(Helpers::verificarClave($clave , $respuesta['clave']))
               {
                  //Hacemos un update a la administradores campo login
                  if($this->modelo->updateLogin(Helpers::getTimeStamp() , $usuario))
                  {
                     //Creamos la sesion
                     $sesionObj = new Sesion();
                     $sesionObj->iniciarLogin($usuario);
                     header('Location:'.RUTA.'adminInicio');
                  }
                  else{
                     $errores[] = 'Hubo un error en el servidor';

                     $datos = ['title' => 'Administrativo Inicio' ,
                               'menu' => false,
                               'user' => $usuario,
                               'clave' => $clave,
                               'admon' => true,
                               'errores' => $errores
                              ];
                     $this->vista('adminVista' , $datos);
                  }

               }
               else{
                  $errores[] = 'Datos incorrectos';

                  $datos = ['title' => 'Administrativo Inicio' ,
                           'menu' => false,
                           'user' => $usuario,
                           'clave' => $clave,
                           'admon' => true,
                           'errores' => $errores
                           ];
                  $this->vista('adminVista' , $datos);
               }
            }
         }
      }
      else
      {
         $datos = ['title' => 'Administrativo Inicio' ,
                   'menu' => false,
                   'data' => [],
                   'admon' => true
                  ];
         $this->vista('adminInicioVista' , $datos);
      }

   }
}




 ?>
