<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'prueba1';

    $conection = @mysqli_connect($host,$user,$password,$db);
    if(!$conection){
        echo 'Error de la conexion';
    }
    ?>