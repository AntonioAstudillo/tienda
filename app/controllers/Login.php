<?php


class Login extends Controlador{
   private $modelo;

   function __construct(){

      /*En esta linea, creo una instancia de la clase LoginModelo. Para posteriormente poder hacer uso de sus metodos */
      $this->modelo = $this->modelo('LoginModelo');
   }

   //Metodo utilizado por default para el sistema. En este metodo mostramos la vista de login
   public function index(){
      $datos = ['title' => 'Login'];
      $this->vista('loginVista' , $datos);
   }

   //Metodo utilizado para implementar la logica de olvido de contraseña
   public function olvido()
   {
      $errores = array();

      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
         $data['correoR'] = isset($_POST['correoR']) ? helpers::limpiarDato($_POST['correoR']): "";

         if($data['correoR'] === '')
         {
            $errores[] = 'Correo incorrecto';
         }
         else
         {
            if(!filter_var($data['correoR'] , FILTER_VALIDATE_EMAIL))
            {
               $errores['correoR'] = 'El correo es incorrecto';
            }
         }

         if(count($errores) > 0) {
            //mostramos vista de errores


            $datos = ['title' => 'Error de correo' ,
                      'subtitulo' => 'No pudimos procesar su solicitud',
                      'texto' => 'El correo es incorrecto',
                      'color' => 'alert-danger',
                      'url' => 'login/olvido',
                      'colorBoton' => 'btn-danger',
                      'textoBoton' => 'Regresar'
                     ];

            $this->vista('mensajeVista' , $datos);

         }
         else
         {

            if($this->validarCorreo($data['correoR']))
            {

               //ejecutamos metodo del modelo enviar correo
               if($this->modelo->enviarCorreo($data['correoR']))
               {
                  //definimos variables para mostrar en vista
                  $datos = ['title' => 'Recuperación' ,
                            'subtitulo' => 'Correo enviado ',
                            'texto' => "Se te envio un correo de recuperación a la siguiente dirección <b>". $data['correoR']. '</b>',
                            'color' => 'alert-success',
                            'url' => 'login',
                            'colorBoton' => 'btn-success',
                            'textoBoton' => 'Regresar'
                           ];


               }
               else
               {

                  $datos = ['title' => 'Error de correo' ,
                           'subtitulo' => 'No pudimos procesar su solicitud',
                           'texto' => 'Existió un problema al enviar el correo electrónico. Prueba por favor más tarde o comuníquese a nuestro servicio de soporte técnico.',
                           'color' => 'alert-danger',
                           'url' => 'login/olvido',
                           'colorBoton' => 'btn-danger',
                           'textoBoton' => 'Regresar'
                           ];
               }
            }
            else
            {
               $datos = ['title' => 'Error de correo' ,
                         'subtitulo' => 'No pudimos procesar su solicitud',
                         'texto' => 'El correo no existe',
                         'color' => 'alert-danger',
                         'url' => 'login/olvido',
                         'colorBoton' => 'btn-danger',
                         'textoBoton' => 'Regresar'
                        ];


            }

            $this->vista('mensajeVista' , $datos);


         }
      }
      else
      {
         $datos = ['title' => 'Recuperar contraseña' ,
                  'subtitulo' => '¿Olvidaste tu contraseña?',
                  'url' => 'menu'
            ];

         $this->vista('olvidoVista' , $datos);
      }


   }

   //Metodo utilizado para registrar un usuario al sistema
   public function registrar()
   {
      $errores = array();
      $data = $_POST;

      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
         $data['nombre'] = isset($_POST['nombre']) ? helpers::limpiarDato($_POST['nombre']): "";
         $data['apellidoP'] = isset($_POST['apellidoP']) ? helpers::limpiarDato($_POST['apellidoP']): "";
         $data['apellidoM'] = isset($_POST['apellidoM']) ? helpers::limpiarDato($_POST['apellidoM']): "";
         $data['correo'] = isset($_POST['correo']) ? helpers::limpiarDato($_POST['correo']): "";
         $data['clave1'] = isset($_POST['clave1']) ? helpers::limpiarDato($_POST['clave1']): "";
         $data['clave2'] = isset($_POST['clave2']) ? helpers::limpiarDato($_POST['clave2']): "";
         $data['direccion'] = isset($_POST['direccion']) ? helpers::limpiarDato($_POST['direccion']): "";
         $data['ciudad'] = isset($_POST['ciudad']) ? helpers::limpiarDato($_POST['ciudad']): "";
         $data['estado'] = isset($_POST['estado']) ? helpers::limpiarDato($_POST['estado']): "";
         $data['codigoP']= isset($_POST['codigoP']) ? helpers::limpiarDato($_POST['codigoP']): "";
         $data['pais'] = isset($_POST['pais']) ? helpers::limpiarDato($_POST['pais']): "";
         $data['colonia'] = isset($_POST['colonia']) ? helpers::limpiarDato($_POST['colonia']): "";


         //Validamos los datos
         if($data['nombre'] == ''){
            $errores['nombre'] =  "El nombre es requerido";
         }

         if($data['apellidoP'] == ''){
            $errores['apellidoP'] =  "El apellido paterno es requerido";
         }

         if($data['apellidoM'] == ''){
            $errores['apellidoM'] = 'El apellido materno es requerido';
         }

         if(!filter_var($data['correo'] , FILTER_VALIDATE_EMAIL)){
            $errores['correo'] = 'El correo es incorrecto';
         }else{

            if($this->validarCorreo($data['correo'])){
               $errores['correo'] = 'Correo ya registrado!';
            }
         }

         if($data['clave1'] == ''){
            $errores['clave1'] = 'La contraseña es requerida ';
         }

         if($data['clave2'] == '' || $data['clave2'] != $data['clave1']){
            $errores['clave2'] = 'La contraseña es incorrecta';
         }

         if($data['direccion'] == ''){
            $errores['direccion'] = 'La direccion es requerida';
         }

         if($data['ciudad'] == ''){
            $errores['ciudad'] = 'La ciudad es requerida';
         }

         if($data['estado'] == ''){
            $errores['estado'] = 'El estado es requerido';
         }

         if($data['codigoP']== ''){
            $errores['codidoP'] = 'El código postal es requerido';
         }

         if($data['pais'] == ''){
            $errores['pais'] = 'El país es requerido';
         }

         if($data['colonia'] == ''){
            $errores['colonia'] = 'La colonia es requerida';
         }

         //Comprobamos si existen errores
         if(count($errores) > 0){
            $datos = ['title' => 'Registrar Usuario' , 'errores' => $errores];
            $this->vista('registroVista' , $datos);
         }else{
            /*Aqui se supone que los datos ya son correctos, asi que ahora los insertaremos en la tabla usuarios */
            $data['password'] = Helpers::encriptar($data['clave1']);
            $data['fecha'] = Helpers::getTimeStamp();


            if($this->modelo->insertarUsuario($data)>0){

               $datos = ['title' => 'Bienvenido a la tienda virtual' ,
                         'subtitulo' => 'Bienvenid@ a nuestra tienda',
                         'texto' => 'Gracias por su registro',
                         'color' => 'alert-success',
                         'url' => 'menu',
                         'colorBoton' => 'btn-success',
                         'textoBoton' => 'Iniciar'
                        ];

               $this->vista('mensajeVista' , $datos);

            }else{
               $datos = ['title' => 'Error de registro' ,
                         'subtitulo' => 'No pudimos procesar su solicitud',
                         'texto' => 'Tuvimos problemas al registrar',
                         'color' => 'alert-danger',
                         'url' => 'login',
                         'colorBoton' => 'btn-danger',
                         'textoBoton' => 'Regresar'
                        ];

               $this->vista('mensajeVista' , $datos);
            }

         }

      }else{
         $datos = ['title' => 'Registrar Usuario'];
         $this->vista('registroVista' , $datos);
      }



   }//cierra funcion registrar

   /*Data es un valor que llega de la URL, el cual simula el id del usuario al cual le vamos a modificar la clave*/
   public function cambiaClave($data){
      $errores = array();

      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $id = isset($_POST['idUser']) ? $_POST['idUser'] : '';
         $clave1 = isset($_POST['clave1']) ? $_POST['clave1'] : '';
         $clave2 = isset($_POST['clave2']) ? $_POST['clave2'] : '';

         if($clave1 == ''){
            array_push($errores , 'Debe ingresar una clave');
         }
         else if($clave2 == ''){

            array_push($errores , 'Debe ingresar la clave de verificación');

         }else if($clave1 != $clave2){

            array_push($errores , 'Las claves ingresadas no coinciden');
         }

         if(count($errores) > 0){
            $datos = ['title' => 'Cambiar clave' ,
                     'subtitulo' => 'Cambia la clave de acceso',
                     'data' => $data,
                     'errores' => $errores
               ];

            $this->vista('cambiarClaveVista' , $datos);

         }
         else
         {
            $clave = Helpers::encriptar($clave1);



            if($this->modelo->cambiarClaveAcceso($id , $clave) > 0)
            {
               $datos = ['title' => 'Clave cambiada' ,
                         'subtitulo' => 'Clave modificada',
                         'texto' => 'La clave se modifico con exito',
                         'color' => 'alert-success',
                         'url' => 'login',
                         'colorBoton' => 'btn-success',
                         'textoBoton' => 'Regresar'
                        ];
            }else{
               $datos = ['title' => 'Clave cambiada' ,
                         'subtitulo' => 'Error al cambiar clave ',
                         'texto' => 'La clave no se pudo modificar, intentelo de nuevo. ',
                         'color' => 'alert-danger',
                         'url' => 'login/cambiaClave/1',
                         'colorBoton' => 'btn-danger',
                         'textoBoton' => 'Intentar otra vez'
                        ];
            }

            $this->vista('mensajeVista' , $datos);

         }

      }
      else{
         $datos = ['title' => 'Cambia la clave' ,
                  'subtitulo' => 'Cambia la clave de acceso',
                  'data' => $data
            ];

         $this->vista('cambiarClaveVista' , $datos);

      }





   }

   /**
    * [validarCorreo Esta función recibe un String y retorna un valor booleano. Su funcionalidad es la de validar si un correo ya existe en la DB]
    * @param  [String] $correo [Correo electronico ingresado por el usuario ]
    * @return [Boolean]         [Retorna True en caso de que el correo ya exista, de lo contrario retorna false]
    */
   public function validarCorreo($correo){
      return ($this->modelo->validarCorreo($correo) > 0 ) ? true : false;
   }

   public function verifica(){
      $respuesta = '';

      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $user = isset($_POST['user']) ? Helpers::limpiarDato($_POST['user']) : '';
         $password = isset($_POST['password']) ? Helpers::limpiarDato($_POST['password']) : '';
         $respuesta = $this->modelo->verificar($user);

         if($respuesta !== false)
         {

            //Verificamos que la contraseña o clave, sea igual al hash que está almacenada en la database para darle acceso al usuario a la tienda
            $respuesta = password_verify($password , $respuesta['clave']);

            if($respuesta){
               //obtengo la información del usuario para crear la sesion
               $dataUser = $this->modelo->getDataForEmail($user);

               //Hago una instancia de la clase sesion
               $sesionObj = new Sesion();
               $sesionObj->iniciarLogin($dataUser);
               header("Location:".RUTA."tienda");

            }else{
               $datos = ['title' => 'Login',
                         'errores' => 'Datos incorrectos',
                          'user'=> $user,
                          'password'=>$password];
               $this->vista('loginVista' , $datos);
            }

         }else{
            $datos = ['title' => 'Login',
                      'errores' => 'No existe ese usuario',
                       'user'=> $user,
                       'password'=>$password];
            $this->vista('loginVista' , $datos);
         }
      }
   }




}



 ?>
