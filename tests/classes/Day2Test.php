<?php
include '..\classes\Day2.php';
class Day2Test extends PHPUnit_Framework_TestCase {

    /**
     * @var Day2
     */
    protected $object;

    public function provider() {
        return [
            [-43112603, 'minus forty three million, one hundred and twelve thousand, six hundred and three'],
            [-512607, 'minus five hundred and twelve thousand, six hundred and seven'],
            [-12609, 'minus twelve thousand, six hundred and nine'],
            [-1501, 'minus one thousand, five hundred and one'],
            [-310, 'minus three hundred and ten'],
            [-300, 'minus three hundred'],
            [-99, 'minus ninety nine'],
            [-17, 'minus seventeen'],
            [-10, 'minus ten'],
            [-1, 'minus one'],
            [0, 'zero'],
            [10, 'ten'],
            [17, 'seventeen'],
            [99, 'ninety nine'],
            [300, 'three hundred'],
            [310, 'three hundred and ten'],
            [1501, 'one thousand, five hundred and one'],
            [12609, 'twelve thousand, six hundred and nine'],
            [512607, 'five hundred and twelve thousand, six hundred and seven'],
            [43112603, 'forty three million, one hundred and twelve thousand, six hundred and three']
        ];
    }

    protected function setUp()
    {
        $this->object = new day2();
    }

    /**
     * @covers Day2::spellNumber
     * @dataProvider provider
     */
    public function testSpellingNumbers($input, $expected)
    {
        $this->assertEquals($expected, $this->object->spellNumber($input));
    }
}

?>
