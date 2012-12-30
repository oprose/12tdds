<?php
class FizzBuzz implements Iterator{
    private $index;
    
    public function __construct() {
        $this->index = 0;
    }

    public function current() {
        
        if ($this->index % 3 != 0 && $this->index % 5 != 0)
            return $this->index;
        else
        {
            $retval = '';
            
            if ($this->index % 3 == 0)
                $retval .= 'Fizz';
            
            if ($this->index % 5 == 0)
                $retval .= 'Buzz';
            
            return $retval;
        }
    }

    public function key() {
        return $this->index;
    }

    public function next() {
        $this->index++;
        return $this->current;
    }

    public function rewind() {
        $this->index = 0;
    }

    public function valid() {
        return true;
    }
}

?>
