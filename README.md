pGrado
======

Sistema de Gestión y Seguimiento de Proyectos Académicos
Área de Ingeniería de Sistemas, UNERG

Acceso: [pGrado](https://pgrado.aisunerg.net.ve)

__________________________

Instalacion:
-----------

1. Descargar/Clonar Repositorio

2. Copiar archivo de base de datos

        cp app/Config/database.php.local app/Config/database.php

   Modificar datos del archivo `app/Config/database.php` y agregarle la informacion de la base de datos local

3. crear directorios de archivos temporales y darle permisos de escritura

        mkdir app/tmp
	    chmod 777 app/tmp/ -R

4. instalar componentes del frontend

        bower install

__________________________
[facebook](https://www.facebook.com/pgrado.aisunerg)
