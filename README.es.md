@UTF-8

Xamboo v1
=============================
This is the build 003

Manual
=======================

Introducción:
-----------------------

Xamboo es el resultado de más de 15 años de ingeniería en fabricación de frameworks.

Es un framework de muy alta calidad para CMS, hecho en PHP 5.3 o superior, totalmente orientado a objetos y con una optimización fuerte para distribuir código en portales Web de alto alcance o en APIs de tipo REST.

Xamboo es freeware, y usa a su vez varios otros componentes freeware (DomCore)

Xamboo es un motor para construir aplicativos que despachan código hacia el cliente.
Es totalmente independiente del código despachado, es decir que puede despachar tanto HTML 3, 4, 5, XHTML, XML, incluso cualquier SGML a la medida, javascript, JSON, WAP, etc.

Los ejemplos armados vienen en HTML 5 con Javascript y CSS3.

Xamboo no necesita una base de datos para manejar toda la estructura del framework, lo que lo hace extremadamente veloz, fácil de uso y poderoso.

Xamboo funciona actualmente sobre sitios distribuyendo más de 30 millones de páginas web mensualmente, sirve sitios normales, y GRAPH-APIs/REST-APIs a APP de mobiles.


Requerimientos:
-----------------------
Para hacer funcionar Xamboo, necesita:
- un webserver (Apache, NGinx, etc.)
- PHP 5.3 mínimo

Instalación
-----------------------
Siempre bajar la última versión desde http://www.webability.info/?P=xamboo
o desde github https://github.com/webability/xamboo

Obtiene un archivo de formato:  xamboo-xx-yy-zz.tar.gz
Donde xx-yy-zz es la versión actual de la herramienta

> Instalación sobre el web server en Linux
Tiene que descomprimir el archivo xamboo-xx-yy-zz.tar.gz en donde lo quiere instalar

Al descomprimir, crea una carpeta ‘xamboo’ con todo el código adentro.

Esta carpera *no debe* de estar en un directorio público accesible por Web, sea internet o local

** Se recomienda poner el código de xamboo es un directorio en un nivel anterior al sitio web mismo, o en un directorio accesible por el sitio web.

Ejemplo:

Directorio base del sitio web:
/var/www

Descomprimir xamboo en /var:

/var/xamboo
/var/html

> Instalación del wrapper

Copiar los 2 archivos index.php y .htaccess en la carpeta pública del web
Estan en xamboo/site

Edite el archivo index.php. Al principio del archivo, hay 3 directorios 








