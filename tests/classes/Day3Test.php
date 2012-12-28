<?php
include '../classes/Day3.php';
class Day3Test extends PHPUnit_Framework_TestCase {

    private $object;
    
    protected function setUp()
    {
        $this->object = new Day3();
    }
    
    public function provider()
    {
        return [
            ["3 4\n*...\n..*.\n....", "*211\n12*1\n0111"],
            ["3 4\n....\n....\n....", "0000\n0000\n0000"],
            ["3 4\n****\n****\n****", "****\n****\n****"],
            // Following generated by playing windows minesweeper
            ["9 9\n....*..*.\n*.....*..\n....**...\n.........\n.........\n........*\n*........\n.........\n......*.*","1101*22*1\n*10234*21\n1101**210\n000122100\n000000011\n11000001*\n*10000011\n110001121\n000001*2*"]
        ];
    }
    
    /**
     * @covers Day3::getMinefieldHints
     * @dataProvider provider
     */
    public function testMinefieldHints($input, $expected)
    {
        $this->assertEquals($expected, $this->object->getMinefieldHints($input));
    }
}

?>
