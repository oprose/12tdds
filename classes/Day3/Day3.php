<?php
class MinefieldHints
{
    private $vector;
    
    public function __construct($string)
    {
        $arr = explode("\n", $string);
        $dimensions = explode(" ", array_shift($arr));
        
        for ($i = 0; $i < $dimensions[0]; ++$i)
        {
            for ($j = 0; $j < $dimensions[1]; ++$j)
            {
                if ($arr[$i][$j] == '.')
                {
                    $this->vector[$i][$j] = '0';
                }
                else if ($arr[$i][$j] == '*')
                {
                    $this->vector[$i][$j] = '*';
                }
            }
        }
        
        for ($i = 0; $i < count($this->vector); ++$i)
        {
            for ($j = 0; $j < count($this->vector[$i]); ++$j)
            {
                if ($this->vector[$i][$j] == '*')
                {
                    $this->incrementAdjacents($i, $j);
                }
            }
        }        
    }
    
    private function incrementAdjacents($y, $x)
    {
        $adjacentX = [$x-1, $x, $x+1];
        $adjacentY = [$y-1, $y, $y+1];
                        
        if ($adjacentX[2] >= count($this->vector[0]))
        {
            array_pop($adjacentX);
        }
        
        if ($adjacentY[2] >= count($this->vector))
        {
            array_pop($adjacentY);
        }    
        
        if ($adjacentX[0] < 0)
        {
            array_shift($adjacentX);
        }
        
        if ($adjacentY[0] < 0)
        {
            array_shift($adjacentY);
        }    
        
        foreach ($adjacentY as $y)
            foreach ($adjacentX as $x)
                if (is_numeric($this->vector[$y][$x]))
                {
                    $this->vector[$y][$x]++;
                }
    }
    
    public function hints()
    {
        $response = '';
        foreach ($this->vector as $row){
            foreach ($row as $cell)
                $response .= $cell;
            $response .= "\n";
        }    
                
        return trim($response);
    }
}

class Day3 {
    public function getMinefieldHints($inputString)
    {
        $mf = new MinefieldHints($inputString);
        return $mf->hints();
    }
}

?>
