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

- Interprete
  - Por lotes `archivo.php`
  - Interactivo, muy util para aprender. Vas dando sentencia a sentencia y el interprete va resolviendo esas sentencias una a una. Desde el terminal `php -a` abre el interprete interactivo del php. Aunque en clase usaremos una más avanzado el [psysh](https://psysh.org/). Con el scrypt de Ricardo ya lo hemos instalado. Desde el terminal `psysh` abre el psysh.
