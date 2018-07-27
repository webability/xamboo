@UTF-8

Xamboo v3 - Manual b�sico
=========================

Introducci�n:
-----------------------

Xamboo es el resultado de m�s de 15 a�os de ingenier�a en fabricaci�n de frameworks.

Es un framework de muy alta calidad para CMS, hecho en PHP 5.3 o superior, totalmente orientado a objetos y con una optimizaci�n fuerte para distribuir c�digo en portales Web de alto alcance o en APIs de tipo REST.

Xamboo es freeware, y usa a su vez varios otros componentes freeware (DomCore)

Xamboo es un motor para construir aplicativos que despachan c�digo hacia el cliente.
Es totalmente independiente del c�digo despachado, es decir que puede despachar tanto HTML 3, 4, 5, XHTML, XML, incluso cualquier SGML a la medida, javascript, JSON, WAP, etc.

Los ejemplos armados vienen en HTML 5 con Javascript y CSS3.

Xamboo no necesita una base de datos para manejar toda la estructura del framework, lo que lo hace extremadamente veloz, f�cil de uso y poderoso.

Xamboo funciona actualmente sobre sitios distribuyendo m�s de **30 millones de p�ginas web mensualmente**, sirve sitios normales, y GRAPH-APIs/REST-APIs a APP de mobiles.


Requerimientos:
-----------------------
Para hacer funcionar Xamboo, necesita:
- un webserver (Apache, NGinx, etc.)
- PHP 5.3 m�nimo, prefered PHP 7+

Instalaci�n
-----------------------
Siempre bajar la �ltima versi�n desde http://www.webability.info/?P=xamboo
o desde github https://github.com/webability/xamboo

Obtiene un archivo de formato:  xamboo-xx-yy-zz.tar.gz
Donde xx-yy-zz es la versi�n actual de la herramienta

1. Instalaci�n sobre el web server en Linux
Tiene que descomprimir el archivo xamboo-xx-yy-zz.tar.gz en donde lo quiere instalar

Al descomprimir, crea una carpeta �xamboo� con todo el c�digo adentro.

Esta carpeta *no debe* de estar en un directorio p�blico accesible por Web, sea internet o local

** Se recomienda poner el c�digo de xamboo es un directorio en un nivel anterior al sitio web mismo, o en un directorio accesible por el sitio web.

Ejemplo:

Directorio base del sitio web:
/var/www

Descomprimir xamboo en /var:

/var/xamboo
/var/html

Dentro de xamboo, hay una carpeta llamada "site".
Puede enlazar esta carpeta a la ra�z del sitio web, o usar cualquier otra carpeta a su gusto, y copiar los archivos presentes aqu� en su carpeta ra�z del sitio web.


2. Instalaci�n del wrapper

Copiar los 2 archivos index.php y .htaccess en la carpeta p�blica del web
Estan en xamboo/site

Edite el archivo index.php. Al principio del archivo, hay 3 directorios que enlazan la configuraci�n del Xamboo.
Modifique los directorios para enlazar el sistema en donde haya instalado la carpeta xamboo.
Por defecto, busca xamboo un directorio anterior a la ra�z del sitio.

El archivo index.php es indicativo, y puede ser aumentado de lo que se requiera para el buen funcionamiento de su sitio (por ejemplo login de usuarios, logs de hits, configuraci�n y directorios a partir de archivos, conecci�n a base de datos, etc.)

El archivo .htaccess de la misma manera, define las reglas para hacer el wrap de apache hacia el index.
Puede fabricar un arhico equivalente para otros web servers si no usa el apache.

Se describe m�s adelante en el cap�culo "Referencia - Wrapper" lo m�nimo necesario para hacer funcionar Xamboo y como usarlo.


3. Instalaci�n del archivo de mantenimiento

Copiar el archivo maintenance.html en la carpeta p�blica del web
Esta en xamboo/site

Este archivo se usa cuando el sistema se switchea a modo "mantimiento" desde la configuraci�n. Puede especificar cualquier archivo, por defecto viene este.


4. Instalaci�n de la base de sistema

Dentro del directorio xamboo/site, tambi�n viene un archivo Base.lib
Este archivo contiene su propio archivo Base, derivado del Base_engine de Xamboo en el cual puede agregar toda la funcionalidad que necesita para su propio sitio.

Puede dejar la libreria en la ra�z de su sitio ( en donde copi� index.php ), o protegerlo dentro de una carpeta de includes de clases propias.
Lo importante es que el sistema tenga acceso a el.


5. Ejemplo de instalaci�n

5.1 Instalaci�n muy b�sica

 /var/xamboo               Base de instalaci�n
 
 /var/xamboo/include       Librerias PHP
 
 /var/xamboo/site          Ra�z del Sitio Web 
 
 /var/xamboo/repository    Repositorio de datos del sitio


5.2 instalaci�n avanzada

Se instala en /home/sites/mi-sitio.com la herramienta de la manera siguiente:

 /home/sites/mi-sitio.com                         Base de instalaci�n
 /home/sites/mi-sitio.com/site                    Ra�z del sitio web
 /home/sites/mi-sitio.com/include                 Librerias PHP en general
 /home/sites/mi-sitio.com/include/base            Librerias propias del sitio, poner aqui el Base.lib
 /home/sites/mi-sitio.com/include/core            Librerias del core (viene con Xamboo)
 /home/sites/mi-sitio.com/include/datasources     Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/entities        Librerias Singletones (acceso a bases de datos, utilerias, etc.)
 /home/sites/mi-sitio.com/include/pages           P�ginas del sitio web
 /home/sites/mi-sitio.com/include/patterns        Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/throwables      Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/xamboo          Librerias del engine Xamboo
 /home/sites/mi-sitio.com/include/__autoload.inc  Autoload de los varios directorios de include (Viene con Xamboo, modificar para agregar todas las carpetas necesarias)
 /home/sites/mi-sitio.com/repository              Repositorio de datos de la acplicaci�n


Se pueden ubicar las p�ginas dentro de repositorio de datos, o dentro del include, al gusto del webmaster. La ventaja de tenerlas dentro del include es hacer un backup de todo el c�digo aparte de los datos que puedan estar dentro del repositorio, que suelen ser de tama�o m�s importante, pero de ciclo de vida mas largo (im�genes, caches, documentos, etc)


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

Puede ver la p�gina a trav�s de su sitio:
http://www.mi-sitio.com/hello-world
suponiendo que la URL de su sitio es www.mi-sitio.com enlazado a la ra�z de su sitio web.


P�ginas - referencia
====================

Una URI esta normalmente conformada de una ruta , seguida de un archivo y de par�metros GET.
El wrapper del web server hace una primera verificaci�n para saber si la URI corresponde f�sicamente a un archivo almacenado en la ruta p�blica del sitio. Si el archivo existe, lo despacha (por ejemplo, im�genes, JS, CSS, archivos multimedias etc), y si no entonces llama al engine de Xamboo en todos los dem�s casos. 
Dicho de otra manera, el web server nunca regresa un 404, sino que pasa la URI completa al engine en todos los casos.
El engine de  Xamboo ser� el responsable de contestar el 404 en caso necesario despu�s de realizar la resoluci�n de la librer�a/pagina a llamar en base a la estructura del repositorio.

Resoluci�n de p�ginas:
----------------------

Xamboo separa primero la ruta de la URI. Deja el / al principio y quita el �ltimo /.
La noci�n de archivo no existe en el framework. Por ejemplo, /mi-ruta/mi-archivo.html es algo que no entender�a el engine, salvo si existe f�sicamente la carpeta �mi-archivo.html� dentro de la carpeta �mi-ruta� en la ra�z del Sitio Web.

Las rutas de Xamboo son fabricadas para cumplir con las reglas de SEO e indexaci�n de buscadores.

Las rutas de Xamboo aceptan �nicamente los caracteres siguientes:

Letras a-z, letras con acentos y �, cifras 0-9, gui�n medio, gui�n bajo
No puede incluir /, \, signos de puntuaci�n, puntos, etc. dentro de las rutas (aunque lo soporta el sistema operativo). Las may�sculas son siempre convertidas a min�sculas por compatibilidad con los sistemas operativos insensibles a may�sculas/min�sculas como es el Windows.

Por ejemplo si captura en la URI la ruta:
/Mi-PaginA/Mi-Ruta-con.un-punto     :  regresar� autom�ticamente un error por el punto
/Mi-PaginA/Mi-RutA                  :  buscar� en repositorio de p�ginas la carpeta /mi-pagina/mi-ruta

Las p�ginas del framework se encuentran todas en el repositorio de p�ginas. Este repositorio es una carpeta llamada /pages/ situada dentro del repositorio del aplicativo por defecto.

**Cada p�gina es una carpeta**, que contiene una serie de archivos que conforman la definici�n y el c�digo de la p�gina.
Xamboo acepta una estructura jer�rquica de las p�ginas, es decir que soporta tener p�ginas dentro de otras p�ginas es decir carpetas dentro de otras carpetas.

La ruta de las p�ginas es la misma ruta que se usa en la URI para acceder esta p�gina.

La b�squeda se realiza de la manera siguiente:

1. Busca la carpeta de la ruta directamente como viene de la URI.
    a. Si no existe la carpeta, sigue en el punto 2
    b. Si existe la carpeta, verifica que exista el archivo .page adentro.
      i. Si no existe, sigue en el punto 2
      ii. Si existe el archivo, verifica que este con estatus �pulished�
        1. Si no es �published�, sigue en el punto 2
        2. Si es publicado, calcula la p�gina y la regresa.
2. No se ha encontrado la p�gina. Quita la �ltima carpeta de la URI
    a. A�n hay carpetas, prosigue en el punto 1
    b. Ya no hay carpetas, termina con un error
    
Resumiendo, es la primera carpeta encontrada en la ruta empezando por el final que ser� ejecutada. En otras palabras, puede agregar lo que sea despu�s de la ruta oficial, ser� ignorado y trasladado a la p�gina encontrada como una serie de par�metros.

Ejemplos:
Estructura del repositorio:
/secci�n     
    => p�gina real con el archivo secci�n.page, publicado
/secci�n/subsecci�n   
    => p�gina real con el archivo subsecci�n.page, publicado
/secci�n/subsecci�n/sub-subsecci�n  
    => p�gina real con el archivo sub-subsecci�n.page, no publicado

camino de la URI por resolver:    /secci�n/subsecci�n/sub-subsecci�n/otra-cosa/una-ruta-extra

La resoluci�n busca primero la carpeta /secci�n/subsecci�n/sub-subsecci�n/otra-cosa/una-ruta-extra, que no existe.
Luego, la resoluci�n busca /secci�n/subsecci�n/sub-subsecci�n/otra-cosa, que no existe
Luego, la resoluci�n busca /secci�n/subsecci�n/sub-subsecci�n, que existe pero no es publicado
Finalmente, la resoluci�n busca /secci�n/subsecci�n que existe y es publicada
Ejecuta y regresa la p�gina efectiva /secci�n/subsecci�n

El complemento del camino es pasado  a la p�gina y puede ser usado como un arreglo de par�metros 
En general estos par�metros son palabras usadas para el SEO, variables, nombres de art�culos, etc.


Estructura de las p�ginas:
-------------------------

Para que una carpeta en el repositorio de p�ginas sea considerado como una p�gina v�lida, necesita cumplir con una serie de est�ndares. Sino, no ser� considerado una p�gina y el engine ignorar� la carpeta.

Todas las p�ginas necesitan un archivo obligatorio de definici�n de la p�gina, de nombre igual que la p�gina (carpeta) y de extensi�n .page

Ejemplo:
P�gina �pagina-principal�:
Carpeta: [repositorio]/page/pagina-principal/
Archivo de definici�n: [repositorio]/page/pagina-principal/pagina-principal.page

El archivo contiene una serie de par�metros descritos en el cap�tulo siguiente.

Cada p�gina puede tener desde una hasta un n�mero ilimitado de instancias.
Hay dos par�metros que rigen las instancias:
- La versi�n
- El idioma

NOTA IMPORTANTE:
El conjunto [version.idioma] es opcional, es decir, si trabaja con una sola versi�n/idioma por defecto de una p�gina, puede omitir estos par�metros.

La versi�n es un identificador que permite separar la misma p�gina con distinto c�digo seg�n las necesidades
La versi�n acepta letras min�sculas, letras con acentos, cifras, guion medio, guion bajo.
Por ejemplo, puede tener varias versiones de la p�gina principal: 
- Versi�n por defecto
- Versi�n para imprimir
- Versi�n para d�biles visuales
- Versi�n para m�biles
Tambi�n podr�a guardar el hist�rico de la p�gina principal:
- Versi�n del 2010
- Versi�n del 2011
- Versi�n de la temporada de Navidad
- Versi�n actual

De la misma manera puede tener la p�gina en varios idiomas.
El idioma es la representaci�n oficial de 2 letras del idioma regido por la norma ISO-339 idiomas en 2 letras.
Obviamente la noci�n de idiomas es importante �nicamente si la p�gina contiene f�sicamente textos traducibles, y/o necesita un sitio con varios idiomas.

Nota importante:
Se recomienda hacer una explosi�n de bloques de la p�gina para jam�s tener m�s de una dimensi�n sobre la cantidad de instancias.
Por ejemplo, si tiene su sitio en 5 idiomas y 4 versiones b�sicas son de entrada 20 archivos de c�digo para cada p�gina lo que se vuelve inmediatamente inmanejable.
En este caso, hay que separar las tablas de idiomas en una p�gina, y el c�digo en otra p�gina, para tener solamente 2 p�ginas con 5 y 4 archivos de c�digo cada una. Luego hay que asegurarse que las versiones puedan resolverse a pocos bloques distintos entre las versiones y todo lo dem�s se pueda resolver en una sola p�gina con una sola instancia.

Ejemplos:
/paginaprincipal
/paginaprincipal/paginaprincipal.page            definici�n de la p�gina
/paginaprincipal/paginaprincipal.instance        instancia �nica de la p�gina
/paginaprincipal/paginaprincipal.code            c�digo de la p�gina

/plantilla
/plantilla/plantilla.page                        definici�n de la p�gina
/plantilla/plantilla.base.es.instance            instancia en espa�ol de la p�gina, versi�n base
/plantilla/plantilla.base.es.code                c�digo de la instancia en espa�ol de la p�gina, versi�n base
/plantilla/plantilla.base.en.instance            instancia en ingl�s de la p�gina, versi�n base
/plantilla/plantilla.base.en.code                c�digo de la instancia en ingl�s de la p�gina, versi�n base

/datos
/datos/datos.page                       definici�n de la p�gina
/datos/datos.imprimir.es.instance       instancia de la p�gina, versi�n imprimir
/datos/datos.imprimir.es.code           c�digo de la instancia de la p�gina, versi�n imprimir
/datos/datos.ver.es.instance            instancia de la p�gina, versi�n ver
/datos/datos.ver.es.code                c�digo de la instancia de la p�gina, versi�n ver


Tipos de p�ginas vs archivos necesarios:
=========================================

Una p�gina "sencilla" necesita:
- un archivo .page
- un archivo .instance
- un archivo .code

Una p�gina "libreria" necesita:
- un archivo .page
- un archivo .instance
- un archivo .template, opcional
- un archivo .language, opcional
- un archivo .lib

Una p�gina "template" necesita:
- un archivo .page
- un archivo .instance
- un archivo .template

Una p�gina "language" necesita:
- un archivo .page
- un archivo .instance
- un archivo .language

Una p�gina "redirect" necesita:
- un archivo .page

Resoluci�n de instancias:
=========================

Una vez que el sistema encuentra la p�gina indicada, buscar� la instancia de esta p�gina m�s conveniente.
***** NOTA DEL PROGRAMADOR: Se necesita poder pasar versi�n e idioma forzado por URI para efectos de depuraci�n; VERIFICAR COMO Y DONDE *****
***** Busca primero la versi�n solicitada por la URI y/o el sistema de cookies y par�metros del cliente y del sistema*****

Si el archivo de definici�n de la p�gina contiene el par�metro defaultversion, el engine busca esta versi�n.
Si el archivo de definici�n no tiene el par�metro, o el par�metro esta vacio, entonces buscar� la versi�n por defecto del sistema llamado �base�

El idioma a buscar se basa sobre la cookie de idiomas del cliente.
Si esta cookie no esta puesta, entonces resuelve primero el idioma del cliente que solicita el c�digo. Si el idioma no es reconocido, entonces usar� el idioma por defecto del sistema.

Puede modificar el idioma por defecto de esta p�gina con el par�metro defaultlanguage en el archivo de definici�n de la p�gina.
Si la cookie esta puesta, entonces buscar� el idioma del valor.
Si la instancia de esta p�gina no existe para el idioma seleccionado, entonces buscar� la instancia con el idioma por defecto del sistema, o del par�metro defaultlanguage

La instancia con el idioma por defecto y la versi�n por defecto tiene que existir *siempre*.
El sistema sabe que la instancia existe si y solamente si existe un archivo llamado 
[nombre-de-la-pagina].[version].[idioma].instance

El idioma son las 2 letras oficiales de la norma ISO 339 � idiomas, por ejemplo 'es' para espa�ol, 'en' para ingl�s y 'fr' para franc�s.



Referencia de archivos para las p�ginas:
========================================

Archivo de definici�n .page
-----------------------------

El archivo .page es una colecci�n de par�metros, uno por l�nea con la sintaxis siguiente:
Par�metro=valor

El sistema reconoce por defecto 6 par�metros en este archivo:
- type:  es el tipo de p�gina. Obligatorio. Puede tener los valores siguientes:
o simple: es una p�gina sencilla, basada en un c�digo a despachar agregado del meta-lenguaje del Xamboo
o library: es una clase PHP que despachar� el c�digo calculado. La librer�a tiene que llamarse igual que la p�gina y extender XBLibrary
o template: es una plantilla basada en el sistema de plantillas WATemplate del DomCore
o language: es una tabla de idiomas basada en el sistema de internacionalizaci�n WALanguage del DomCore
o box: es una definici�n XML de Box Model con sus librer�as respectivas
o redirect: redirecciona la pagina hasta la pagina con el c�digo especificado (301 0 302) formato: 301,liga o 302,liga

- status:  es el estatus de la p�gina. Obligatorio. Puede tener los valores siguientes:
o hidden: pase lo que pase, el c�digo contenido en esta p�gina es ignorado como si no existiera
o published: el c�digo contenido en esta p�gina es visible directamente desde el exterior, o sea accesible por solicitud directa desde la URI
o block: el c�digo es accesible, pero �nicamente por llamadas internas del Xamboo, desde otra p�gina o desde el c�digo

- template: es la plantilla a usar alrededor de esta p�gina. Opcional. Usa la ruta relativa de la plantilla en el repositorio de p�ginas, sin el / inicial. La plantilla debe de contener la palabra clave [[CONTENT]] en donde esta p�gina se incluir�.

- defaultversion: es la versi�n por defecto de la instancia de la p�gina. Opcional. La instancia con esta versi�n tiene que existir.

- defaultlanguage: es el idioma por defecto de la instancia de la p�gina. Opcional. La instancia con este idioma tiene que existir.

- redirect: es la linea de redirect si el tipo es redirect.
formato: 301,liga o 302,liga

Adem�s de estos 6 par�metros reconocidos por el framework, el programador puede agregar tantos par�metros extras como necesita, estos ser�n almacenados y distribuidos al c�digo de la p�gina para cualquier necesidad, e incluso consultables por otras p�ginas por c�digo y/o meta-lenguaje.

Nota: no es recomendable poner par�metros que contengan textos para enviar al cliente en este archivo, ya que la definici�n de la p�gina es independiente del idioma. Para los textos se recomienda agregar los par�metros en el archivo de definici�n de la instancia, que s� es sensible al idioma.


Archivo de definici�n .instance
--------------------------------

El archivo .instance tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versi�n].[idioma].instance

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versi�n es el nombre de la versi�n de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El par�metro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional y se ignora la mayor parte de las veces si no usa un sitio multi-versi�n o multi-idioma.

El archivo .instance es una colecci�n de par�metros, uno por l�nea con la sintaxis siguiente:
Par�metro=valor
El framework espera los par�metros de uso del cache en este archivo.
El programador puede agregar tantos par�metros como desea. Estos par�metros son usables directamente por el c�digo de la p�gina e incluso desde otras p�ginas.

- cache: full, yes o no. Opcional. Es el indicador para saber si la p�gina esta cacheada. Por defecto es no.
'full' indica que el sistema har� un cache completo de la p�gina con su plantilla, mientras 'yes' solamente cachear� la p�gina pero seguir� llamando la plantilla no cacheada.
- cacheexclude:  todas las URLs de excepci�n para no usar el cache, si el cache es puesto a 'yes' o 'full'.
- cachevariables: lista de variables (del query ?... de HTTP) que hacen la p�gina �nica para poder cachar cada versi�n calculable de la p�gina (por ejemplo una paginaci�n). La lista es separada por comas.



Archivo contenedor de c�digo .code
-----------------------------------

El archivo .code tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versi�n].[idioma].code

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versi�n es el nombre de la versi�n de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El par�metro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .code es una mezcla del c�digo a despachar con las palabras clave del meta-lenguaje.
Favor de consultar el manual del meta-lenguaje para saber como usarlo


Archivo .lib
-------------

El archivo .lib tiene el formato siguiente:
[nombre-de-la-pagina].lib

Las p�ginas dinamicas de Xamboo se basan en varias clases pre-definidas en el core de la herramienta. Puede adem�s extender sus propias clases para fines propios, como por ejemplo una clase para p�ginas exclusivas con usuario conectado (ver ejemplos despu�s).

XBLibrary: clase base para cualquier libreria para despachar una p�gina din�mica a trav�s de un sitio WEB normal. Implementa el �nico m�todo run, llamado cuando se llama una p�gina normal.

XBRESTLibrary: clase base para cualquier libreria para despachar una p�gina din�mica a trav�s de una REST-API. Implementa los 4 m�todos base get, put, post, delete.

Ejemplo:

P�gina home:
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
[nombre-de-la-pagina].[skin].[versi�n].[idioma].template

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versi�n es el nombre de la versi�n de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El par�metro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .template es una mezcla del c�digo a despachar con las palabras clave de una plantilla.

Xamboo usa el sistema de plantillas de DomCore.
Las plantillas usan un set de metapalabras que estan descritas en sus propios manuales que puede consultar en http://www.webability.info/?P=documentacion&wiki=/DomCore .


Archivo .language
------------------

El archivo .language tiene el formato siguiente:
[nombre-de-la-pagina].[skin].[versi�n].[idioma].template

nombre-de-la-pagina tiene que ser el mismo que la carpeta en la cual se encuentra.
versi�n es el nombre de la versi�n de esta instancia.
idioma es el identificador del idioma en formato ISO-339.
El par�metro [skin] es opcional y se ignora siempre si no usa skins.
El conjunto [version.idioma] es opcional.

El archivo .language es un archivo de tipo XML.

Xamboo usa el sistema de idiomas de DomCore.
Los idiomas usan un archivos XML que esta descrito en sus propios manuales que puede consultar en http://www.webability.info/?P=documentacion&wiki=/DomCore .


Compilaci�n y caches
---------------------

Todo el c�digo del framework es compilado y cacheado en varios niveles, DE MANERA AUTOMATICA, el usuario no necesita administrar estos caches.

El administrador tiene acceso a la configuraci�n de c�mo se deben de comportar los cach�s seg�n los varios par�metros de la configuraci�n, desde d�nde se deben de almacenar, hasta si deben o no calcularse y guardarse, con opci�n a variantes por variables de URL, etc.


Objeto Base
------------

El objeto base es accesible desde cualquier lugar del c�digo PHP:
- En todas las clases, viene impl�cito en $this->base
- En el c�digo integrado en p�ginas .code con '[[PHP...PHP]]' viene accesible directamente como $base.
  
Engine
-------

El engine es accesible desde cualquier punto de entrada en el c�digo del usuario:
- En las clases, viene como par�metro en el llamado de run, get, post, put, delete.
- En el c�digo integrado en p�ginas .code con '[[PHP...PHP]]' viene accesible directamente como $engine.


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
Llama un par�metro dentro del archivo .page de la p�gina llamada por la URL.

[[LOCALPAGEPARAM,nombre]]
Llama un par�metro dentro del archivo .page de la p�gina local.

[[INSTANCEPARAM,nombre]]
Llama un par�metro dentro del archivo .instance de la p�gina llamada por la URL.

[[LOCALINSTANCEPARAM,nombre]]
Llama un par�metro dentro del archivo .instance de la p�gina local.

[[VAR,nombre]]
Llama una variable de la URL, por GET o POST.

[[JS,ruta]]
Almacena el archivo JS para agregar al header de esta p�gina en c�lculo.

[[CSS,ruta]]
Almacena el archivo CSS para agregar al header de esta p�gina en c�lculo.

[[PHP,cache: ... PHP]]
Snippet de PHP integrado en esta p�gina

[[BLOCK,ruta: ... ]]
Llama otra p�gina para integrarla en este lugar. Los par�metros vienen uno por linea y son numerados de 0 a x.

[[CALL,ruta: ... ]]
Llama otra p�gina para integrarla en este lugar. Los par�metros son nombrados nombre=valor, uno por linea.



Meta lenguaje todav�a por implementar:
--------------------------------------

[[WIDGETS]]
Las sub-p�ginas se integran automaticamente como subbloques en orden 
** not yet implemented **

[[WIDGETS,ruta]]
Las sub-paginas de la ruta especificada se integran automaticamente como subbloques en orden 
** not yet implemented **

[[LINK,liga]]
Genera una URL sobre el framework
** not yet implemented **

[[SYSPARAM,nombre]]
Llama un par�metro del sistema (en la configuraci�n)
** not yet implemented **

[[CLIENTPARAM,nombre]]
Llama un par�metro del usuario conectado (extenci�n no implementada)
** not yet implemented **



