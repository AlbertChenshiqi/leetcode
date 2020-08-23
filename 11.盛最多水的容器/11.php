<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $length = count($height);
        $s = 0;
        for ($i = 0, $j = $length - 1; $i < $j; true) {
            $temp_s = ($j - $i) * min($height[$i], $height[$j]);

            if ($temp_s > $s) {
                $s = $temp_s;
            }

            $height[$i] > $height[$j] ? $j-- : $i++;
        }

        return $s;
    }
}