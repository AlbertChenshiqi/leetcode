<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $str_len = strlen($s);
        if ($str_len <= 1) return $s;

        $start  = 0;  //开始截取位
        $offset = 0;  //长度

        for ($i = 0; $i < $str_len; $i ++) {
            $len1 = $this->centerExpand($s, $str_len, $i, $i);
            $len2 = $this->centerExpand($s, $str_len, $i, $i + 1);

            if ($len1 > $len2 && $len1 > $offset) {
                // 开始位置 = 当前坐标-回文长度的一半位置
                $start = $i - ($len1 - 1)/2;
                $offset = $len1;
            }

            if ($len1 <= $len2 && $len2 > $offset) {
                // 开始位置 = 回文长度的一半位置
                $start = $i - $len2/2 + 1;
                $offset = $len2;
            }
        }
        return substr($s, $start, $offset);
    }

    // 中心扩散
    function centerExpand($str, $len, $left, $right)
    {
        while ( $left >= 0 && $right < $len && $str[$left] == $str[$right] ) {
            $right ++;
            $left --;
        }
        return $right - $left - 1;
    }
}