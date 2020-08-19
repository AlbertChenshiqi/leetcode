<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $arr = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];

        $leng = strlen($s);
        $data = [];
        if ($leng == 0) {
            return true;//判断是否为空
        }else if ($leng % 2 == 1) {
            return false;//判断是否为单数
        }else{
            for ($i = 0; $i< $leng; $i++) {
                if (!isset($arr[$s[$i]])) {
                    // 左括号押入栈
                    $data[] = $s[$i];
                }elseif ($arr[$s[$i]] === end($data)){
                    // 匹配到左括号是栈最顶层到 则弹出
                    array_pop($data);
                }elseif ($arr[$s[$i]] != end($data)) {
                    // 匹配到左括号不是栈最顶层 直接退出循环
                    return false;
                }
            }
        }

        if (empty($data)) {
            return true;//判断数组data是否有值
        }else{
            return false;//
        }
    }
}