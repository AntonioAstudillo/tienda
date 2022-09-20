<?php

/**
 * Manejamos la sesion del usuario
 */
class Sesion
{
   private $login;
   private $usuario;

   function __construct()
   {
      $login = false;

      session_start();

      if(isset($_SESSION['usuario']))
      {
         $this->usuario = $_SESSION['usuario'];
         $this->login = true;
      }
      else{
         unset($this->usuario);
      }
   }

   public function iniciarLogin($usuario)
   {
      if($usuario){
         //Hacemos una asignacion doble, lo que me manden en usuario se lo asigno tanto a mi variable de session como a mi atributo
         $this->usuario = $_SESSION['usuario'] = $usuario;
         $this->login = true;
      }
   }

   public function finalizarLogin(){
      session_start();
      unset($this->usuario);
      $this->login = false;
      session_destroy();

   }


   public function getLogin(){
      return $this->login;

   }


   public function getUsuario(){
      return $this->usuario;

   }
}


 ?>
