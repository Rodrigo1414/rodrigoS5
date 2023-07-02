<?php
   
   class connection extends  mysqli {
       private $host = 'localhost';
       function __construct(){
        parent :: __construct('localhost','root','','semanar5');
        $this ->set_charset('utf8');
        $this->connect_error == NULL ? 'Conexión exitosa a la DB': die('Error al conectarse a la BD');
       }//end___constructor
   }//end class Connection 