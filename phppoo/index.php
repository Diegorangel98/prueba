<?php

class Usuario
{
    public $nombre;
    public $correo;
    public $contraseña;
    public $cargo;

        function mostrarDatos(){
            $nombre = "carlos";
            echo "hola ".$nombre." tu correo es";
        }
}

$usuario1 = new Usuario();
$usuario1->mostrarDatos();