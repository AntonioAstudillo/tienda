<?php

/**
 *
 */
class LoginModelo
{
   private $database;
   private $conexion;

   function __construct()
   {
      $this->database = new Mysql();
      $this->conexion = $this->database->getConexion();

   }

   //Insertarmos en la BD el registro de un usuario
   public function insertarUsuario($data){
      //Recibimos los datos que nos mandan del controlador, y los insertamos en la tabla usuarios.
      $query = "INSERT INTO usuarios VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array(null , $data['nombre'] , $data['apellidoP'] , $data['apellidoM'] , $data['correo'] , $data['direccion'] , $data['ciudad'] , $data['colonia'] , $data['estado'] , $data['codigoP'] , $data['pais'] , $data['password'] , $data['fecha'] ) );

      return $statement->rowCount();

   }//close insertarUsuario

   public function validarCorreo($correo){
      $query = "SELECT email FROM usuarios WHERE email = ?";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($correo));

      return $statement->rowCount();
   }


   /**
    * [getDataForEmail Con esta función, voy a obtener la información del usuario por medio de su correo y de esa forma podré enviar un correo de recuperacion personalizado]
    * @param  [String] $correo               [Correo del usuario]
    * @return [Array]         [La informacion del usuario ]
    */
   private function getDataForEmail($correo){
      $query = "SELECT nombre , apellidoPaterno , apellidoMaterno FROM usuarios WHERE email = ? ";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($correo));

      return $statement->fetch(PDO::FETCH_ASSOC);
   }

   /**
    * [enviarCorreo Con esta función, vamos a enviar un correo electronico de recuperación]
    * @param  [String] $correo               [Es el correo al cual le vamos a enviar el correo de recuperación]
    * @return [Boolean]         [Retorna true en caso de exito, false en caso de error]
    */
   public function enviarCorreo($correo){

      //Recibo el nombre del usuario (nombre , apellidoP , apellidoM) y lo concateno a una variable llamada nombre
      $datos = $this->getDataForEmail($correo);
      $nombre = $datos['nombre'] . ' ' . $datos['apellidoPaterno'] . ' ' . $datos['apellidoMaterno'];

      $objeto = new Mailer($nombre , $correo , 'Prueba1');

      return $objeto->enviarCorreo();

   }


   /**
    * [cambiarClaveAcceso Con esta función voy a modificar la clave de acceso de un cierto usuario ]
    * @param  [int] $id                  [Id del usuario a modificar]
    * @param  [String] $clave               [Nueva clave]
    * @return [Boolean]        [Retorna true en caso de exito, false en caso de error]
    */
   public function cambiarClaveAcceso($id , $clave)
   {
      $query = "UPDATE usuarios SET clave = ? WHERE id = ?";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($clave , $id));

      return $statement->rowCount();
   }

}


 ?>
