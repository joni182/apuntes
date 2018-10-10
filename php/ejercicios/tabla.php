<?php
require './auxiliar_tabla.php';

if ($argc < 2){
  muestraError("Solo admite un número");
}

if ($argc > 3){
  muestraError("Debes de introducir un número");
}

if (!ctype_digit($argv[1])){
  muestraError("Debes de introducir un número");
}

$numero = (int) $argv[1];

if ($numero < 0 || $numero > 10){
  muestraError("El número debe estar entro 0 y 10");
}

muestraTabla(tablaMult($numero),  $numero);
exit(0);
