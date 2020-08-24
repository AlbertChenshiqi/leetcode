<?php
// 题目变形
// 给定一个非负数和保留精度 返回非负数的平方根


class Solution {

    /**
     * @param float $x
     * @param Integer $dig
     * @return Integer
     */
    function mySqrt($x, $dig) {
        if ($x == 1 || $x == 0) {
            return $x;
        }

        if ($x > 1) {
            $left = $this->getFirst($x);
        } else {
            $left = 0;
        }
        $n = 1;
        for ($i = 0; $i <= $dig; $i++) {
            while ($x >= $left * $left) {
                $left = $left + $n;
            }
            $left -= $n;
            $n = $n / 10;
        }

        return $left;
    }

    function getFirst($a) {
        $left = 1;
        $right = $a;

        while ($left < $right) {
            $med = floor(($left + $right) / 2);
            if ($a > $med * $med) {
                if ($left == $med) {
                    break;
                }
                $left = $med;
            } elseif($a < $med * $med) {
                $right = $med;
            } else {
                return $med;
            }
        }

        return $left;
    }
}

$a = new Solution();
$b = $a->mySqrt(0.1, 3);

var_dump($b);







