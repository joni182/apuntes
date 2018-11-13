<?php

require 'Usuario.php';

class Subclase extends Usuario
{
    public static function quienSoy(){
        return __CLASS__;
    }
}
