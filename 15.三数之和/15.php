<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $count = count($nums);
        if ( $count <= 2) {
            return [];
        }

        sort($nums);

        $res = [];
        foreach ($nums as $k => $v) {
            if ($v > 0) {
                break;
            }

            if ($k > 0 && $v == $nums[$k - 1]) {
                continue;
            }

            $l = $k + 1;
            $r = $count - 1;

            while ($l < $r) {
                $sum = $v + $nums[$l] +$nums[$r];

                if ($sum > 0) {
                    $r--;
                } elseif ($sum < 0) {
                    $l++;
                } else {
                    array_push($res, [$v, $nums[$l], $nums[$r]]);

                    while ($l < $r && $nums[$l] === $nums[++$l]);
                    while ($l < $r && $nums[$r] === $nums[--$r]);
                }
            }
        }

        return $res;
    }
}

$a = new Solution();
$b = $a->threeSum([-1, 0, 1, 2, -1, -4]);
echo "<pre>";
var_dump($b);