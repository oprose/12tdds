<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FizzBuzz
 *
 * @author Oliver
 */
namespace Day5;
class FizzBuzz implements \Iterator {
    private $entries;
    
    public function __construct($max) {
        $this->entries = [];
        
        for ($i = 1; $i <= $max; ++$i)
        {
            if ($i % 5 != 0 && $i % 3 != 0)
               $this->entries[$i] = $i;
            else
            {
                $val = '';
                
                if ($i % 3 == 0)
                    $val .= 'Fizz';
                
                if ($i % 5 == 0)
                    $val .= 'Buzz';
                
                $this->entries[$i] = $val;
            }
        }
    }

    public function current() {
        return current($this->entries);
    }

    public function key() {
        return key($this->entries);
    }

    public function next() {
        return next($this->entries);
    }

    public function rewind() {
        reset($this->entries);
    }

    public function valid() {
        return ($this->key() !== null && $this->key() !== false);
    }
}

?>
