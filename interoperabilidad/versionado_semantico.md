# Versionado semántico

## Versiones en Git

**commit --- Etiquetas (git) --- releases (GitHub)**

Con las etiquetas podemos marcar un commit para identificar que es una nueva
versión en git, algo silmilar son las releases de GitHub.

**Releases (GitHub)**

En los releases además de etiquetar una nueva versión se puede agregar
información y además agregar assets. Esos aseets pueden ser el programa ya
compilado para diversos sistemas.

## Versionado semántico

[**semver**](https://semver.org/lang/es/)

Las versiones se especifican mediante tres números X.Y.Z (mayor.menor.parche.

**Parche:** Si se arregla un fallo y y se mantiene la compatibilidad se incrementa el número
parche.

**Menor:** Si se agregan funcionalidades y se mantiene la compatibilidad se incrementa el
número menor. El número parche se coloca a cero.

**Mayor:** Si los cambios rompen la compatibilidad se incrementa el número mayor.

## Restricciones

`4.3.1`  Poner la versión exacta. La mas restrictiva, no es aconsejable ya que
no permite aumentar el segundo y tercer número los cuales mejoran errores de la librería pero no rompe la compatibilidad

`4.3` = `4.3.0`

`>=4.2.1 <4.3.0` Cualquier versión entre el 4.2.1 y el  4.2.*

`4.2.1 || 4.5.2`

`~4.3.1` Permite que solo el ultimo numero suba. en este caso subiría el parche y en `~4.3` podría subir el numero menor. Aunque si solo hay un numero el primer número no cambiaria nunca ya que `~` no permite rotura de compatibilidad.

`^4.3.1` permite todos los cambios posibles mientras que no se rompa la compatibilidad. `^4.3.1` = `>=4.3.1 <5`

[Probar distintas restricciones](http://semver.mwl.be)
