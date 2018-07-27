Xamboo v2 - Basic Manual
=========================

IMPORTANT NOTE: This manual has been translated with Google Translator so it can not be fully understandable for now.

Introduction:
-----------------------

Xamboo is the result of over 15 years of manufacturing engineering frameworks.

It is a very high quality framework for CMS, made in PHP 5.3 or higher, fully object-oriented and strong to distribute code into Web portals with heavy load and REST APIs optimization.

Xamboo is freeware, and uses several other freeware components (DomCore, XConfig)

Xamboo is an engine to build applications that distribute any type of code to the client:
It is completely independent of the generated code, i.e. you can send HTML, XHTML, XML, SGML, javascript, JS, JSON, WAP, PDF, etc.


Armed examples are in HTML 5 and CSS3 Javascript.

Xamboo not need a database to manage the entire structure of the framework, which makes it extremely fast, easy to use and powerful.

Xamboo works on sites currently distributing more than **60 millions web pages monthly**, (that's near 500 pages per second on peak hour) it serves regular sites, and GRAPH-APIs / REST APIs to APP-mobiles.


Requirements:
-----------------------
To user Xamboo as your CMS framework, you will need:
- A webserver (Apache, nginx, etc.)
- PHP 5.3 minimum, PHP 7 recommended

Installation
-----------------------
Always download the latest version from github https://github.com/webability/xamboo

You will get a file with the format: xamboo-xx-yy-zz.tar.gz
Where xx-yy-zz is the current version of the framework.


1. Linux installation

1.1 Files

You must unzip the file xamboo-xx-yy-zz.tar.gz where you want to install the Xamboo.

When decompressing, it will creates a 'xamboo' folder with all the code inside.

This folder **should not** be in a public directory accessible by Web, either internet or local

**Note: It is recommended to put the code xamboo is a directory one level above the same web site, or in a directory accessible by the web site.

Examples:

In your linux server with an Apache, you generally have a base directory website:

/var/www


Unzip xamboo in /var and you obtain:

/var/xamboo
/var/html


Within xamboo, there is a folder called "site".
You can link this folder to the root of the website, or use any other folder as you like, and copy the files present here in the root folder of you website directory.



2. Installing the wrapper

Copy the **index.php** and **.htaccess** files in the public folder you linked with yout webserver:
They are in [?]/xamboo/site

Edit the **index.php** file.
At the beginning of the file, there are 3 directories that link Xamboo settings.
Change directories to link the system xamboo folder where you have installed.
By default, it will searches xamboo as the first parent directory of the website root dir.

**index.php** is and example and can be modified to what is required for the proper functioning of your site (eg user login, logs hits, configuration and directories from files, database connection, etc .)

The **.htaccess** file works the same way, it defines the rules to make the apache wraps to the index.
You can make an access file equivalent for other web servers if you do not use apache.

Please read below in the chapter "Reference - Wrapper" for the minimum requirements to run Xamboo and how to use it.


3. Installing the maintenance file

Copy maintenance.html file in the public folder of the web
This in xamboo / site

This file is used when the system switchea to "Care Instructions" from the configuration mode. You can specify any file, by default it is this.


4. Install the base system

Within the xamboo / site directory, then comes a file Base.lib
This file contains its own Base file, Base_engine derivative of Xamboo in which you can add all the functionality you need for your own site.

You can leave the library at the root of your site (where you copied index.php) or protect inside a folder includes its own classes.
What is important is that the system has access to it.


5. Example of installation

5.1 Very Basic Installation

/ Var / xamboo Base Installation
/ Var / xamboo / include PHP Libraries
/ Var / xamboo / site Root Web Site
/ Var / xamboo / repository data repository site


5.2 Advanced installation

The tool follows Installs in /home/sites/mi-sitio.com:

/home/sites/mi-sitio.com Base Installation
Root /home/sites/mi-sitio.com/site website
PHP Libraries generally /home/sites/mi-sitio.com/include
Libraries /home/sites/mi-sitio.com/include/base own site, put here the Base.lib
Libraries /home/sites/mi-sitio.com/include/core the core (comes with Xamboo)
Libraries /home/sites/mi-sitio.com/include/datasources the engine Xamboo
Libraries /home/sites/mi-sitio.com/include/entities Singletones (access to databases, utilities, etc.)
/home/sites/mi-sitio.com/include/pages Pages website
Libraries /home/sites/mi-sitio.com/include/patterns the engine Xamboo
Libraries /home/sites/mi-sitio.com/include/throwables the engine Xamboo
Libraries /home/sites/mi-sitio.com/include/xamboo the engine Xamboo
/home/sites/mi-sitio.com/include/__autoload.inc Autoload of several directories include (Comes with Xamboo amended to add all necessary folders)
/home/sites/mi-sitio.com/repository data repository acplicación


You can locate pages within data repository or within the include, to suit the webmaster. The advantage of having them in the include is to backup all code beyond data that may be within the repository, which are usually bigger in size, but longer life cycle (images, caches, documents, etc)


Hello, World
====================

Create repository / pages folder / hello-world
Create new folder with one hello-world.page file with the following content:

> Type = Single
status = published
template = template

Create a file hello-world.instance
Leave empty file

Create a file hello-world.code
with the following contents:

> <Html>
<Body>
Hello, World!
</ Body>
</ Html>

You can view the page through your website:
http://www.mi-sitio.com/hello-world
assuming the URL of your site is www.mi-sitio.com linked to the root of your website.


Pages - Reference
====================

A URI is normally comprised of a route, followed by a file and GET parameters.
The wrapper web server makes an initial check to see if the URI physically corresponds to a stored public site path file. If the file exists, it dispatches (eg images, JS, CSS, multimedia files etc) and if not then calls the engine of Xamboo in all other cases.
In other words, the web server never returns a 404, but passes the full URI to engine in all cases.
The engine of Xamboo will be responsible for answering the 404 if necessary after placing the order for the library / product call based on the structure of the repository.

Resolution of pages:
----------------------

Xamboo separates the path of the URI first. Leave the / at the beginning and removes the last /.
The notion of file does not exist in the framework. For example, /mi-ruta/mi-archivo.html is something you do not understand the engine, unless there physically 'mi-file.html' folder within the 'my-route' folder in the root of the Web Site.

Xamboo routes are manufactured to comply with the rules of SEO and search engine indexing.

Routes Xamboo accept only the following characters:

Az letters, letters with accents and ñ, numbers 0-9, hyphen, underscore
You can not include /, \, punctuation marks, spots, etc. within routes (although the OS supports it). Capitalization is always converted to lowercase for compatibility with operating systems insensitive to uppercase / lowercase is Windows.

For example if you capture the URI path:
/Mi-PaginA/Mi-Ruta-con.un-punto: Automatically return an error by point
/ Mi-page / Mi-route: look at pages repository folder / my-page / my-route

The pages of the framework are all in the repository pages. This repository is a folder called / pages / repository located within the default application.

** Each page is a folder **, which contains a number of files that make up the definition and code of the page.
Xamboo accepts a hierarchical structure of pages, namely that supports have pages within other pages ie folders within folders.

The route of the pages is the same route used in the URI to access this page.

The search is performed as follows:

1. Locate the folder path directly as it comes from the URI.
    a. If there is no folder, follow in section 2
    b. If the folder exists, check there inside the .page file.
      i. If not, continues in point 2
      ii. If the file exists, verify this with status 'pulished'
        1. If not 'published', follows in section 2
        2. If published, calculates and returns page.
2. Not Found page. Removes the last folder URI
    a. There folders still continues in point 1
    b. No more folders, terminate with an error
    
In short, it is the first folder found on the route from the end to be executed. In other words, you can add whatever after the official route will be ignored and taken to the page found as a number of parameters.

Examples:
Repository Structure:
/ Section
    => Real page with the file sección.page published
/ Section / subsection
    => Real page with the file subsección.page published
/ Section / subsection / sub-subsection
    => Actual page with sub-subsección.page file, unpublished

URI path to solve: / section / subsection / sub-sub / other-thing / one-way-extra

The resolution first searches the / section / subsection / sub-sub / other-thing / one-way-extra, that does not exist.
Then, the resolution looks / section / subsection / sub-sub / other-thing that does not exist
Then, the resolution looks / section / subsection / sub-subsection, which exists but is not published
Finally, the resolution looks / section / subsection exists and is published
Executes and returns the actual page / section / subsection

The complement of the path is passed to the page and can be used as an array of parameters
In general, these parameters are words used for SEO, variables, names of items, etc.


Structure of pages:
-------------------------

For a folder in the repository of pages to be considered as a valid page, you must meet a series of standards. Otherwise, it will be considered a page and the engine will ignore the folder.

All pages needing a binding definition file page, named like the page (folder) and extension .page

Example:
Page 'page-master':
Folder: [repository] / page / page-master /
Definition file: [repository] /page/pagina-principal/pagina-principal.page

The file contains a number of parameters described in the next chapter.

Each page can have from one to an unlimited number of instances.
There are two parameters governing bodies:
- The version
- Language

IMPORTANT NOTE:
The set [version.idioma] is optional, that is, if you work with one version / default language for a page, you can omit these parameters.

The version is an identifier that allows separating the same page with different code as needed
The version accepts lowercase letters, accented letters, numbers, middle dash, underscore.
For example, you can have multiple versions of the homepage:
- Version default
- Print
- Version for visually impaired
- Version for mobile
It could also save the history of the main page:
- Revision of 2010
- Revision of 2011
- Revision of the Christmas season
- Current version

In the same way you can have the page in several languages.
The language is the official representation of two letter language governed by ISO-339 2-letter language standard.
Obviously the notion of languages ??is important only if the page contains translatable texts physically, and / or need a site with multiple languages.

Important note:
It is recommended that an explosion of blocks of the page to ever have more than one dimension on the number of instances.
For example, if you have your site in 5 languages ??and 4 basic versions are 20 input code files for each page which immediately becomes unmanageable.
In this case, you have to separate the language tables on a page, and the code on another page, to have only 2 pages with 5 and 4 code files each. Then make sure that the versions can be solved a few different blocks between versions and everything else can be resolved in a single page with a single instance.

Examples:
/ Homepage
/paginaprincipal/paginaprincipal.page definition of page
/paginaprincipal/paginaprincipal.instance single instance of the page
/paginaprincipal/paginaprincipal.code page code

/ Template
/plantilla/plantilla.page definition of page
Spanish /plantilla/plantilla.base.es.instance instance of the page, basic version
/plantilla/plantilla.base.es.code code instance in Spanish of the page, basic version
/plantilla/plantilla.base.en.instance instance in English of the page, basic version
/plantilla/plantilla.base.en.code code instance in English of the page, basic version

/ Data
/datos/datos.page definition of page
/datos/datos.imprimir.es.instance instance of the page print version
/datos/datos.imprimir.es.code instance code page, print version
/datos/datos.ver.es.instance instance page version see
/datos/datos.ver.es.code instance code page version see




.page Definition file
-----------------------------

The .page file is a collection of parameters, one per line with the following syntax:
Parameter = value

The system recognizes five default parameters in this file:
- Type: the type of page. Required. You can have the following values:
or simple: it is a simple page, based on a code to dispatch added the meta-language of Xamboo
or library: is a PHP class that will dispatch the calculated code. The library must be called like the page and spread XBLibrary
or template: is a template based on the template system WATemplate of DomCore
or language: a language table based system WALanguage internationalization of DomCore
or box: is an XML definition of Box Model with their respective libraries
or redirect: redirect To page with the specified code (301 0302) format: 301 or 302 league, league

- Status: the status of the page. Required. You can have the following values:
or hidden: whatever happens, the code contained in this page is ignored as if there
or published: the content on this page code is directly visible from the outside, that is accessible by direct request from the URI
or block: the code is accessible, but only for internal calls Xamboo from another page or from code

- Template: the template to use around here. Optional. Use the relative path of the template in the repository pages, without the leading /. The template should contain the keyword [[CONTENT]] where this page will be included.

- Defaultversion: the default version of the instance of the page. Optional. The version instance must exist.

- DefaultLanguage: the default language for the instance of the page. Optional. The instance in this language must exist.

In addition to these 5 parameters recognized by the framework, the developer can add as many extra parameters as needed, they will be stored and distributed to the page code for any need, and even consulted by other code pages and / or meta-language.

Note: It is not advisable to put parameters containing texts to send to the client in this file, since the definition of the site is language independent. For texts is recommended to add the parameters in the definition file for the instance, which itself is sensitive to language.


Resolution of instances:
-------------------------

Once the system finds the specified page, it will search the instance of this page more convenient.
***** PROGRAMMER NOTE: You need to spend version and forced by URI for debugging language; CHECK HOW AND WHERE *****
***** Look for the version requested by the URI and / or cookies and system parameters and system customer first *****

If the definition file contains the defaultversion page parameter, the engine looks for this version.
If the definition file does not have the parameter, or the parameter is empty, then it will search the default version of the system called 'base'

The language searching is based on the language of the client cookie.
If this cookie is not set, then solves the language of the client requesting the code first. If the language is not recognized, then it will use the default language of the system.

You can change the default language of this page DefaultLanguage parameter in the definition file of the page.
If the cookie is set, then look for the language of value.
If the instance of this page does not exist for the language, then it will search the instance with the default system language, or DefaultLanguage parameter

The instance with the default language and the default version has to be * always *.
The system knows that the instance exists if and only if a file called
[Name-of-the-page]. [Version]. [Language] .instance

The language are the two official letter ISO 339 standard - languages, for example is for Spanish, en for English and fr for French


.instance Definition file
--------------------------------

The .instance file has the following format:
[Name-of-the-page]. [Version]. [Language] .instance
name-of-the-page must be the same as the folder which is
version is the version name of this instance
language is the language identifier format ISO-339
The set [version.idioma] is optional.

The .instance file is a collection of parameters, one per line with the following syntax:
Parameter = value
The framework expects the use of cache parameters in this file.
The programmer can add as many parameters as desired. These parameters are usable directly by the code of the page and even from other pages.

- Cache: full, yes or no. Optional. It is the indicator of whether the page is cached. The default is no.
'Full' indicates that the system will do a full cache of the page with his staff, while 'yes' only will cache the page but will not cached template drawing.
- Cacheexclude: all URLs except for not using the cache if the cache is set to 'yes' or 'full'.
- Cachevariables: list of variables (the HTTP query ...?) That make single page to fuck each calculable version of the page (eg a page). The list is separated by commas.



File .code container code
-----------------------------------

The .code file has the following format:
[Name-of-the-page]. [Version]. [Language] .code
name-of-the-page must be the same as the folder which is
version is the version name of this instance
language is the language identifier format ISO-339
The set [version.idioma] is optional.

The .code file is a mixture of code to dispatch with the keywords meta-language.
Please refer to the meta-language manual on how to use it



.lib File
-------------

.template Archive
------------------

.language Archive
------------------


Compilation and caches
---------------------

The whole framework code is compiled and cached at various levels, automatically, the user does not need to manage these caches.



Base Object
------------

Class Reference
=====================

XBLibrary
XBCode
XBPage
XBInstance
XBRESTLibrary

Etc