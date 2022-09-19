<?php


class Helpers{

   /*
      Con esta funcion vamos a poder encriptar cualquier valor que nos envien como parametro. Su función principal, es la de encriptar la clave que nos envie
      el usuario desde el formulario.
    */
   public static function encriptar($dato)
   {
      $opciones = [
         'cost' => 12,
      ];

      return password_hash($dato , PASSWORD_BCRYPT , $opciones);
   }


   /*Esta función me va servir para poder llenar el campo fecha dentro de la tabla usuarios */
   public static function getTimeStamp(){
      date_default_timezone_set('America/Mexico_City');
      return date('Y-m-d h:i:s');
   }

   /**
    * [public Con esta funcion vamos a sanitizar un string, para evitar cualquier anomalia por parte del usuario ]
    * @var [String] [Valor a limpiar]
    * @return [Boolean] [String sanitizado]
    */

   public static function limpiarDato($dato){
      $dato = filter_var($dato , FILTER_SANITIZE_STRING);
      $dato = trim($dato);
      $dato = strip_tags($dato);
      $dato = htmlspecialchars($dato);

      return $dato;
   }
}




 ?>
