<?php

namespace testunit;

class LoadTest extends \PHPUnit_Framework_TestCase
{
  public function testCreate()
  {
    $x = new \core\WADebug();
    var_dump($x);
    $this->assertEquals('OK', 'OK');
  }

}

?>