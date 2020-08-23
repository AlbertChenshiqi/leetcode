<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        $res = '';

        if ($numRows == 1) {
            return $s;
        }

        $len = strlen($s);
        // 计算总共有多少列
        $numColumn = ceil($len / 2 / ($numRows - 1));
        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j < $numColumn; $j++){
                // 找出排列规则 "｜"列排列规则是第i列第j行 格式为 i + (n - 1) * 2 * j
                $res .= $s[$i + ($numRows - 1) * 2 * $j] ?? '';

                if ($i != 0 && $i != $numRows - 1) {
                    // 找出排列规则 "/\"列排列规则是第i列第j行 格式为 (n - 1) * 2 * (j + 1) - i

                    $res .= $s[($numRows - 1) * 2 * ($j + 1) - $i] ?? '';
                }
            }
        }

        return $res;
    }
}

$a = new Solution();
$b = $a->convert('LEETCODEISHIRING', 2 );
var_dump($b);

'LDREOEIIECIHNTSG';