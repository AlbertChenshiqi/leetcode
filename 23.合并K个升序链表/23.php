<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}


class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        // 时间复杂度， O(kN)
        // 空间复杂度 O(1)
        $n = count($lists);
        // 不好理解，画图看
        $interval = 1;
        while ($interval < $n) {
            for ($i = 0; $i < $n; $i += $interval * 2) {
                if (isset($lists[$i + $interval])) {
                    $lists[$i] = $this->mergeTwoNode($lists[$i], $lists[$i + $interval]);
                }
            }
            $interval *= 2;
        }

        return $lists[0];
    }

    function mergeTwoNode($list1, $list2) {
        $res = $new_list = new ListNode(0);
        while ($list1 !== null && $list2 !== null) {
            if ($list1->val > $list2->val) {
                $new_list->next = new ListNode($list2->val);
                $list2 = $list2->next;
            } else {
                $new_list->next = new ListNode($list1->val);
                $list1 = $list1->next;
            }
            $new_list = $new_list->next;
        }

        if ($list1 !== null) {
            $new_list->next = $list1;
        } else {
            $new_list->next = $list2;
        }

        return $res->next;
    }
}