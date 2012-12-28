<?php

class day2 {

    private $LOOKUP = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eightteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
    ];

    public function spellNumber($number) {
        $response = '';

        if ($number < 0) {
            $response .= 'minus ';
            $number = abs($number);
        }

        if ($number >= 1000000) {
            $t = intval($number / 1000000);
            $response .= $this->spellNumber($t) . ' million, ';

            $number = $number % 1000000;
        }

        if ($number >= 1000) {
            $t = intval($number / 1000);
            $response .= $this->spellNumber($t) . ' thousand, ';

            $number = $number % 1000;
        }

        if ($number >= 100) {
            $t = intval($number / 100);
            $response .= $this->spellNumber($t) . ' hundred and ';

            $number = $number % 100;
        }

        if ($number < 100 && $number > 0) {
            if (array_key_exists($number, $this->LOOKUP)) {
                $response .= $this->LOOKUP[$number];
            } else {
                $tens = 10 * intval($number / 10);
                $units = $number % 10;

                $response .= $this->LOOKUP[$tens] . ' ' . $this->LOOKUP[$units];
            }
        }

        if ($number == 0 && $response == '') {
            $response = 'zero';
        }

        if (substr_compare($response, ' and ', -5) == 0) {
            $response = substr($response, 0, -5);
        }

        if (substr_compare($response, ', ', -2) == 0) {
            $response = substr($response, 0, -2);
        }

        return trim($response);
    }

}

?>