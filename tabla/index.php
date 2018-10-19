<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabla </title>
  </head>
  <body>
    <form action="" method="get">
      <label for="num">Número</label>
      <input id="num" type="text" name="num" >
      <input type="submit" name="" value="Calcular">
    </form>
    <?php
    require './auxiliar.php';
      if (isset($_GET['num'])){
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
