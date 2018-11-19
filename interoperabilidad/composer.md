# Composer

[Composer Oficial](https://getcomposer.org/)

[packagist: Todos los paquetes que Composer puede gestionar](https://packagist.org/)

Composer debe saber en que entorno se va a ejecutar el programa ya que los
paquetes seon distintos segun estén en desarrollo o en producción.

`composer require symfony/console` Si no se marca ninguna restricción la versión
requerida será la última versión estable. y mientras no se diga lo contrario
composer trabaja en entorno de producción. Modifica el archivo `composer.json`
donde estan marcadas todas  las dependecias que tiene tu programa.
Con `--dev` se dice que estamos en entorno de desarrollo
`composer require symfony/console --dev`

Al ejecutar `composer require symfony/console` se habran creado un
`composer.json` y un `composer.lock` además de una carpeta `vendor`.

`vendor/` no se incorpora a tu proyecto git. hay que crear un archivo
`.gitignore`

Con `composer install` se puede reconstruir la carpeta `vendor` en cualquier
momento. Por defecto instala las dependencias en modo desarrollo, con `--no-dev`
se instala en producción. `composer install --no-dev`

`composer.lock` Se genera automaticamente. Mientras que el `composer.json` es
mas general. Marca un restricción, mientras que el `composer.lock` especificar
la versión exacta que se está usando. De forma que en dev y prod vas a estar
usando exactamente la misma version de las dependencias.
