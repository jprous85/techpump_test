##Despliege del proyecto:

Descargar el proyecto y copiar el .env.example a .env

```cp .env.example .env```

### Montar los contenedores de docker
````docker compose up -d````

Entrar en el contenedor de docker (se puede usar make)
````make shell-back````
ejecutar composer para montar el vendor
````composer install````

Una vez creado el vendor, tirar el comando:
`` make decrypt-env`` la contraseña es: ``techpump``

lanzar el comando ````make migrate```` se crean todas las bases de datos relacionadas y con algunos datos de relleno.

La librería de Postman está incluida en el proyecto.
