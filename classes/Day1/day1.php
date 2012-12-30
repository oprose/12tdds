<?php
class Day1 {
 
    public function getCollectionMinimum(array $collection)
    {
        if (count($collection) === 0)
        {
            throw new InvalidArgumentException('Cannot give the smallest value in an empty set');
        }
        
        $min = array_shift($collection);
        while (count($collection) > 0)
        {
            $val = array_shift($collection);
            if ($val < $min)
                $min = $val;
        }
        
        return $min;
    }
    
    public function getCollectionMaximum(array $collection)
    {
        if (count($collection) === 0)
        {
            throw new InvalidArgumentException('Cannot give the largest value in an empty set');
        }
        
        $max = array_shift($collection);
        while (count($collection) > 0)
        {
            $val = array_shift($collection);
            if ($val > $max)
                $max = $val;
        }
        
        return $max;
        
    }
    
    public function getCollectionCount(array $collection)
    {
        return count($collection);
    }
    
    public function getCollectionMeanAverage(array $collection)
    {
        if (count($collection) === 0)
        {
            throw new InvalidArgumentException('Cannot give the mean average of an empty set');
        }
        
        return array_sum($collection) / count($collection);
    }
}