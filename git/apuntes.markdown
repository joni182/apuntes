### Git :rocket:

#### Inicializar repositorio

`git init`

#### Decirle al git que archivos incorporar a la próxima versión

Para pasar ficheros al área de preparación o stage `git add archivo` o `git add .` para incluir todos los ficheros modificados.

#### Crear una nueva versión

Se crea un commit `git commit -m "Carga inicial"` y deja el área de preparación o stash vacío.

#### Puntero master
Apunta al último commit de la rama.

#### Puntero HEAD
Apunta al commit en el que estamos. Por defecto apunta a MASTER.

#### GIT LOG

`git log` muestan el log de los commit. `git lg` muestra lo mismo pero con información más resumido.

`git lg`

`d7a2dd8 - (HEAD -> master) Cambio hola por adios (25 hours ago) <Jonatan Cerezuela>`

#### GIT SHOW

`git show` muestra commits, se puede utilizar el número de referencia del commit o `master` y `HEAD`.

Además se pueden utilizar ciertos símbolos para localizar commit en relación a otros

`HEAD^` muestra el commit anterior al que apunta el `HEAD` y `HEAD^^` muestra el que está dos posiciones atrás y así tantas veces como haga falta.

Lo mismo con `git show REFERNCIA~1`, `git show REFERNCIA~2`, `git show REFERNCIA~n`


#### GIT DIFF

`git diff inicial..final` muestra como pasar de inicial a final.

`git diff final..inicial` muestra como pasar de fianl a inicial.

`git diff fianl --not inicial` muestra como pasar de inicial a final.

`git diff` Cuando se usa sin parámetro se muestra la diferencia entre el directorio de trabajo con el área de preparación. Y si el area de preparación esta limpio se compara con el commit actual.

`git diff --staged` compara lo que haya en el área de preparación con el commit actual

`git diff <commit>` compara el área de trabajo con el commit que tiene el identificador que se la ha pasado en le parámetro.

#### GIT CHECKOUT

`git checkout <commit>` mueve el puntero HEAD al commit en cuestión.
Se desacopla de la rama, los commit que se hagan no tendrán repercusión sobre ninguna rama.

![diagrama1](Diagrama1.png)

![diagrama2](Diagrama2.png)


Desde esta posicion para ver todos los commit se tendrá que usar el parámetro `--all` del comado log de git `git log --all` de lo contrario solo se verá los commit anteriores.

Para volver a acoplar `HEAD` a la rama tendremos que hacer `checkout` a al puntero `master` y no al último commit de la rama. `git checkout master`

#### ANULAR UN COMMIT (REVERTIR)

Se puede anular un commit revirtiendolo. Con `git revert <commit>` se creará un commit inverso al commit de esa forma se anularán los cambios realizados en el commit que queremos anular.

Si en el commit que queremos anular se creaba algún archivo al hacer el revert se borrará.

#### GIT RESET

Con git reset podremos hacer desaparecer el último commit, para que el area de trabajo se actualice primaro moveremos `HEAD` al commit anterior y luego `git reset HEAD --hard` o podemos hacerlo en un solo paso `git reset HEAD^ --hard`

El commit sigue existiendo pero se queda flotando sin estar acoplado a ninguna rama, solo se puede acceder a el sabiendo su identificador, en un futuro el recolector de basura de git lo eliminará.

Para evitar que el recolector de basura lo elimine se le puede poner una etiqueta.

#### GIT TAG (ETIQUETAS)

`git tag` Lista de etiquetas

`git tag <etiqueta> <commit>` Crea una etiqueta sobre un commit.

`git tag -d <etiqueta>` Elimina la etiqueta, solo la etiqueta.

#### CORREGIR UN COMMIT (SOLO EL ÚLTIMO COMMIT)

`git add .`

`git commit --amend -m "Ahora pone antonio"` Con esta orden se sustituye un commit en el que te has equivocado.

Si te equivocas en algo y haces un commit este último commit se puede enmendar. Modificas los ficheros en cuestión, luego haces un `git add .` y despues haces `git commit --amend -m "Ahora pone antonio"` El mensaje del commit debe de ser igual al erroneo.

#### CAMBIAR NOMBRE A UN ARCHIVO

Con `git mv <nombre> <nuevoNombre>` se pueden cambiar el nombre de los archivos desde git y automaticamente pasa los cambios al área de preparación.

Idem con `git rm <archivo>`

#### DIRECTORIOS

Git no sigue la pista a los directorios nuevos hasta que no tiene contenido ya que no controla directorios si no que controla archivos.

Un truco para que siga una carpeta es crear una archivo vacio y oculto. habitualmente se usa `.gitkeep`.

$`touch .gitkeep`


## RAMAS

Si nos vamos atrás en la rama master y y a partir de un estado antiguo del programa modificamos cosas y hacemos un commit ese commit se queda fuera de esa rama y se queda apuntando al commit antiguo.

![diagrama3](Diagrama3.png)


![diagrama4](Diagrama4.png)

Se podria seguir haciendo commits creando una linea alternativa de commits


![diagrama5](Diagrama5.png)

Para que eso linea no se pierda podemos crear una rama que contendrán esos commits con `git checkout -b <nombre>`.

![diagrama6](Diagrama6.png)

se puede saltar de rama a rama con `git checkout <rama>`

Una rama es un puntero, eso hace que crear una rama sea instantáneo.

#### GIT BRANCH

`git branch` Muestra las ramas disponibles.

`git branch <nombre>` Crea una rama nueva que apunta al commit en el que estás, pero no salta a la rama recién creada.

`git branch -d <rama>` Borra una rama, si estas en la rama que quieres borrar antes tienes que cambiarte a otra rama.

#### VER COMMIT DE UNA RAMA

`git diff pepe --not juan` Muestra los commit que están en juan y no están en juan.

#### TÉCNICAS PARA FUSIONAR RAMAS (MERGE Y REBASE)

![esquema_tecnicas_fusionar](esquema1.png)

__Fast-forward__

![diagrama7](Diagrama7.png)

Ante esta situación en la que hay dos ramas `master` y `facil` la forma más sencilla de hacer una fusión es adelantar `master` (fastforward).

En este caso la rama que se va a ver afectada es la rama `master` así que nos pasamos a ella y luego usamos el comando `merge`

`git checkout master`

`git merge facil`


![diagrama7b](Diagrama7b.png)


Esta es la forma correcta de  desarrollar un programa. una vez master esta funcionando, creas una nueva rama y pruebas cosas alli como una nueva funcionalidad o arreglar un bug y cuando tengas esa nueva rama cumpliendo la funcionalidad que quieres ya puedes fusionarla con master de forma que en master siempre hay un programa con todas sus funcionalidades completas.

En caso de no interesarte los cambios que se han producido en `facil` desde master y quieres descartarlos puedes pasarte a master y eliminar la rama fácil, los cambios quedarían fuera de ninguna rama y más tarde el recolector de basura se encargara de ellos.

__Recursive__

`git checkout master`

`git branch -d facil`

![diagrama8](Diagrama8.png)

En este caso cuando se fusiona facil con master se usará la técnica recursive, se creará un nuevo commit especial llamado commit de merge el cual apuntará a los último commit de cada rama.


![diagrama9](Diagrama9.png)

__¡En caso de conflicto!__

Un conflicto ocurre cuando en las dos ramas se tocan en el mismo archivo en la misma linea.
En ese caso dará un error y tendrás que solucionar los conflictos de forma manual.

Al abrir el archivo con conflicto git te habrá marcado el conflicto. Una vez solucionado el conflicto y con el archivo limpio se informa que el archivo esta limpio de conflicto con `git add <archivo>`

Luego de eso el merge aun esta a medio hacer, así que hacemos un commit, escribimos el mensasje y tras ejecutarlo se termina el merge.

Luego borramos la rama prueba, ya no nos sirve para nada.

Hay veces que aunque se pueda solucionar el merge con un fastforward es interesante hacer un commit de merge. Cuando se hace un fastforward se pierde en la historia el hecho de que se ha hecho una fusión. Con el commit de merge queda registrado.

`git merge --no-ff <rama>` De esta forma se dice no-ff(no fastforward)

__Rebase__

![diagrama10](Diagrama10.png)

`git checkout master`

`git rebase facil`

![1](Diagrama11.png)

El rebase deja mas limpia las ramas temporales pero tiene el incombeniente de que se puerde información sobre el merge que se ha realizado. Además si estas trabajando con gente puede crear conflictos al reescribir commit, por lo tanto se debe de usar solo en local, nunca en remoto.

Cuando se hace el merge puede ocurrir conflictos entre commit, es cuestión de solucionarlos manualmente. Una vez solucionado se continua con el rebase con `git rebase --continue`

Si algún commit en conflicto no te interesa rebasarlo puedes usar `git rebase --skip` y saltártelo, incluso se puede abortar el rebase y quedarte como al principio del rebase con `git rebase --abort`


#### REPOSITORIOS REMOTOS

![repositorio1](repositorio1.png)

Agregamos eun repositorio remoto ya existente vacio.

`git remote add origin http://github.com/user/repositorio`

Podemos ver información

`git remote show origin`

Ahora empujaremos todos los commits de la rama `master` al repositorio remoto.
En el remoto se crea una nueva rama que se llama también 'master'. Con la opción `-u` se indica que la rama master en local haga seguimiento de la rama `master` del remoto. Así el sistema estará comprobando si `origin master` y `master` están sincronizadas.

En local se crea un puntero `origin/master` que representa la rama `master` remota.Aunque no necesariamente esta sincronizada con `origin master` ya que otros programadores han podido ir añadiendo commits a `origin master` en remoto.

`git push -u origin master`

Para sincronizar local y remoto se usará `git push`. Las ramas se pushearán de forma independiente.


####GIT CLONE

`git clone <urlDelRepositorio>` Clona un repositorio remoto en local. Si no se especifica nada mas se creará una carpeta con el mismo nombre del repositorio. Se trae todos los commit y las ramas del repositorio remoto y además crea una rama `master` que hace segimiento del `master remoto`. Se trae todas las ramas remotas pero solo crea en local la rama `master` las demas se irán creando según se hagan `checkout` a esas ramas. Además se crea un puntero `origin/head` que indica que en remoto la rama principal es la rama `master`.

![diagrama12](Diagrama12.png)


`git clone <urlDelRepositorio> <nombreDeLaCarpeta>` Si se especifica el segundo argumento del `git clone` se clonará en una carpeta con el nombre especificado.

#### GIT FETCH

`git fetch` se traae todos los commits del repositorio remoto y mueve los punteros origin/* , luego habria que hacer un `merge` para integrarlo con tu rama local. Esto es tan habitual que `git pull` es el congunto de esa dos acciones.

#### GIT PULL

`git pull` Se trae todos los commits del remoto y los integra con tu rama local. Por defecto hace un merge pero con `git pull --rebase` hace un rebase después del fetch.


## GITHUB

__Metodología de programación propuesta por Github__ _**(Flujo de trabajo)**_.

[Flujo de trabajo]: [https://guides.github.com/introduction/flow/]

![flow](flow.png)

__Para una nueva funcionalidad__

+ Creamos una nueva rama `git checkout <rama>`.
+ Desarrollamos la funcionalidad _(Añade commits a la rama)_.
+ Abre una pull request:
  + `git push -u origin <rama>`
  + Desde la pagína de github pulsas en el boton crear pull request que te sugiere github
  + Defines el mensaje de la pull request.

  ![imagen](image1.png)

  + Mas abajo pulsa el boton create pull request

  ![imagen](image2.png)

  + En la pestaña pull requests > conversation pueden hablar la personas que han creado la PR y los que tienen que aceptarla
  + Pulsa merge pull request para finalizar.

  ![imagen](image8.png)

  + Se aconseja borrar la rama porque ya no hace falta.

  ![imagen](image5.png)

  + Una vez borrada la rama remota se debe borrar el puntero local que representa a la rama remota. Eso se hace con `git remote prune`
