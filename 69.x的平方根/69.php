<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        $left = 1;
        $right = $x;

        if ($x == 0 || $x == 1) {
            return $x;
        }

        while ($left < $right) {
            $med = floor(($left + $right) / 2);
            if ($x > $med * $med) {
                if ($left == $med) {
                    break;
                }
                $left = $med;
            } elseif($x < $med * $med) {
                $right = $med;
            } else {
                return $med;
            }
        }

        return $left;

    }
}