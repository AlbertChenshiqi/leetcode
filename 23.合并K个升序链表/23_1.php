<?php
///**
// * Definition for a singly-linked list.
// * class ListNode {
// *     public $val = 0;
// *     public $next = null;
// *     function __construct($val = 0, $next = null) {
// *         $this->val = $val;
// *         $this->next = $next;
// *     }
// * }
// */
//class Solution {
//
//    /**
//     * @param ListNode[] $lists
//     * @return ListNode
//     */
//    function mergeKLists($lists) {
//        // 1. 暴力解法
//        // 时间复杂度， O(nlogn)
//        // 空间复杂度 O(n)
//        $n = count($lists);
//        $arr = [];
//        for ($i = 0; $i < $n; ++$i) {
//            $list = $lists[$i];
//            while ($list !== null) {
//                $arr[] = $list->val;
//                $list = $list->next;
//            }
//        }
//
//        $dummyHead = new ListNode(0);
//        $cur = $dummyHead;
//        sort($arr);
//        foreach ($arr as $v) {
//            $cur->next = new ListNode($v);
//            $cur = $cur->next;
//        }
//
//        return $dummyHead->next;
//    }
//}