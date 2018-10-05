# PHP

[Guia oficial en español](http://php.net/manual/es/)


__Instalación__

Ejecutar el scripts incluido en el repositorio https://github.com/ricpelo/conf

`~/.conf/scripts/php-install.sh`

A parte de instalar PHP este script configura ciertos parámetros dentro de `/etc/php/7.1/cli/php.ini`    


`error_reporting = E_ALL                                                                      
display_errors = On
display_startup_errors = On
date.timezone = 'UTC' `


Php esta compuesto por datos e intrucciones.

Datos: expresiones, una expresión se pueden evaluar y dan un dato.  `4 + 3 * 5 = 19`

Instrucciones: sentencias, una sentencia se ejecuta y lleva a cabo la acción asociada a esa sentencia.

- Php
  - expresiones
    - `4 + 3 * 5 = 19`
    - `cos(45) + 3`
  - sentencias
    - simples
      - `$var = 'Efecto_lateral';`
      - `echo 2 + 2;`
    - compuestas: Estructuras de control
      - `if ($a > $b){echo "a es mayor que b";}`

__Comandos__

`echo 2 + 2;` Imprime a la salida el resultado de evaluar  2 + 2.
 Los comandos no llevan paréntesis al contrario que las funciones.

__Interprete__

- Ejecución
  - Por lotes
    - Interprete `archivo.php`
    - Embebido
      - El código debe dew estar encerrado entre `<?php` y `?>`
      Ejemplo `<?php echo "Hola" ?>`
  - Interactivo, muy util para aprender. Vas dando sentencia a sentencia y el interprete va resolviendo esas sentencias una a una. Desde el terminal `php -a` abre el interprete interactivo del php. Aunque en clase usaremos una más avanzado el [psysh](https://psysh.org/). Con el scrypt de Ricardo ya lo hemos instalado. Desde el terminal `psysh` abre el psysh.


  __Modo PHP y HTML__

  Cuando el interprete entra en un archivo entra siempre en modo HTML y cuando lee `<?php`  pasa a modo PHP hasta que encuentra `?>` entonces vuelve al modo HTML.

  En el modo HTML vuelca todo a la salida y no analiza nada, lo que entra sale y cuando este esta en modo PHP analiza cogiho PHP.

  ```
  Pepe
  Juan
  <?php echo "hola "; ?>
  María

  ```
  ====>
  ```
  Pepe
  Juan
  hola  María
  ```

  `?>` Cumple la función de terminador de sentencia, así que podemos ahorrarnos el punto y comas `;`

  `<?php echo "hola "; ?>`  => `<?php echo "hola "?>`


    Con `<?= expresion ?>` Volcamos a la salida el resultado de la expresión. es equivalente a `<?php echo expresion ?>`

    `<?= expresión ?>`  igual a `<?php echo expresión ?>`

    `<?php echo expresión ?>` se utiliza tanto que el lenguaje nos facilita la tarea con una forma simplificada: `<?= expresión ?>`

    Si el archivo solo contiene PHP la etiqueta de apertura `<?php` al principio del documento para que sea alo primeto que se encuentra el interprete. Y se considera una norma de estilo no poner la etiqueta de cierre `?>`

    __Variables__

    Las variables deben de empezar con `$` , `$variable` y es sensible a mayúsculas y minúsculas.
    En PHP las variables no se deben declarar, en el momento que la usas se crean. Y para destruirla se usa `unset($a)`

    Los valores se asignan con `=` y es una asignación destructiva. `$a = 0`

    __Asignación por referencia__

    Con `=&` podemos apuntando al mismo dato
    ```
    $a = 20
    $b =& $a
    $b = 50
    $a  #$a contiene 50
    ```

    __Variables predefinidas__

    `$argc` y `$argv`

    `$argc` contiene el numero de argumentos que se le pasan al script, el propio nombre del script se considera un argumento

    ```
    > php saludo.php argumento1 argumento2  # $argc tendria el valor 3
    ```

    $argv` contiene los parámetros

    ###Tipos de variables
    #### Tipos primitivos

    __Tipos escalares__

    bool `true` o `false`, los operadores logicos podemos verlos en la [documentación de PHP](http://php.net/manual/es/language.operators.logical.php) y se evalúan en cortocircuito.

    __Enteros__

    `int`

    int es el tipo entero, si se antepone al número 0b se interpreta que el numero se va a escribir en binario, 0 octal y 0x hexadecimal.

    Con `PHP_INT_SIZE` podemos saber cuanto ocupa un entero, con `PHP_INT_MIN` y `PHP_INT_MAX` podemos saber el entero mas pequeño y mas grande que podemos almacenar. Esto dependera del sistema (32 o 64 bits). Si no cabe se combierte a `float`

    No existen las divisiones enteras como en Java

    ```PHP
    <?php
    var_dump(25/7);         // float(3.5714285714286)
    var_dump((int) (25/7)); // int(3)
    var_dump(round(25/7));  // float(4)
    ?>
    ```


    __Reales__

    `float` o `double`

    ```PHP
    <?php
    $a = 1.234;
    $b = 1.2e3;
    $c = 7E-10;
    ?>
    ```

    ###Advertencia
    ####Precisión del punto flotante ([Extracto de la guia de PHP](http://php.net/manual/es/language.types.float.php))

>Los números de punto flotante tienen una precisión limitada. Aunque depende del sistema, PHP típicamente utiliza el formato de doble precisión IEEE 754, el cual dará un error relativo máximo por aproximación del orden de 1.11e-16. Las operaciones aritméticas elementales no podrán generar grandes errores y, por supuesto, se han de considrar los errores por propagación al componer varias operaciones.

>Adicionalmente, los numeros racionales que son representables exactamente como números de punto flotante en base 10, como 0.1 o 0.7, no tienen una representación exacta como números de punto flotante en base 2, que es la base empleada internamente, sin importar el tamaño de la mantisa. Por lo tanto, no se pueden convertir en sus equivalentes binarios internos sin una pequeña pérdida de precisión. Esto puede conducir a resultados confusos: Por ejemplo, floor((0.1+0.7)*10) usualmente devolverá 7 en lugar del 8 previsto, ya que la representación interna será algo así como 7.9999999999999991118....

>Por tanto, nunca se ha de confiar en resultados de números flotantes hasta el último dígito, y no comparar la igualdad de números de punto flotante directamente. Si fuera necesaria una mayor precisión, están disponibles las funciones matemáticas de precisión arbitraria y las funciones de gmp.



    y
    string

    __Tipos compuestos__

    array,
    object,
    callable y
    iterable   



    __Tipos especiales__

    resource y NULL
