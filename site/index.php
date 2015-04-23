<?php

// CONFIGURATION OBJECT, uncomment/modify what you need:
// You may load this from any config file, database, or whatever you want.

$config = array(
  /* Path to the repository of site pages */
  'PAGESDIR' => '../repository/',

  /* optional parameters
     This parameter will tell the system to keep the history of changes of code repository (.page, .instance, .code, .template, .language)
     the .lib PHP libraries pages are not include in the changes history because they are not compiled or version tested.
     'true' or '1' = keep the history, 
     [default], 'false', '0' or null = do no keep it,  */
//  'HISTORY' => 1,
  /* Directory where to keep the history of changes  */
//  'HISTORYDIR' => '',
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