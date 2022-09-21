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
      $errores = array();

      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $usuario = isset($_POST['nombre']) ? Helpers::limpiarDato($_POST['nombre']) : '';
         $correo = isset($_POST['correo']) ? Helpers::limpiarDato($_POST['correo']) : '';
         $clave1 = isset($_POST['clave1']) ? Helpers::limpiarDato($_POST['clave1']) : '';
         $clave2 = isset($_POST['clave2']) ? Helpers::limpiarDato($_POST['clave2']) : '';


         if(empty($usuario)){
            $errores[] = 'El nombre es requerido';
         }

         if(empty($correo)){
            $errores[] = 'El correo es requerido';
         }

         if(empty($clave1)){
            $errores[] = 'La clave de acceso es requerida';
         }

         if(empty($clave2)){
            $errores[] = 'La clave de verificación es requerida';
         }

         if($clave1 != $clave2){
            $errores[] = 'Las claves de acceso no coinciden';
         }

         //verificamos que no existan errores

         if(count($errores) > 0) {
            $datos = ['title' => 'Error' ,
                       'subtitulo' => 'Datos incorrectos',
                       'menu' => false,
                       'admon' => true,
                        'data' => [],
                        'errores' => $errores
                     ];

            $this->vista('adminUsuariosVista' , $datos);
         }
         else
         {

            // enviamos los datos al modelo para almacenarlos en la base de datos y comprobamos si la inserción de hizo de forma correcta
            if($this->modelo->altaUsuario($usuario , $correo , Helpers::encriptar($clave1) , Helpers::getTimeStamp()) > 0 )
            {
               //mandamos mensaje de que se agrego correctamente
               $datos = ['title' => 'Usuario agregado' ,
                          'subtitulo' => 'Usuario agregado correctamente!.',
                          'texto' => 'El usuario se agrego de forma correcta en el sistema.',
                          'url' => 'adminUsuarios',
                          'color' =>'alert-success',
                          'colorBoton' => 'btn-success',
                          'textoBoton' => 'Regresar',
                          'menu' => false,
                          'admon' => true,
                        ];

            }
            else
            {
               //mandamos mensaje de que se agrego correctamente
               $datos = ['title' => 'Error' ,
                          'subtitulo' => 'No se pudo procesar la solicitud!.',
                          'texto' => 'El usuario no se pudo agregar al sistema, intentelo de nuevo o comuniquese con el departamento de sistemas',
                          'url' => 'adminUsuarios',
                          'color' =>'alert-danger',
                          'colorBoton' => 'btn-danger',
                          'textoBoton' => 'Regresar',
                          'menu' => false,
                          'admon' => true,
                        ];

            }

            $this->vista('mensajeVista' , $datos);

         }
      }
      else
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
}




 ?>
