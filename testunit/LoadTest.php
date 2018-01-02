<?php

namespace testunit;

use PHPUnit\Framework\TestCase;

class LoadTest extends TestCase
{
  public function testCreate()
  {
    $x = new \core\WADebug();
    var_dump($x);
    $this->assertEquals('OK', 'OK');
  }

}

?>