# Chuleta de funcionalidades
`print(expr)` Es como un `echo` pero en vez de ser un comando es una función.

`var_dump(expr)`  Es como un echo pero además del tipo te vuelca a la salida el tipo del valor, imprescindible a la hora de depurar un programa.

`max(mixed $a, mixed $b [, mixed $... ])`   Devuelve el mayor de los números que se le pasan por parámetros


`ltrim("   hola   ")`   Quita los espacios de la izquierda

`rtrim("   hola   ")`   Quita los espacios de la derecha

`trim("   hola   ")`   Quita los espacios a izquierda y derecha

`strpos("Desarrollo web de entorno servidor", "entorno")` => `18` Encuentra lo primera ocurrencia de entorno y devuelve `false` si no lo encuentra

`chr(88)`   Te devuelve el carácter a partir de su código ASCII

`ord('e')`  Te devuelve el código ASCII del carácter

`strlen('hola')`  Te devuelve la longitud de la cadena

`mb_substr("adiós", 3, 1)` devuelve `ó`

##Arrays

`count($a)` Devuelve el tamaño del array

`array_sum($a)` Devuelve la suma de los elementos del array que se le pasa

`range(1, 5)` Devuelve un array con los números del 1 al 5 `[1, 2, 3, 4, 5]`

`sort($a)` Ordena el array por por valor y pierde las claves

`asort($a)` Ordena el array por por valor y __NO__ pierde las claves

`ksort($a)` Ordena el array por clave

`krsort($a)` Ordena el array por clave de forma inversa

`array_keys($a)` Devuelve un array solo con las claves

`array_values($a)`Devuelve un array solo con los valores

`array_combine($a, $b)` Devuelve la combinación de dos arrays uasndo una como clave y otra como valor

`in_array('aguja', $pajar)` Busca la aguja en el pajar

`array_key_exists('clave', $array)` Mira si existe la clave en un array

`array_merge($a[,$b])` Une dos arrays, si ubiera elementos con la misma clave numérica las claves del segundo array se cambian, para que no haya conflico y si son cadena se sobreescribe, teniendo preferenciadel segundo array `$b`

##Extract

La funcion `extract(array $a, EXTR_IF_EXISTS)` crea variables a partir de un array, siendo el nombre de la variable la clave de cada elemento y el valor el valor de la pareja clave valor. Si la variable existe la machaca y si la clave es numérica no crea esa variable.

Pasandole en el segundo argumento la constante `EXTR_IF_EXISTS` se asegura que solo se extraen variables preexistentes.

## Cifrado

### Cifrar
`password_hash($cadena, PASSWORD_DEFAULT[, ['cost' => 10]])` Cifra a una cadena de 60 carácteres.

### Verificar

`password_verify($passwordSinCifrar, $hash)` Devuelve un booleano. `true` si coinciden.
