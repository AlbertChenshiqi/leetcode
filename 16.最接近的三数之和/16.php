<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $count = count($nums);
        $min = PHP_INT_MAX;
        foreach ($nums as $k=>$v) {
            if ($k == 0) {
                $min = $v + $nums[$k+1] + $nums[$k+2];
            }

            if ($k > $count - 3) {
                return $min;
            }

            $l = $k + 1;
            $r = $count - 1;

            while ($l < $r) {
                $temp = $v + $nums[$l] + $nums[$r];
                $temp_diff = $temp - $target;
                $min_diff = $min - $target;

                if (abs($temp_diff) < abs($min_diff)) {
                    $min = $temp;
                }
                if ($temp > $target) {
                    $r--;
                } elseif ($temp < $target) {
                    $l++;
                } else {
                    return $target;
                }
            }
        }

        return $min;
    }
}

$a = new Solution();
$b = $a->threeSumClosest([-100,-98,-2,-1], -101);
var_dump($b);