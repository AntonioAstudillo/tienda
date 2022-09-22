<?php

/**
 * Administrador Modleo
 */
class AdminModelo
{
   private $database;
   private $conexion;

   function __construct()
   {
      $this->database = new Mysql();
      $this->conexion = $this->database->getConexion();

   }

   /**
    * [validarUser Con esta función vamos a validar que un usuario exista y que la clave coincida con el password que nos ingreso en el login ]
    * @param  [String] $usuario               [El correo de identificacion que se utiliza en el login para poder ingresar]
    * @return [String or Boolean]          [Retornamos la clave hasheada que tenemos almacenada en la BD en caso de existe, en caso de error retornamos un valor booleano (false)]
    */
   public function validarUser($usuario)
   {
      $query = "SELECT clave FROM administradores WHERE correo = ?";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($usuario));

      return $statement->fetch(PDO::FETCH_ASSOC);

   }

   /**
    * * Con esta funcion, vamos a actualizar el campo login_dt dentro de mi tabla administradores, para de esa forma saber cual fue la ultima conexion del usuario
    * @param  [String] $datetime               [La hora y dia de la conexion del usuario]
    * @param  [String] $user               [El usuario que se logeo ]
    * @return [Boolean]           [True en caso de exito , false en caso de error]
    */
   public function updateLogin($datetime , $user)
   {
      $query = "UPDATE administradores SET login_dt = ? WHERE correo = ?";
      $statement = $this->conexion->prepare($query);
      $statement->execute(array($datetime , $user));

      return $statement->rowCount();
   }
}



 ?>
