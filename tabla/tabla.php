<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabla </title>
  </head>
  <body>
    <?php
    require './auxiliar.php'
      if (!isset($_GET['num'])){
         mostrarError("Error: falta el parámetro num");
      } else {
        $numero = $_GET['num'];
        if (!ctype_digit($numero)){
           mostrarError('Error: se ha pasado algo que no es un número');
         } else {
          mostrarTabla($numero);
        }
      }
    ?>
  </body>
</html>
