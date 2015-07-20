<?php

// CONFIGURATION OBJECT, uncomment/modify what you need:
// You may load this from any config file, database, or whatever you want.

$config = array(
  /* Path to the repository of site pages */
  'PAGESDIR' => '../repository/',

/*
  // optional parameters

  // You can uncomment the whole block, each config parameter is set with its own default value
  // or just get the parameters you need outside the comments.
  
  // The container of the pages into the PAGESDIR. Default value is pages/, 
  // so the default build directory is ../repository/pages/
  'PAGESCONTAINER' => 'pages/',

  // Set to true or 1 if you want an automatic history of changes of pages
  // This parameter will tell the system to keep the history of changes of code repository (.page, .instance, .code, .template, .language)
  // the .lib PHP libraries pages are not include in the history changes because they are not compiled or version tested.
  'HISTORY' => false,
  // If previous parameter is set to true, specify the directory to put the history logs
  'HISTORYDIR' => null,
  // Set to true if you want to use first level cache
  // The first level cache is the compilation of the .code, .template and .language pages for a faster access.
  // It is highly recommended to activade level 1 cache.
  'CACHE1' => false,
  // The directory where to put the level 1 caches.
  'CACHE1DIR' => null,
  // Set to true if you want to use second level cache
  // The second level cache are the HTML pages already build, ready to dispatch to the browser.
  // It is highly recommended to use a second level cache when you have lots of static or semi static pages.
  // Every page may or may not be included in the cache based on individual parameters.
  'CACHE2' => false,
  // The directory where to put the level 2 caches.
  'CACHE2DIR' => null,

  // Set to true if you want the system using the shared memory. 
  // The shared memory extension must work.
  'SHMLOAD' => false,
  // The size of shared memory to use. It is recomemded to use at least 1Mb of shared memory per page.
  'SHMSIZE' => null,
  // The system wide shared memory ID
  'SHMID' => null,

  // If you want to activate skins on the system
  'SKIN' => null,
  // The default version of pages. It is by default 'base' and should never be changed
  'DefaultVersion' => 'base',
  // The default language of the pages. It is english and should never be changed
  'DefaultLanguage' => 'en',
  // The default version of the pages for this site. It is highly recommended to never change 'base' unless you perfectly know what you are doing (advanced configuration)
  'Version' => 'base',
  // The default language of the pages for this site. You may change with your local language
  'Language' => 'en',

  // The pain default page of the site. You may change anytime you want a new page as default.
  'mainpage' => 'home',
  // The error page (i.e if URL canot be resolved, this page is invoked)
  'errorpage''error',
  // The error block page (i.e if a block canot be resolved, this blockis invoked)
  'errorblock''errorblock'
*/
);

// ==== YOU SHOULD NOT TOUCH ANYTHING PAST THIS LINE UNLESS YOU REALLY KNOW WHAT YOU ARE DOING ======

/* @DESCR -- Do not edit

index.php, Xamboo
Xamboo main wrapper, site index
(c) 2015 Philippe Thomassigny

This file is part of Xamboo

Xamboo is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Xamboo is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Xamboo.  If not, see <http://www.gnu.org/licenses/>.

Creation: 2012-03-01
Changes:
  2015-04-22: Phil, added $config variable and comments on parameters

@End_DESCR */

error_reporting(E_ALL);
ini_set('display_errors', true);

// implements __autoload
include_once "../include/__autoload.lib";

// we setup some variables we need
$URI = $QUERY = $BASE_P = $base = null;

// we create the base object with very basic config parameters
// Only 1 parameter is absolutly necesary: PAGESDIR.
$base = new Base($config);
WAMessage::setMessagesFile('../messages/message.'.$base->Language.'.xml');
  
if (isset($_SERVER['REQUEST_URI']))
  $URI = strtolower($_SERVER['REQUEST_URI']);
if ($URI)
{
  // Remove query part (already managed by PHP)
  if (strpos($URI, '?'))
  {
    $QUERY = substr($URI, strpos($URI, '?'));
    $URI = substr($URI, 0, strpos($URI, '?'));
  }
  if (substr($URI, -1) == '/' && strlen($URI) > 1)
  {
    // NO ACEPTAMOS URLS QUE TERMINAN CON /, REDIRECCIONAMOS !!
    $URI = substr($URI, 0, -1);
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $URI . $QUERY);
    return;
  }
  if (strlen($URI) > 1)
    $BASE_P = $URI;
}
if (!$BASE_P)
  $BASE_P = 'home';

// Call the engine with the page
$engine = new engine($URI);
// $engine->SKIN = 'myskin';
print $engine->run($BASE_P);

?>