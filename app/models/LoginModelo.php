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
}


 ?>
