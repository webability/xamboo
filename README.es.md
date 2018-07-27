@UTF-8

Xamboo v3 - Manual básico
=========================

Introducción:
-----------------------

Xamboo es el resultado de más de 15 años de ingeniería en fabricación de frameworks.

Es un framework de muy alta calidad para CMS, hecho en PHP 5.3 o superior, totalmente orientado a objetos y con una optimización fuerte para distribuir código en portales Web de alto alcance o en APIs de tipo REST.

Xamboo es freeware, y usa a su vez varios otros componentes freeware (DomCore)

Xamboo es un motor para construir aplicativos que despachan código hacia el cliente.
Es totalmente independiente del código despachado, es decir que puede despachar tanto HTML 3, 4, 5, XHTML, XML, incluso cualquier SGML a la medida, javascript, JSON, WAP, etc.

Los ejemplos armados vienen en HTML 5 con Javascript y CSS3.

Xamboo no necesita una base de datos para manejar toda la estructura del framework, lo que lo hace extremadamente veloz, fácil de uso y poderoso.

Xamboo funciona actualmente sobre sitios distribuyendo más de **30 millones de páginas web mensualmente**, sirve sitios normales, y GRAPH-APIs/REST-APIs a APP de mobiles.


Requerimientos:
-----------------------
Para hacer funcionar Xamboo, necesita:
- un webserver (Apache, NGinx, etc.)
- PHP 5.3 mínimo, prefered PHP 7+

Instalación
-----------------------
Siempre bajar la última versión desde http://www.webability.info/?P=xamboo
o desde github https://github.com/webability/xamboo

Obtiene un archivo de formato:  xamboo-xx-yy-zz.tar.gz
Donde xx-yy-zz es la versión actual de la herramienta

1. Instalación sobre el web server en Linux
Tiene que descomprimir el archivo xamboo-xx-yy-zz.tar.gz en donde lo quiere instalar

Al descomprimir, crea una carpeta ‘xamboo’ con todo el código adentro.

Esta carpeta *no debe* de estar en un directorio público accesible por Web, sea internet o local

** Se recomienda poner el código de xamboo es un directorio en un nivel anterior al sitio web mismo, o en un directorio accesible por el sitio web.

Ejemplo:

Directorio base del sitio web:
/var/www

Descomprimir xamboo en /var:

/var/xamboo
/var/html

Dentro de xamboo, hay una carpeta llamada "site".
Puede enlazar esta carpeta a la raíz del sitio web, o usar cualquier otra carpeta a su gusto, y copiar los archivos presentes aquí en su carpeta raíz del sitio web.


2. Instalación del wrapper

Copiar los 2 archivos index.php y .htaccess en la carpeta pública del web
Estan en xamboo/site

Edite el archivo index.php. Al principio del archivo, hay 3 directorios que enlazan la configuración del Xamboo.
Modifique los directorios para enlazar el sistema en donde haya instalado la carpeta xamboo.
Por defecto, busca xamboo un directorio anterior a la raíz del sitio.

El archivo index.php es indicativo, y puede ser aumentado de lo que se requiera para el buen funcionamiento de su sitio (por ejemplo login de usuarios, logs de hits, configuración y directorios a partir de archivos, conección a base de datos, etc.)

El archivo .htaccess de la misma manera, define las reglas para hacer el wrap de apache hacia el index.
Puede fabricar un arhico equivalente para otros web servers si no usa el apache.

Se describe más adelante en el capículo "Referencia - Wrapper" lo mínimo necesario para hacer funcionar Xamboo y como usarlo.


3. Instalación del archivo de mantenimiento

Copiar el archivo maintenance.html en la carpeta pública del web
Esta en xamboo/site

Este archivo se usa cuando el sistema se switchea a modo "mantimiento" desde la configuración. Puede especificar cualquier archivo, por defecto viene este.


4. Instalación de la base de sistema

Dentro del directorio xamboo/site, también viene un archivo Base.lib
Este archivo contiene su propio archivo Base, derivado del Base_engine de Xamboo en el cual puede agregar toda la funcionalidad que necesita para su propio sitio.

Puede dejar la libreria en la raíz de su sitio ( en donde copió index.php ), o protegerlo dentro de una carpeta de includes de clases propias.
Lo importante es que el sistema tenga acceso a el.


5. Ejemplo de instalación

5.1 Instalación muy básica

 /var/xamboo               Base de instalación
 
 /var/xamboo/include       Librerias PHP
 
 /var/xamboo/site          Raíz del Sitio Web 
 
 /var/xamboo/repository    Repositorio de datos del sitio


5.2 instalación avanzada

Se instala en /home/sites/mi-sitio.com la herramienta de la manera siguiente:

 /home/sites/mi-sitio.com                         Base de instalación
 /home/sites/mi-sitio.com/site                    Raíz del sitio web
 /home/sites/mi-sitio.com/include                 Librerias PHP en general
 /home/sites/mi-sitio.com/include/base            Librerias propias del sitio, poner aqui el Base.lib
 /home/sites/mi-sitio.com/include/core            Librerias del core (viene con Xamboo)
 /home/sites/mi-sitio.com/include/datasources     Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/entities        Librerias Singletones (acceso a bases de datos, utilerias, etc.)
 /home/sites/mi-sitio.com/include/pages           Páginas del sitio web
 /home/sites/mi-sitio.com/include/patterns        Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/throwables      Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/xamboo          Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/__autoload.inc  Autoload de los varios directorios de include (Viene con Xamboo, modificar para agregar todas las carpetas necesarias)
 /home/sites/mi-sitio.com/repository              Repositorio de datos de la acplicación


Se pueden ubicar las páginas dentro de repositorio de datos, o dentro del include, al gusto del webmaster. La ventaja de tenerlas dentro del include es hacer un backup de todo el código aparte de los datos que puedan estar dentro del repositorio, que suelen ser de tamaño más importante, pero de ciclo de vida mas largo (imágenes, caches, documentos, etc)


Hello, World
====================

Crear en repository/pages la carpeta /hello-world
Crear en esta nueva carpeta un archivo hello-world.page con el contenido siguiente:

> type=simple
status=published
template=template

Crear un archivo hello-world.instance
Dejar el archivo vacio

Crear un archivo hello-world.code
con el contenido siguiente:

> <html>
<body>
Hello, World!
</body>
</html>

Puede ver la página a través de su sitio:
http://www.mi-sitio.com/hello-world
suponiendo que la URL de su sitio es www.mi-sitio.com enlazado a la raíz de su sitio web.


Páginas - referencia
====================

Una URI esta normalmente conformada de una ruta , seguida de un archivo y de parámetros GET.
El wrapper del web server hace una primera verificación para saber si la URI corresponde físicamente a un archivo almacenado en la ruta pública del sitio. Si el archivo existe, lo despacha (por ejemplo, imágenes, JS, CSS, archivos multimedias etc), y si no entonces llama al engine de Xamboo en todos los demás casos. 
Dicho de otra manera, el web server nunca regresa un 404, sino que pasa la URI completa al engine en todos los casos.
El engine de  Xamboo será el responsable de contestar el 404 en caso necesario después de realizar la resolución de la librería/pagina a llamar en base a la estructura del repositorio.

Resolución de páginas:
----------------------

Xamboo separa primero la ruta de la URI. Deja el / al principio y quita el último /.
La noción de archivo no existe en el framework. Por ejemplo, /mi-ruta/mi-archivo.html es algo que no entendería el engine, salvo si existe físicamente la carpeta ‘mi-archivo.html’ dentro de la carpeta ‘mi-ruta’ en la raíz del Sitio Web.

Las rutas de Xamboo son fabricadas para cumplir con las reglas de SEO e indexación de buscadores.

Las rutas de Xamboo aceptan únicamente los caracteres siguientes:

Letras a-z, letras con acentos y ñ, cifras 0-9, guión medio, guión bajo
No puede incluir /, \, signos de puntuación, puntos, etc. dentro de las rutas (aunque lo soporta el sistema operativo). Las mayúsculas son siempre convertidas a minúsculas por compatibilidad con los sistemas operativos insensibles a mayúsculas/minúsculas como es el Windows.

Por ejemplo si captura en la URI la ruta:
/Mi-PaginA/Mi-Ruta-con.un-punto     :  regresará automáticamente un error por el punto
/Mi-PaginA/Mi-RutA                  :  buscará en repositorio de páginas la carpeta /mi-pagina/mi-ruta

Las páginas del framework se encuentran todas en el repositorio de páginas. Este repositorio es una carpeta llamada /pages/ situada dentro del repositorio del aplicativo por defecto.

**Cada página es una carpeta**, que contiene una serie de archivos que conforman la definición y el código de la página.
Xamboo acepta una estructura jerárquica de las páginas, es decir que soporta tener páginas dentro de otras páginas es decir carpetas dentro de otras carpetas.

La ruta de las páginas es la misma ruta que se usa en la URI para acceder esta página.

La búsqueda se realiza de la manera siguiente:

1. Busca la carpeta de la ruta directamente como viene de la URI.
    a. Si no existe la carpeta, sigue en el punto 2
    b. Si existe la carpeta, verifica que exista el archivo .page adentro.
      i. Si no existe, sigue en el punto 2
      ii. Si existe el archivo, verifica que este con estatus ‘pulished’
        1. Si no es ‘published’, sigue en el punto 2
        2. Si es publicado, calcula la página y la regresa.
2. No se ha encontrado la página. Quita la última carpeta de la URI
    a. Aún hay carpetas, prosigue en el punto 1
    b. Ya no hay carpetas, termina con un error
    
Resumiendo, es la primera carpeta encontrada en la ruta empezando por el final que será ejecutada. En otras palabras, puede agregar lo que sea después de la ruta oficial, será ignorado y trasladado a la página encontrada como una serie de parámetros.

Ejemplos:
Estructura del repositorio:
/sección     
    => página real con el archivo sección.page, publicado
/sección/subsección   
    => página real con el archivo subsección.page, publicado
/sección/subsección/sub-subsección  
    => página real con el archivo sub-subsección.page, no publicado

camino de la URI por resolver:    /sección/subsección/sub-subsección/otra-cosa/una-ruta-extra

La resolución busca primero la carpeta /sección/subsección/sub-subsección/otra-cosa/una-ruta-extra, que no existe.
Luego, la resolución busca /sección/subsección/sub-subsección/otra-cosa, que no existe
Luego, la resolución busca /sección/subsección/sub-subsección, que existe pero no es publicado
Finalmente, la resolución busca /sección/subsección que existe y es publicada
Ejecuta y regresa la página efectiva /sección/subsección

El complemento del camino es pasado  a la página y puede ser usado como un arreglo de parámetros 
En general estos parámetros son palabras usadas para el SEO, variables, nombres de artículos, etc.


Estructura de las páginas:
-------------------------

Para que una carpeta en el repositorio de páginas sea considerado como una página válida, necesita cumplir con una serie de estándares. Sino, no será considerado una página y el engine ignorará la carpeta.

Todas las páginas necesitan un archivo obligatorio de definición de la página, de nombre igual que la página (carpeta) y de extensión .page

Ejemplo:
Página ‘pagina-principal’:
Carpeta: [repositorio]/page/pagina-principal/
Archivo de definición: [repositorio]/page/pagina-principal/pagina-principal.page

El archivo contiene una serie de parámetros descritos en el capítulo siguiente.

Cada página puede tener desde una hasta un número ilimitado de instancias.
Hay dos parámetros que rigen las instancias:
- La versión
- El idioma

NOTA IMPORTANTE:
El conjunto [version.idioma] es opcional, es decir, si trabaja con una sola versión/idioma por defecto de una página, puede omitir estos parámetros.

La versión es un identificador que permite separar la misma página con distinto código según las necesidades
La versión acepta letras minúsculas, letras con acentos, cifras, guion medio, guion bajo.
Por ejemplo, puede tener varias versiones de la página principal: 
- Versión por defecto
- Versión para imprimir
- Versión para débiles visuales
- Versión para móbiles
También podría guardar el histórico de la página principal:
- Versión del 2010
- Versión del 2011
- Versión de la temporada de Navidad
- Versión actual

De la misma manera puede tener la página en varios idiomas.
El idioma es la representación oficial de 2 letras del idioma regido por la norma ISO-339 idiomas en 2 letras.
Obviamente la noción de idiomas es importante únicamente si la página contiene físicamente textos traducibles, y/o necesita un sitio con varios idiomas.

Nota importante:
Se recomienda hacer una explosión de bloques de la página para jamás tener más de una dimensión sobre la cantidad de instancias.
Por ejemplo, si tiene su sitio en 5 idiomas y 4 versiones básicas son de entrada 20 archivos de código para cada página lo que se vuelve inmediatamente inmanejable.
En este caso, hay que separar las tablas de idiomas en una página, y el código en otra página, para tener solamente 2 páginas con 5 y 4 archivos de código cada una. Luego hay que asegurarse que las versiones puedan resolverse a pocos bloques distintos entre las versiones y todo lo demás se pueda resolver en una sola página con una sola instancia.

Ejemplos:
/paginaprincipal
/paginaprincipal/paginaprincipal.page            definición de la página
/paginaprincipal/paginaprincipal.instance        instancia única de la página
/paginaprincipal/paginaprincipal.code            código de la página

/plantilla
/plantilla/plantilla.page                        definición de la página
/plantilla/plantilla.base.es.instance            instancia en español de la página, versión base
/plantilla/plantilla.base.es.code                código de la instancia en español de la página, versión base
/plantilla/plantilla.base.en.instance            instancia en inglés de la página, versión base
/plantilla/plantilla.base.en.code                código de la instancia en inglés de la página, versión base

/datos
/datos/datos.page                       definición de la página
/datos/datos.imprimir.es.instance       instancia de la página, versión imprimir
/datos/datos.imprimir.es.code           código de la instancia de la página, versión imprimir
/datos/datos.ver.es.instance            instancia de la página, versión ver
/datos/datos.ver.es.code                código de la instancia de la página, versión ver


Tipos de páginas vs archivos necesarios:
=========================================

Una página "sencilla" necesita:
- un archivo .page
- un archivo .instance
- un archivo .code

Una página "libreria" necesita:
- un archivo .page
- un archivo .instance
- un archivo .template, opcional
- un archivo .language, opcional
- un archivo .lib

Una página "template" necesita:
- un archivo .page
- un archivo .instance
- un archivo .template

Una página "language" necesita:
- un archivo .page
- un archivo .instance
- un archivo .language

Una página "redirect" necesita:
- un archivo .page

Resolución de instancias:
=========================

Una vez que el sistema encuentra la página indicada, buscará la instancia de esta página más conveniente.
***** NOTA DEL PROGRAMADOR: Se necesita poder pasar versión e idioma forzado por URI para efectos de depuración; VERIFICAR COMO Y DONDE *****
***** Busca primero la versión solicitada por la URI y/o el sistema de cookies y parámetros del cliente y del sistema*****

Si el archivo de definición de la página contiene el parámetro defaultversion, el engine busca esta versión.
Si el archivo de definición no tiene el parámetro, o el parámetro esta vacio, entonces buscará la versión por defecto del sistema llamado ‘base’

El idioma a buscar se basa sobre la cookie de idiomas del cliente.
Si esta cookie no esta puesta, entonces resuelve primero el idioma del cliente que solicita el código. Si el idioma no es reconocido, entonces usará el idioma por defecto del sistema.

Puede modificar el idioma por defecto de esta página con el parámetro defaultlanguage en el archivo de definición de la página.
Si la cookie esta puesta, entonces buscará el idioma del valor.
Si la instancia de esta página no existe para el idioma seleccionado, entonces buscará la instancia con el idioma por defecto del sistema, o del parámetro defaultlanguage

La instancia con el idioma por defecto y la versión por defecto tiene que existir *siempre*.
El sistema sabe que la instancia existe si y solamente si existe un archivo llamado 
[nombre-de-la-pagina].[version].[idioma].instance

El idioma son las 2 letras oficiales de la norma ISO 339 – idiomas, por ejemplo 'es' para español, 'en' para inglés y 'fr' para francés.



Referencia de archivos para las páginas:
========================================

Archivo de definición .page
-----------------------------

El archivo .page es una colección de parámetros, uno por línea con la sintaxis siguiente:
Parámetro=valor

El sistema reconoce por defecto 6 parámetros en este archivo:
- type:  es el tipo de página. Obligatorio. Puede tener los valores siguientes:
o simple: es una página sencilla, basada en un código a despachar agregado del meta-lenguaje del Xamboo
o library: es una clase PHP que despachará el código calculado. La librería tiene que llamarse igual que la página y extender XBLibrary
o template: es una plantilla basada en el sistema de plantillas WATemplate del DomCore
o language: es una tabla de idiomas basada en el sistema de internacionalización WALanguage del DomCore
o box: es una definición XML de Box Model con sus librerías respectivas
o redirect: redirecciona la pagina hasta la pagina con el código especificado (301 0 302) formato: 301,liga o 302,liga

- status:  es el estatus de la página. Obligatorio. Puede tener los valores siguientes:
o hidden: pase lo que pase, el código contenido en esta página es ignorado como si no existiera
o published: el código contenido en esta página es visible directamente desde el exterior, o sea accesible por solicitud directa desde la URI
o block: el código es accesible, pero únicamente por llamadas internas del Xamboo, desde otra página o desde el código

- template: es la plantilla a usar alrededor de esta página. Opcional. Usa la ruta relativa de la plantilla en el repositorio de páginas, sin el / inicial. La plantilla debe de contener la palabra clave [[CONTENT]] en donde esta página se incluirá.

- defaultversion: es la versión por defecto de la instancia de la página. Opcional. La instancia con esta versión tiene que existir.

- defaultlanguage: es el idioma por defecto de la instancia de la página. Opcional. La instancia con este idioma tiene que existir.

- redirect: es la linea de redirect si el tipo es redirect.
formato: 301,liga o 302,liga

Además de estos 6 parámetros reconocidos por el framework, el programador puede agregar tantos parámetros extras como necesita, estos serán almacenados y distribuidos al código de la página para cualquier necesidad, e incluso consultables por otras páginas por código y/o meta-lenguaje.

Nota: no es recomendable poner parámetros que contengan textos para enviar al cliente en este archivo, ya que la definición de la página es independiente del idioma. Para los textos se recomienda agregar los parámetros en el archivo de definición de la instancia, que sí es sensible al idioma.


Archivo de definición .instance
--------------------------------

El archivo .instance tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versión].[idioma].instance

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versión es el nombre de la versión de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El parámetro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional y se ignora la mayor parte de las veces si no usa un sitio multi-versión o multi-idioma.

El archivo .instance es una colección de parámetros, uno por línea con la sintaxis siguiente:
Parámetro=valor
El framework espera los parámetros de uso del cache en este archivo.
El programador puede agregar tantos parámetros como desea. Estos parámetros son usables directamente por el código de la página e incluso desde otras páginas.

- cache: full, yes o no. Opcional. Es el indicador para saber si la página esta cacheada. Por defecto es no.
'full' indica que el sistema hará un cache completo de la página con su plantilla, mientras 'yes' solamente cacheará la página pero seguirá llamando la plantilla no cacheada.
- cacheexclude:  todas las URLs de excepción para no usar el cache, si el cache es puesto a 'yes' o 'full'.
- cachevariables: lista de variables (del query ?... de HTTP) que hacen la página única para poder cachar cada versión calculable de la página (por ejemplo una paginación). La lista es separada por comas.



Archivo contenedor de código .code
-----------------------------------

El archivo .code tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versión].[idioma].code

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versión es el nombre de la versión de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El parámetro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .code es una mezcla del código a despachar con las palabras clave del meta-lenguaje.
Favor de consultar el manual del meta-lenguaje para saber como usarlo


Archivo .lib
-------------

El archivo .lib tiene el formato siguiente:
[nombre-de-la-pagina].lib

Las páginas dinamicas de Xamboo se basan en varias clases pre-definidas en el core de la herramienta. Puede además extender sus propias clases para fines propios, como por ejemplo una clase para páginas exclusivas con usuario conectado (ver ejemplos después).

XBLibrary: clase base para cualquier libreria para despachar una página dinámica a través de un sitio WEB normal. Implementa el único método run, llamado cuando se llama una página normal.

XBRESTLibrary: clase base para cualquier libreria para despachar una página dinámica a través de una REST-API. Implementa los 4 métodos base get, put, post, delete.

Ejemplo:

Página home:
En la carpeta /home:
/home/home.lib contiene:
<?php
class home extends XBLibrary
{
  function __construct($template, $language)
  {
    parent::__construct($template, $language)
  }
  
  function run($engine, $params)
  {
    return "Hello, world";
  }
}
?>

Archivo .template
------------------

El archivo .template tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versión].[idioma].template

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versión es el nombre de la versión de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El parámetro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .template es una mezcla del código a despachar con las palabras clave de una plantilla.

Xamboo usa el sistema de plantillas de DomCore.
Las plantillas usan un set de metapalabras que estan descritas en sus propios manuales que puede consultar en http://www.webability.info/?P=documentacion&wiki=/DomCore .


Archivo .language
------------------

El archivo .language tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versión].[idioma].template

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versión es el nombre de la versión de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El parámetro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .language es un archivo de tipo XML.

Xamboo usa el sistema de idiomas de DomCore.
Los idiomas usan un archivos XML que esta descrito en sus propios manuales que puede consultar en http://www.webability.info/?P=documentacion&wiki=/DomCore .


Compilación y caches
---------------------

Todo el código del framework es compilado y cacheado en varios niveles, DE MANERA AUTOMATICA, el usuario no necesita administrar estos caches.

El administrador tiene acceso a la configuración de cómo se deben de comportar los cachés según los varios parámetros de la configuración, desde dónde se deben de almacenar, hasta si deben o no calcularse y guardarse, con opción a variantes por variables de URL, etc.


Objeto Base
------------

El objeto base es accesible desde cualquier lugar del código PHP:
- En todas las clases, viene implícito en $this->base
- En el código integrado en páginas .code con '[[PHP...PHP]]' viene accesible directamente como $base.
  
Engine
-------

El engine es accesible desde cualquier punto de entrada en el código del usuario:
- En las clases, viene como parámetro en el llamado de run, get, post, put, delete.
- En el código integrado en páginas .code con '[[PHP...PHP]]' viene accesible directamente como $engine.


Referencia de clases
=====================

XBLibrary
XBCode
XBPage
XBInstance
XBRESTLibrary

Etc

Meta lenguaje
==============

Las meta palabras del meta lenguaje de Xamboo son:

%-- Comentarios --%

[[PARAM0]] hasta [[PARAM99]]
acceso a parametro de llamada 0 hasta 99. Caso de parametros llamados por [[BLOCK ...]]

[[PARAM,nombre]]
acceso a parametro nombrado. Caso de parametros llamados por [[CALL ...]]

[[PAGEPARAM,nombre]]
Llama un parámetro dentro del archivo .page de la página llamada por la URL.

[[LOCALPAGEPARAM,nombre]]
Llama un parámetro dentro del archivo .page de la página local.

[[INSTANCEPARAM,nombre]]
Llama un parámetro dentro del archivo .instance de la página llamada por la URL.

[[LOCALINSTANCEPARAM,nombre]]
Llama un parámetro dentro del archivo .instance de la página local.

[[VAR,nombre]]
Llama una variable de la URL, por GET o POST.

[[JS,ruta]]
Almacena el archivo JS para agregar al header de esta página en cálculo.

[[CSS,ruta]]
Almacena el archivo CSS para agregar al header de esta página en cálculo.

[[PHP,cache: ... PHP]]
Snippet de PHP integrado en esta página

[[BLOCK,ruta: ... ]]
Llama otra página para integrarla en este lugar. Los parámetros vienen uno por linea y son numerados de 0 a x.

[[CALL,ruta: ... ]]
Llama otra página para integrarla en este lugar. Los parámetros son nombrados nombre=valor, uno por linea.



Meta lenguaje todavía por implementar:
--------------------------------------

[[WIDGETS]]
Las sub-páginas se integran automaticamente como subbloques en orden 
** not yet implemented **

[[WIDGETS,ruta]]
Las sub-paginas de la ruta especificada se integran automaticamente como subbloques en orden 
** not yet implemented **

[[LINK,liga]]
Genera una URL sobre el framework
** not yet implemented **

[[SYSPARAM,nombre]]
Llama un parámetro del sistema (en la configuración)
** not yet implemented **

[[CLIENTPARAM,nombre]]
Llama un parámetro del usuario conectado (extención no implementada)
** not yet implemented **



