<?php

include '../classes/Day4/AlwaysWin.php';
include '../classes/Day4/NeverWin.php';
include '../classes/Day4/ClassicMontyProblem.php';

class Day4Test extends PHPUnit_Framework_TestCase {

    private $arrGames;

    const ITERATIONS = 50000;
    
    public function setUp()
    {
    }
    
    public function tearDown()
    {
        for ($i = 0; $i < $this::ITERATIONS; ++$i)
            unset($this->arrGames[$i]);
    }

    public function provider() {
        return [
            ['AlwaysWin', 1, 1],
            ['NeverWin', 0, 0],
            ['ClassicMontyProblem', 0.66, 0.33, 0.05]
        ];
    }

    public function runIterationsWithSwitch() {
        foreach ($this->arrGames as $game) {
            $game->switch = true;
            $results[] = $game->runGame();
        }

        $wins = array_filter($results);
        return (count($wins) / $this::ITERATIONS);
    }

    public function runIterationsWithoutSwitch() {
        foreach ($this->arrGames as $game) {
            $game->switch = false;
            $results[] = $game->runGame();
        }

        $wins = array_filter($results);
        return (count($wins) / $this::ITERATIONS);
    }

    /**
     * @dataProvider provider
     * @
     */
    public function testMontyHallProblem($className, $expectedSwitchRatio, $expectedStickRatio, $delta = 0) {
        $this->markTestSkipped();
        for ($i = 0; $i < $this::ITERATIONS; ++$i)
            $this->arrGames[$i] = new $className();
        
        $this->assertEquals($expectedSwitchRatio, $this->runIterationsWithSwitch(), null, $delta);
        $this->assertEquals($expectedStickRatio, $this->runIterationsWithoutSwitch(), null, $delta);
    }

}

?>
