<?php
    /**
     * Muestra la tabla de multiplcar.
     * @param  string|int $numero El número del cual sacar la tabla.
     */
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

      /**
       * Muestra un mensaje de error.
       * @param  string $mensaje El mensaje de error.
       */
      function mostrarError($mensaje)
      {
        echo "<h3 style=color: #936;>$mensaje</h3>";
      }
