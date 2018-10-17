<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabla </title>
  </head>
  <body>
    <?php
    function mostrarTabla($numero)
    {
      ?>
        <table border="1">
          <thead>
            <th><?= $numero ?></th>
            <th>x</th>
            <th>n</th>
            <th> = </th>
            <th>m</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i <= 10 ; $i++):?>
              <tr>
                <td><?= $numero  ?></td>
                <td>x</td>
                <td><?= $i ?></td>
                <td> = </td>
                <td><?= $numero * $i  ?></td>
              </tr>
            <?php endfor ?>
          </tbody>
        </table>
        <?php
      }
      function mostrarError($mensaje)
      {
        echo "<h3 style='color: #936;'>$mensaje</h3>";
      }

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
