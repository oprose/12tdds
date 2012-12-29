<?php
include_once 'MontyBaseProblem.php';

class ClassicMontyProblem extends MontyBaseProblem {
    public $switch;
    
    function __construct() {
        parent::__construct();
    }

    public function showDoor()
    {
        return true;
    }
    
    public function revealDoor()
    {
        $arrOptions = array_filter($this->arrangement, 'self::unprizedDoor');
        return array_rand($arrOptions);
    }
    
    public function allowSwitch()
    {
        return true;
    }
    
    public function unprizedDoor($var)
    {
        return $var === $this::GOAT;
    }

    public function willSwitch()
    {
        return $this->switch;
    }
}