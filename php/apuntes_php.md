# PHP

com

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

    ###[Tipos de Datos](http://php.net/manual/es/language.types.php)
    #### Tipos primitivos

    __Tipos escalares__

    bool `true` o `false`, los operadores logicos podemos verlos en la [documentación de PHP](http://php.net/manual/es/language.operators.logical.php) y se evalúan en cortocircuito.

    __Enteros__

    `int`

    int es el tipo entero, si se antepone al número 0b se interpreta que el numero se va a escribir en binario, 0 octal y 0x hexadecimal.

    Con `PHP_INT_SIZE` podemos saber cuanto ocupa un entero, con `PHP_INT_MIN` y `PHP_INT_MAX` podemos saber el entero mas pequeño y mas grande que podemos almacenar. Esto dependera del sistema (32 o 64 bits). Si no cabe se combierte a `float`

    No existen las divisiones enteras como en Java

```PHP
    var_dump(25/7);         // float(3.5714285714286)
    var_dump((int) (25/7)); // int(3)
    var_dump(round(25/7));  // float(4)
```


    __Reales__

    `float` o `double`

```PHP
    $a = 1.234;
    $b = 1.2e3;
    $c = 7E-10;
```

###Advertencia
####Precisión del punto flotante ([Extracto de la guia de PHP](http://php.net/manual/es/language.types.float.php))

>Los números de punto flotante tienen una precisión limitada. Aunque depende del sistema, PHP típicamente utiliza el formato de doble precisión IEEE 754, el cual dará un error relativo máximo por aproximación del orden de 1.11e-16. Las operaciones aritméticas elementales no podrán generar grandes errores y, por supuesto, se han de considrar los errores por propagación al componer varias operaciones.

>Adicionalmente, los numeros racionales que son representables exactamente como números de punto flotante en base 10, como 0.1 o 0.7, no tienen una representación exacta como números de punto flotante en base 2, que es la base empleada internamente, sin importar el tamaño de la mantisa. Por lo tanto, no se pueden convertir en sus equivalentes binarios internos sin una pequeña pérdida de precisión. Esto puede conducir a resultados confusos: Por ejemplo, floor((0.1+0.7)*10) usualmente devolverá 7 en lugar del 8 previsto, ya que la representación interna será algo así como 7.9999999999999991118....

>Por tanto, nunca se ha de confiar en resultados de números flotantes hasta el último dígito, y no comparar la igualdad de números de punto flotante directamente. Si fuera necesaria una mayor precisión, están disponibles las funciones matemáticas de precisión arbitraria y las funciones de gmp.




  [__string__](http://php.net/manual/es/language.types.string.php)

  >Un string, o cadena, es una serie de caracteres donde cada carácter es lo
  mismo que un byte. Esto significa que PHP solo admite un conjunto de 256
  caracteres, y de ahí que no ofrezca soporte nativo para Unicode. Véanse los
  detalles del tipo string.

  Existen 4 sintaxis para crear una cadena.

  __Entrecomillado simple__

  `'Esto es un string'`. No reconoce las secuencias de escape escepto `\'` y no se expanden las variables.

  __Entrecomillado doble__

  `"Esto es un string"` Sí acepta secuencias de escape y se expanden variables.

  Cuando hay ambigüedad se puede encapsular con `{}`

Veamos el siguiente caso ambiguo

```php
$x = 25
"X vale $x a" # aquí no seria ambiguo
"X vale $xa " # esto es ambiguo ya que el interprete va a intentar expandir la variable $xa que no existe

"X vale {$x}a" # así evitamos la ambigüedad
```

  __Sintaxis heredoc__

    Es como las comillas dobles pero se usa para varias lineas. conserva espacios, salto de lineas etc. Además se expanden las variables.

```PHP
$c = <<<EOT
    if ($x==1){
      echo 'Hola'
    }
EOT;
```

  __sintaxis nowdoc__

Es al heredoc lo que las comillas simples a las comillas dobles.

__Tipos compuestos__

```PHP
$c = <<<'EOT'
    if ($x==1){
      echo 'Hola'
    }
EOT;
```

__Operaciones con cadenas__

Concatenación se lleva acabo a través del operador punto `.`

`'¡Hola ' . 'Mundo!'` => `'¡Hola Mundo!'`

A las letras de la cadena se puede acceder mediante sus posiciones, como si fuese un array. Además se pueden reemplazar letras. Aunque no soporta UTF-8.

__[Funciones de cadena](http://php.net/ref.strings)__

`ltrim("   hola   ")`   Quita los espacios de la izquierda

`rtrim("   hola   ")`   Quita los espacios de la derecha

`trim("   hola   ")`   Quita los espacios a izquierda y derecha

`strpos("Desarrollo web de entorno servidor", "entorno")` => `18` Encuentra lo primera ocurrencia de entorno y devuelve `false` si no lo encuentra

`chr(88)`   Te devuelve el caracter a partir de su código ASCII

`ord('e')`  Te devuelve el código ASCII del carácter.

`strlen('hola')`  Te devuelve la longuitud de la cadena

__mb_string__

Es un paquete que contiene muchas de las funciones de manipulación de cadena pero teniendo en cuenta los caracteres multibyte

Tienen el mismo nombre que las normales pero empezando con mb_ `strlen(adiós)` => `mb_strlen(adiós)`

`mb_substr("adiós", 3, 1)` devuelve `ó`

____

__Tipos especiales__

resource y NULL

__null__

Representa la ausencia de valor en una variable.

Se puede asignar:

`$coche = null`

__Comprobación de tipos__

`gettype($x)` Devuelve el tipo del dato que contiene $x

__is...__

`is_string($x)` Devuelve `true` si es `$x` es de tipo `string`

`is_string($x)`

`is_int($x)`

`is_bool($x)`

`is_float($x)`

`in_numeric($x)` _(Más interesante que los anteriores)_ Devuelve `true` si es un número o una cadena con forma de número

__ctype*__

`ctype_digit()` Comprueba si todos los caracteres de una cadena son dígitos

Existen muchos ctype_* :
ctype_alnum  ctype_cntrl  ctype_graph  ctype_print  ctype_space  ctype_xdigit
ctype_alpha  ctype_digit  ctype_lower  ctype_punct  ctype_upper

__Conversiones de tipo__

Castin implicito:

(tipo) $x => Valor casteado. `(string) 25` => `"25"`

`(int) "hola"` => `0` + Error

`(int) "25hola"` => `25`

Funciones _tipo_ val()

`intval(..)`  Devuelve el valor casteado a entero

`floatval(..)`  Devuelve el valor casteado a real

`strval(..)`  Devuelve el valor casteado a cadena

`boolval(..)` Devuelve el valor casteado a boleano

__Conversión a De cadena a número__

```PHP
  $foo = 1 + "10.5";                   // $foo es float (11.5)
  $foo = 1 + "-1.3e3";                 // $foo es float (-1299)
  $foo = 1 + "bob-1.3e3";              // $foo es integer (1)
  $foo = 1 + "bob3";                   // $foo es integer (1)
  $foo = 1 + "10 pequeños cerdos";     // $foo es integer (11)
  $foo = 4 + "10.2 pequeños cerditos"; // $foo es float (14.2)
  $foo = "10.0 cerdos " + 1;           // $foo es float (11)
  $foo = "10.0 cerdos " + 1.0;         // $foo es float (11)
```
__De string a bool__

`""` => `false`

`"0"` => `false`

`"Resto de cadenas"` => `true`

`$a == $b`	_Igual_	TRUE si $a es igual a $b después de la manipulación de tipos.

`$a === $b`	_Idéntico_	TRUE si $a es igual a $b, y son del mismo tipo.

`$a != $b`	_Diferente_	TRUE si $a no es igual a $b después de la manipulación de tipos.

`$a <> $b`	_Diferente_	TRUE si $a no es igual a $b después de la manipulación de tipos.

`$a !== $b`	_No idéntico_	TRUE si $a no es igual a $b, o si no son del mismo tipo.

`$a < $b`	_Menor que_	TRUE si $a es estrictamente menor que $b.

`$a > $b`	_Mayor que_	TRUE si $a es estrictamente mayor que $b.

`$a <= $b`	_Menor o igual_ que	TRUE si $a es menor o igual que $b.

`$a >= $b`	_Mayor o igual_ que	TRUE si $a es mayor o igual que $b.

`$a <=> $b`	_Nave espacial_	Un integer menor que, igual a, o mayor que cero cuando $a es respectivamente menor que, igual a, o mayor que $b. Disponible a partir de PHP 7.

`$a ?? $b ?? $c`	_Fusión de null_	El primer operando de izquierda a derecha que exista y no sea NULL. NULL si no hay valores definidos y no son NULL. Disponible a partir de PHP 7.

`$a ?: $b` _Operador Elvis_ Evalua `a` si si es `true` devuelve `$a` y si no pues devuelve $b

__Constantes__

`define('HOLA', 75)`  Se crea la constante HOLA con el valor 75. Se aconseja que se elija un nombre en mayúsculas.

`const HOLA = 75`     Se crea la constante HOLA con el valor 75. Esta sintaxis permite crear constantes de clase y constantes que contengan arrays.

Una constante no se pueden cambiar. Empiezan a existir cuando se crean hasta el final del fichero.

Con `defined('nombreDeLaConstante')`  Devuelve `true` si existe la constante.

__Constantes predefinidas(Mágicas)__

`__LINE__`	El número de línea actual en el fichero.

`__FILE__`	Ruta completa y nombre del fichero con enlaces simbólicos resueltos. Si se usa dentro de un include, devolverá el nombre del fichero incluido.

`__DIR__`	Directorio del fichero. Si se utiliza dentro de un include, devolverá el directorio del fichero incluído. Esta constante es igual que `dirname(__FILE__)`. El nombre del directorio no lleva la barra final a no ser que esté en el directorio root.

`__FUNCTION__`	Nombre de la función.



`__CLASS__`	Nombre de la clase. El nombre de la clase incluye el namespace declarado en (p.e.j. Foo\Bar). Tenga en cuenta que a partir de PHP 5.4 `__CLASS__` también funciona con traits. Cuando es usado en un método trait, `__CLASS__` es el nombre de la clase del trait que está siendo utilizado.



`__TRAIT__`	El nombre del trait. El nombre del trait incluye el espacio de nombres en el que fue declarado (p.e.j. Foo\Bar).

`__METHOD__`	Nombre del método de la clase.

`__NAMESPACE__`	Nombre del espacio de nombres actual.

`ClassName::class`	El nombre de clase completamente cualificado. Véase también ::class.

###[Estructuras de control](http://php.net/manual/es/language.control-structures.php)

__if__

```PHP
  if ($a > $b) {
    echo "a es mayor que b";
  } else {
    echo "a NO es mayor que b";
  }
```

__else if/elsif__


```PHP
/* Método incorrecto: */
  if ($a > $b):
      echo $a." es mayor que ".$b;
  else if ($a == $b): // No compilará
      echo "La línea anterior provoca un error del interprete.";
  endif;


  /* Método correcto: */
  if ($a > $b):
      echo $a." es mayor que ".$b;
  elseif ($a == $b): // Tenga en cuenta la combinación de las palabras.
      echo $a." igual ".$b;
  else:
      echo $a." no es ni mayor ni igual a ".$b;
  endif;
```

__switch__

```PHP
  switch ($i) {
      case 0:
          echo "i es igual a 0";
          break;
      case 1:
          echo "i es igual a 1";
          break;
      case 2:
          echo "i es igual a 2";
          break;
  }
```
__while__

```PHP
  $i = 1;
  while ($i <= 10) {
      echo $i++;  /* el valor presentado sería
                     $i antes del incremento
                     (post-incremento) */
  }
```
__for__

```PHP
  for ($i = 1; $i <= 10; $i++) {
      echo $i;
  }
```

__Sintaxis alternativa(Mejor para embeber código en plantillas)__


__if__

```PHP
  if ($a > $b):
    echo "a es mayor que b";
  else:
    echo "a NO es mayor que b";
  endif;
```

__elseif__

__if__

```PHP
  if ($a > $b):
    echo "a es mayor que b";
  elseif ($a == $b):
    echo "a es igual que b";
  else:
    echo "a NO es mayor que b";
  endif;
```
__switch__

```PHP
  switch ($i):
      case 0:
          echo "i es igual a 0";
          break;
      case 1:
          echo "i es igual a 1";
          break;
      case 2:
          echo "i es igual a 2";
          break;
  endswitch;
```
__while__

```PHP
  $i = 1;
  while ($i <= 10):
      echo $i++;  /* el valor presentado sería
                     $i antes del incremento
                     (post-incremento) */
  endwhile;
```
__for__

```PHP
  for ($i = 1; $i <= 10; $i++):
      echo $i;
  endfor;
```

###Arrays

En php los arrays son en realidad mapas, una estructura de clave => valor, la clave puede ser de distintos tipos y nunca se puede repetir.

Formas de declarar un array.

`$a = array(12, 22, 32)`

`$a = [12, 22, 32]`

`$a = [0 => 12, 1 => 22, 2 => 32]`

`$a[0] = 12; $a[1] = 22; $a[2] = 32;`

`$a`  =>  `[
     0 => 12,
     1 => 22,
     2 => 32,
     12 => 82,
   ]
`  Se pueden decalrar posiciones no correlativas

`$a = ["gato" => "cat"]`  La clave puede ser de distintos tipos y nunca se puede repetir.

`$a[] = "valor"` Lo añade en la última posicion con y para la clave se mirará la clave numérica más alta y le sumara uno, en ausencia dde clave numerica  le asignará un cero.

`unset($a['clave'])` Elimina la clave y el valor asociado a esa clave.

__Operaciones con arrays__

`['a', 'b', 'c'] + [2 => 'd', 3 => 'f']  ----> 'a', 'b', 'c', 'f']`  Con la suma de arrays se devuelve la suma el array de la derecha a la de la izquierda. Si hay conflictos con la clave gana el de la izquierda.

Dos arrays  son iguales si tienen los mismos elementos (claves/valor) sin importar su posicion. Con `==` no tiene en cuenta el tipo de forma estricta `['', 1, 2] == [false, 1, 2] -----> true`, `['', 1, 2] === [false, 1, 2] -----> false`

__Recorrer arrays__

__foreach__

Para recorre elementos traversables como arrays, objetos ..

sintaxis
```PHP
foreach ($a as $k => $v){
  echo "$k es la clave y $v es el valor.";
}
```

En caso de no querer usar las claves hay una _forma simplificada_

```PHP
foreach ($a as $v){
  echo "$v es el valor.";
}
```

_Script de ejemplo_

```PHP
unset($argv[0]);
foreach ($argv as $v){
  echo "Hola $v!\n";
}
```

###Funciones definidas por el usuario

`function hola($parametro){}` Los parámetros se pasan por valor, así que si dentro de la función se modifica el parámetro no afecta a la variable externa a la función. En caso de querer pasar un parámetro por referencia se usa `&` antes de la variable `&$variable`

  __Argumentos por defecto__

Se pueden definir argumentos por defecto, en el ejmplo de abajo si se le pasan los dos argumentos devolverá la suma de los dos argumentos, pero si no se le pasa el argumento `$b` tomará el valor `5`, que es el que hemos especificado por defecto.

  ```php
  function suma($a, $b = 5)
  {
    return $a + $b;
  }
  ```
Si ponemos argumentos con valores por defecto estos deben estar al final de la lista de parámetros.

Se puede usar como valor por defecto se puede usar cualquier expresión constante, como una variable constante o una función constante.

Se pueden declarar los tipos de los argumentos y lo que devuelve la función, aunque el interprete hace una conversión implícita, de forma que puedes pasarle una cadena que se pueda convertir a entero.

```php
function suma(int $a, int $b = 5): int
{
  return $a + $b;
}
```

Además, cuando se tipa los parametros el null no se castea si no que dar un error. Para que admita nulos hay que poner `?` delante del tipo. Se convierte en un tipo nullable.


```php
function suma(?int $a, ?int $b = 5): ?int
{
  return $a + $b;
}
```

__Tipo void__

Se puede usar el tipo `void` para especificar que la fn no devuelve nada. Una funcion devuelve `void` realmente devuelve un `null`

```php
function suma(?int $a, ?int $b = 5): void
{
  echo $a + $b;
  return;
}
```

__Tipado estricto__

No permite el casteado de tipos en argumentos y devoluciones de fn. Se activa en el fichero donde esta la llamada a la fn. Existe una excepción, cuando espera un `float` y se le pasa un `int`

___Definición de la función:___
```php
function suma(?int $a, ?int $b = 5): ?int
{
  return $a + $b;
}
```
___Llamada a la función___

```php
declare(strict_type=1);

suma(4, 8);
```

###Ámbitos

 + ámbitos
    + "Global": Definidas a nivel de fichero. Desde el momento que se les da un valor hasta el final del fichero. No son visibles desde dentro de las funciones a menso que lo especifiques en la función con `global $var`.
    ```php
          $x = 5;

          function suma($a)
          {
            global $x;
            return $a + $x;
          }
    ```
    + Locales: Se definen dentro de una función. Solo existen dentro de una función y dejan de existir fuera.
    + [Superglobales](http://php.net/manual/es/language.variables.superglobals.php): Son variables autodefinidas y que se pueden usar en cualquier ambito.

      + `$GLOBALS`
      + `$_SERVER`
      + `$_GET`
      + `$_POST`
      + `$_FILES`
      + `$_COOKIE`
      + `$_SESSION`
      + `$_REQUEST`
      + `$_ENV`


###Instalacion Docblockr

Docblockr ayuda a documentar tu código agregando delante de cada función un comentario pon información util para documentar el código.

En Atom pulsmas `ctrl+,`, vamos a  `install` y en le buscador pulsamos `docblockr` y pulsamos en instalar.

__Para usarlo__

En la linea antes de una función ponemos `/**` y luego `intro` y automaticamente se debe de autocompletar el el comentario con huecos para rellenar.

```PHP
    /**
     * Se le pasa un nombre y devuelve un saludo con el nombre que se le pasa
     * @param  string $nombre Nombre para saluar
     * @return string         Devuelve un saludo con el nombre que se le pasa
     */
    function saluda(string $nombre): string
    {
      return "Hola $nombre";
    }
```
### Contextos de Php
__SAPI(Server Api)__

Define el contexto de ejecución del PHP. En que ambiente se ejecuta el interprete.

+ __SAPI__
  + __CLI__ (_Linea de comandos_): Existen `$argc` y `$argv`, se pueden leer de la entrada estándar (`stdin`) y volcar a las salida estadar (`stdout`)

  + __CGI__ (Common Getaway Interface): Para que se comunique con el servidor mediante CGI, existe una opcion moderna , el FastCGI(FPM). De esta manera se tienen el apache y el php como dos procesos independientes y que se comunican por FastCGI.

  + __Apache__: El interprete se ejecuta como un módulo de apache. Es el que vamos a usar en DWESE.


  __Modulos apache__

  Los modulos disponibles de apache se encuentran en `/etc/apache2/mods-availables`.

  Para activar un modulo `sudo a2enmod <modulo>` y para desactivarlos `sudo a2dismod <modulo>`

  El documentRoot, que es la carpeta raiz del servidor, del apache se define en `/etc/apache2/sites-enables/000-default.conf`

  El documentRoot se encuentra por defecto en `/var/www/html`

  _ejemplo_

  Dentro de `/var/www/html` creamos un un documento `pepito.php`

  con el siguiente contenido:

```PHP
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pepito</title>
  </head>
  <body>
    <?php echo 'Hola pepito' ?>
  </body>
</html>
```
Al entrar desde el navegador en la url `localhost/pepito.php` Deberá verse en la pantalla `Hola pepito`

Lo que ocurre es que al pedilrle al servidor `pepito.php` el interprete ha mandado a la salida todo el codigo html sin interpretarlo, y lo que esta ente `<?php` y `?>` lo interpreta y lo vuelca a la salida.

Osea el interprete entra en el documento en modo HTML, va volcando a la salida todo lo que va leyendo sin interpretar, cuando se encuentra un `<?php` interpreta el codigo php y vuelca a la salida `Hola pepito` , cuando se encuentra con `?>` vuelve al modo html y termina de volcar a la salida todo lo que queda.

 De forma que al navegador le llega lo siguiente:

  ```PHP
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Pepito</title>
    </head>
    <body>
    Hola pepito
    </body>
  </html>
  ```

__Arrancar servidor integrado de php__

`php -S localhost:8000` Inicia el servidor integrado de php. El documentRoot del servidor será desde donde se ejecute  el comando.

__Recoger parámetros por GET y POST (`$_GET, $_POST`)__

`$_GET` Es una array que contiene la información enviada por get. Se accede colocando como clave el nombre que se le ha dado al parámetro enviado por get. Ejemplo:

__Petición__ `localhost:8000/tabla.php?num=6`

__Acceso__ `$_GET['num']`


##Objetos

`$a = new Algo()` La variable `$a` apunta por referencia al objeto.

`$b = $a` Ahora `$b` apunta al mismo objeto, en caso de `$a = new OtraCosa()` cada variable apuntará a objetos diferentes.

`$b =& $a` Ahora `$a` y `$b` comparten el puntero que apunta a un abjeto, de qforma que si `$a = new cosilla()` las dos variables apuntan conjuntamente a un objeto de la clase `Cosilla`.

`$a = new Algo(); $b = clone $a` Ahora cada variable apuntan a dos objetos diferentes.

`Clase::CONSTANTE` Con el operador doble dos puntos `::` se pueden llamar a costantes y métodos de clase.

## Clase DateTime

`$a = new DateTime` Devuelve un objeto que contiene un instante de tiempo actual en UTC.

`$a->getTimestamp()` Devuelve el instante de tiempo, en formatos segundos a partir de la medianoche de 1/1/1970

`$a->getTimezone()` Devuelve un objeto del tipo `DateTimeZone`

`$a->setTime($hora, $minutos, $segundos)` Redefine el instante que contiene el objeto.

`$a->diff($b)` Siendo `$b` un objeto de `DateTime` devuelve un intervalo de tiempo de la clase `DateInterval` Es como restar a `$b` - `$a`


## Exepciones y errores

Cuando hay una situación anómala del programa se lanza una excepción, una vez se lanza va subiendo por la pila de llamadas y si nada la captura causa el fin de la ejecución del programa.

Pueden ser lanzadas por el propio programa o por algo externo a ella.

+ errores

    + error
    + notice
    + warning
    + etc

+ exception (Clase lanzable)

+ error (Clase lanzable)

    + TypeError

        + ArgumentCountError

    + ArithmeticError

        + DivisionByZeroError

+ CompileError


Capturar Excepciones
```php
    try {

    } catch (Exception $e) {
        echo $e->getMessage()
    }

```

Capturar Errores
```php
    try {

    } catch (Error $e) {
        echo $e->getMessage()
    }

```

Capturar Excepciones y Errores
```php
    try {

    } catch (Exception|Error $e) {
        echo $e->getMessage()
    }

```

Capturar lanzable
```php
    try {

    } catch (Trowable $e) {
        echo $e->getMessage()
    }

```

##  Conectarse a una base de Datos

Desde PHP se puede instanciar un objeto de la clase `PDO` para manejar la conexión a la base de datos.

DSN Data Source Name: `"pgsql:host=localhost;dbname=fa"`

`$pdo = new PDO("tipoDb:host=localhost;port=5432;dbname=nombreDB",'usuario','contraseña');`

ejemplo_

`$pdo = new PDO("pgsql:host=localhost;dbname=fa",'fa','fa');`

### Hacer una consulta

`$pdo = new PDO("pgsql:host=localhost;dbname=fa",'fa','fa');`

Creamos una sentencia

`$st = $pdo->query('SELECT * FROM GENEROS');` dentro de `$st` se crea un objeto de la clase `PDOStatement` que contiene el resultado, en este momento la sentencia ya se ejecutado. En caso de error devuelve `false`.

`$res = $st->fetchAll();` En `$res` se vuelca un array que contiene un elemento por cada fila. Ese elemento es un array.

```PHP

[
    [
      "id" => 1,
      0 => 1,
      "genero" => "Comedia",
      1 => "Comedia",
    ],
    [
      "id" => 2,
      0 => 2,
      "genero" => "Terror",
      1 => "Terror",
    ],
    [
      "id" => 3,
      0 => 3,
      "genero" => "Ciencia-Ficción",
      1 => "Ciencia-Ficción",
    ],
    [
      "id" => 4,
      0 => 4,
      "genero" => "Drama",
      1 => "Drama",
    ],
    [
      "id" => 5,
      0 => 5,
      "genero" => "Aventuras",
      1 => "Aventuras",
    ],
  ]



```

`$st->fetch()` Delvuelve la siguiente fileatime.

`$st->fetchColumn()` Devuelve la primera columna del resultado.

`$st->rowCount()`   Cuenta el número de filas del resultado.

`$pdo->exec('...')` Es para ejecutar ordenes sql que no devuelvan resultados, casi todas menos la `SELECT`, como el `INSERT`. Devuelve el numero de filas afectadas si ha tenido exito, en caso de fallo devuelve falso.

___

### Sentencias preparadas

#### Marcadores

Se usa cuando hacemos consultas con valores que vienen del exterior

Dentro de la consulta se reserva un ligar donde se va a expandir el valor del marcador. el nombre del marcador debe de ser un identificador valido precedido de dos puntos `:`.

Se prepara la orden con el marcador con el método `->prepare` y luego mediante el método `->execute()` se ejecuta la orden. Devuelve un `bool` según funcione la orden o no.

```php
# Se realiza la conexión a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=fa','fa','fa');

# Se prepara la orden con el marcador :titulo
$st = $pdo->prepare("SELECT * FROM peliculas WHERE titulo ILIKE :titulo");

# ->execute recibe un array en el que cada elemento se compone del marcador como clave y el valor extraido del exterior como valor.
$st->execute([':titulo' => "%$buscarTitulo%"]);
```

Esta técnica es necesaria para evitar inyecciones de código SQL.

En caso de usar valores internos al programa se puede interpolar las variables directamente en la orden.

```php
# Se realiza la conexión a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=fa','fa','fa');

$st = $pdo->query("SELECT * FROM peliculas WHERE titulo ILIKE '%$bucarTitulo%'");

```

___


### Tipos de datos SQL -> PHP

__SQL__ ------------  __PHP__

NULL --------> null

nº entero -----> entero

bool -----------> bool

el resto -------> cadenas

___
