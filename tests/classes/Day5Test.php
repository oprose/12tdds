<?php

include_once 'Loader.php';

class Day5Test extends PHPUnit_Framework_TestCase {

    private $object;
    
    const RANGE = 100;

    public function setUp() {
        $this->object = new Day5\FizzBuzz($this::RANGE);
    }

    public function testFizzBuzz() {
        foreach ($this->object as $key => $value) {
            if ($key % 3 == 0)
                $this->assertRegExp('/fizz/i', $value);
            
            if ($key % 5 == 0)
                $this->assertRegExp('/buzz/i', $value);
            
            if (($key % 3 != 0) && ($key % 5 != 0))
                $this->assertEquals($key, $value);
        }
    }
}
?>
