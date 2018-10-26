<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Tabla </title>
</head>
<body>
    <?php $numero = isset($_GET['num']) ? $_GET['num'] : ''?>
    <form action="" method="get">
    <label for="num">Número</label>
    <input id="num" type="text" name="num" value="<?= $numero  ?>">
    <input type="submit" name="" value="Calcular">
    </form>
    <?php
    require './auxiliar.php';
    if (!empty($numero)) {
        if (!ctype_digit($numero)){
            mostrarError('Error: Se ha pasado algo que no es un número');
        } else {
            if ($numero < 0 || $numero > 10) {
                mostrarError('El número pasado debe de estar entre 0 y 10');
            } else {
                mostrarTabla($numero);
            }
        }
    }
    ?>
    </body>
    </html>
