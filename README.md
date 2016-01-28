@UTF-8

Xamboo v3
=============================
This is the build 001

Manuals
=======================

Please refer to README.es.md for manual in spanish. (recommended to watch it as plain text)
Please refer to README.en.md for manual in english. (recommended to watch it as plain text)

If you want to help converting the manual from text into .md file, you are most welcome.
Translations are also welcome.

Version Changes Control
=======================

V3.0.2 - 2016-01-26
-----------------------
> Uses CORE 3.0.2
> Uses XConfig 2.0.1
- Error corrected on namespaces in some servers

V3 Build 1 - 2015-12-02
-----------------------
> Uses CORE 3.0.1
- Many error corrected on namespaces
- Module for integration with PHP application server included
- Support for PHP application server in various libraries (HTTPRequest, HTTPResponse, Base_Engine)
- Now uses XConfig in the examples to load the xamboo.conf configuration file from repository

V3 Build 000 - 2015-11-17
-----------------------
> Uses CORE 3.0.0
> Uses XConfig v2.0.0
- Xamboo uses now namespaces and is fully compatible with PHP7
- XConfig has been added for simple configuration of the tool

V2 Build 005 - 2015-07-21
-----------------------
> Uses CORE 2.0.1
- An important error has entered into XBCode on last version 2.0.4 and has been corrected: the metalanguage comments %-- ... --% were not working correctly

V2 Build 004 - 2015-07-19
-----------------------
> Uses CORE 2.0.1
- Added all the default parameters into index.php of site and restsite for examples
- The metaword 'PARAM' has been slightly modified so it works also for simple pages CALLs, a new syntax has been added: [[PARAM,name]] (it was only working for library CALLs)
- Manuals are more complete.

V2 Build 003 - 2015-06-17
-----------------------
> Uses CORE 2.0.1
- added PUTDATA in HTTPRequest, to be able to access the data sent by a PUT command into the body, if it not a JSON string

V2 Build 002 - 2015-06-11
-----------------------
> Uses CORE 2.0.1
- The base_engine object now uses the WABase library from domcore

V2 Build 001 - 2014-05-03
-----------------------
> Uses CORE 1.01.17
- Most of libraries renamed to XB...
- Added support for new types of pages registering them into the engine
- Added automatic history of changes of code, instances, pages, templates, languages

Build 004 - 2014-04-21
-----------------------
> Uses CORE 1.01.16
- Removed not usefull code, clean not used libraries
- Added comments and headers of code
- Spanish basic manual added

Build 003 - 2014-04-18
-----------------------
> Uses CORE 1.01.15
- Added the use of CACHE1 and CACHE2 variables to set directories where the level-1 and level-2 caches live and if they are activated or not.
- Added support for Request variables in .code pages
- Added support for REST API engine and clases

Build 002
-----------------------
- Added configuration parameters.
- Separation of Base_Engine from Engine and Base.

Build 001 - 2012-09-23
-----------------------
- First official build.
