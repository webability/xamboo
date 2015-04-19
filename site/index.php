<?php
// Xamboo Index Wrapper v.1
// index.php / Main Site index
// WRAPPER TO MAIN SITE DISPATCHER
// Ing. Philippe Thomassigny (c) 2012-2013
// Xamboo is free software

error_reporting(E_ALL);
ini_set('display_errors', true);

// implements __autoload
include_once "../include/__autoload.lib";

// we setup some variables we need
$URI = $QUERY = $BASE_P = $base = null;

// we create the base object with very basic config parameters
$base = new Base(array(
  'REPOSITORYDIR' => '../repository/',
  'PAGESDIR' => '../repository/',
  'PAGESCONTAINER' => 'pages/'
));
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