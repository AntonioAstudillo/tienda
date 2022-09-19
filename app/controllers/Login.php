<?php


class Login extends Controlador{
   private $modelo;

   function __construct(){

      /*En esta linea, creo una instancia de la clase LoginModelo. Para posteriormente poder hacer uso de sus metodos */
      $this->modelo = $this->modelo('LoginModelo');
   }

   public function index(){
      $datos = ['title' => 'Login'];
      $this->vista('loginVista' , $datos);
   }

   public function olvido(){
      $datos = ['title' => 'Recuperar Password'];
      $this->vista('olvidoVista' , $datos);
   }

   public function registrar(){
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

   /**
    * [validarCorreo Esta función recibe un String y retorna un valor booleano. Su funcionalidad es la de validar si un correo ya existe en la DB]
    * @param  [String] $correo [Correo electronico ingresado por el usuario ]
    * @return [Boolean]         [Retorna True en caso de que el correo ya exista, de lo contrario retorna false]
    */
   public function validarCorreo($correo){
      return ($this->modelo->validarCorreo($correo) > 0 ) ? true : false;
   }



}



 ?>
