<?php

abstract class MontyBaseProblem {
    const CARS = 1;
    const DOORS = 3;
    const DEMO = 1;
    
    const CAR = 'C';
    const GOAT = 'G';
    
    protected $arrangement;
    
    protected $round1Selection;
    protected $round2Selection;
    
    public function __construct()
    {
        for($i = 0; $i < $this::DOORS; ++$i)
            $this->arrangement[$i] = $this::GOAT;
        
        for($i = 0; $i < $this::CARS; ++$i)
            $this->arrangement[mt_rand(0, $this::DOORS)] = $this::CAR;
    }
    
    public function runGame()
    {
        $this->round1Selection = array_rand($this->arrangement);
        
        if ($this->showDoor())
        {
            $revealedDoor = $this->revealDoor();
        }
        
        $this->round2Selection = $this->round1Selection;
        if ($this->allowSwitch() && $this->willSwitch())
        {
            while ($this->round1Selection == $this->round2Selection || $this->round2Selection == $revealedDoor)
                $this->round2Selection = array_rand($this->arrangement);
        }
        
        return ($this->arrangement[$this->round2Selection] === $this::CAR);
    }
    
    public abstract function showDoor();
    public abstract function revealDoor();    
    public abstract function allowSwitch();
    public abstract function willSwitch();
    public abstract function unprizedDoor($var);
}

?>
