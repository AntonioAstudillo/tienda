<?php

/**
 * Control maneja la URL y lanza los procesos
 */
class Control
{

   private $controlador;
   private $metodo;
   private $parametros;

   function __construct()
   {
      //Controlador y metodo por default
      $this->controlador = 'Login';
      $this->metodo = 'index';
      //Los parametros por default son un arreglo vacio 
      $this->parametros = array();

      //Convierto lo que me mandan en la URL en un arreglo
      $url = $this->separarURL();


      //Compruebo que la variable url no esté vacia y que dentro de mi controllers, exista ese Controlador
      //Si existe se lo asigno a mi atributo controlador.
      if($url != '' && file_exists('../app/controllers/'.ucwords($url[0]). '.php' ))
      {
         $this->controlador = ucwords($url[0]);
         unset($url[0]);
      }

      /*Incluimos el archivo controlador del valor que nos mandaron en la url
        para de esa forma, hacer una instancia de la clase que contenga ese archivo
        El procedimiento de instanciar, se realiza de forma dinamica */
      require_once '../app/controllers/'.$this->controlador.'.php';
      $this->controlador = new $this->controlador;


      //Llamamos los metodos

      /* Comprobamos si está seteada la posicion 1 de mi arreglo url, la posicion 1 corresponde al metodo
         Dicho valor me lo mandan desde la url */

      if(isset($url[1]))
      {
         //Si esta seteado y ese valor es un metodo de mi clase Controlador, entonces yo se lo asigno a mi atributo metodo
         if(method_exists($this->controlador , $url[1])){
            $this -> metodo = $url[1];
            unset($url[1]); //eliminamos valor despues de asignarlo
         }
      }

      //Asignamos todo lo que tenga la variable url, si no hay valores creamos un array vacio
      $this->parametros = $url ? array_values($url) : [];


      /*El metodo call_user_func_array manda a llamar una funcion y a esa funcion le manda una serie de parametros
        En este caso le estamos mandando dos parametros, en el primer parametro le indicamos la clase y el metodo que tiene dicha clase
        y en el segundo parametro, le mandamos nuestro atributo que lleva el mismo nombre(parametros)*/
      call_user_func_array([$this->controlador , $this->metodo] , $this->parametros);



   }//cierra constructor

   /*
      Con esta función yo lo que hago, es leer lo que me manden desde la URL en mi variable global GET y creo un arreglo por medio de la funcion explode

      Las caracteristicas generales de ese arreglo son :
      El primer parametro que manden, será el controlador
      El segundo parametro sera el metodo
      Y lo demas, seran parametros

    */
   function separarURL()
   {
      $url = '';

      if(isset($_GET['url']))
      {
         //eliminamos el caracter final si es que existe
         $url = rtrim($_GET['url']  , '/');
         $url = rtrim($_GET['url']  , '\\');

         //limpiamos caracteres no propios para la url
         $url = filter_var($url , FILTER_SANITIZE_URL);

         //Separamos string y lo convertimos en un arreglo
         $url = explode("/" , $url);

         return $url;

      }

   }// cierra metodo separarURL


}//cierra clase Control



 ?>
