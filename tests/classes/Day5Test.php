<?php

include_once '../../classes/Day5/FizzBuzz.php';

class Day5Test extends PHPUnit_Framework_TestCase {

    private $object;
    
    const RANGE = 100;

    public function setUp() {
        $this->object = new FizzBuzz();
    }

    public function testFizz() {
        $value = current($object);
        
        for ($key = 0; $key < $this::RANGE; ++$key) {
            if ($key % 3 == 0)
                $this->assertRegExp('/fizz/i', $value);
            
            $value = next($object);
        }
    }

    public function testBuzz() {
        $value = current($object);
        
        for ($key = 0; $key < $this::RANGE; ++$key) {
            if ($key % 5 == 0)
                $this->assertRegExp('/buzz/i', $value);
            
            $value = next($object);
        }
    }

}
?>
