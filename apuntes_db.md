# Base de datos

## Preparamos el entorno

`.~/.conf/scripts/postgres-instal.sh`

Forkeamos de `https://github.com/iesdonana/filmaffinity`

` git clone http://github.com/tu_usuario/filmaffinity ~/fa`

`sudo -u postgres psql -d template1`

Dentro del pgsql/template1 `create extension pgcrypto;` , nos salimos con `\q`

`sudo -u postgres createdb fa`

`sudo -u postgres createuser -P fa ` , a continuación introducimos la contraseña 'fa' dos veces.

`cd ~/fa`

`psql -U fa -h localhost -d fa < fa.sql`
