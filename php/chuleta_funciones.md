# Chuleta de funcionalidades
`print(expr)` Es como un `echo` pero en vez de ser un comando es una función.

`var_dump(expr)`  Es como un echo pero además del tipo te vuelca a la salida el tipo del valor, imprescindible a la hora de depurar un programa.

`max(mixed $a, mixed $b [, mixed $... ])`   Devuelve el mayor de los números que se le pasan por parámetros


`ltrim("   hola   ")`   Quita los espacios de la izquierda

`rtrim("   hola   ")`   Quita los espacios de la derecha

`trim("   hola   ")`   Quita los espacios a izquierda y derecha

`strpos("Desarrollo web de entorno servidor", "entorno")` => `18` Encuentra lo primera ocurrencia de entorno y devuelve `false` si no lo encuentra

`chr(88)`   Te devuelve el caracter a partir de su código ASCII

`ord('e')`  Te devuelve el código ASCII del carácter

`strlen('hola')`  Te devuelve la longuitud de la cadena

`mb_substr("adiós", 3, 1)` devuelve `ó`
