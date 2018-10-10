<?php
function muestraError($mensaje)
{
  echo "Error: $mensaje\n";
  exit(1);
}

function tablaMult($numero){
  $numeros = range(0, 10);
  $tabla = [];

  foreach ($numeros as $value) {
    $tabla[$value] = $value * $numero;
  }
  return $tabla;
}

function muestraTabla($tabla, $numero)
{
  foreach (tablaMult($numero) as $k => $v){
    echo "$numero x  $k = $v\n";
  }
}
