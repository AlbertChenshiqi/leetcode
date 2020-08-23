<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $len1 = count($nums1);
        $len2 = count($nums2);

        if ($len1 == 1 && $len2 == 1) {
            return sprintf("%.1f",($nums1[0] + $nums2[0]) / 2);
        }

        $total_len = $len1 + $len2;
        if ($total_len % 2 == 0) {
            $med = $total_len / 2;
            $is_even = 1;
        } else {
            $med = ($total_len - 1) /2;
            $is_even = 0;
        }

        $res = $this->del($nums1, $nums2, $med, $is_even);

        return sprintf("%.1f",$res);
    }

    function del($nums1, $nums2, $med, $is_even) {
        if ($med == 1) {
            $del_len = 1;
        }elseif ($med % 2 == 0) {
            $del_len = $med / 2;
        } else {
            $del_len = ($med-1) / 2;
        }

        $len1 = count($nums1);
        $len2 = count($nums2);

        if ($del_len > $len1 || $del_len > $len2) {
            $del_len = min($len1, $len2);
        }

        if ($del_len == 0 ) {
            if (empty($nums1)) {
                $new_arr = $nums2;
            } elseif (empty($nums2)) {
                $new_arr = $nums1;
            }
            if ($is_even == 1) {
                return ($new_arr[$med - $del_len - 1] + $new_arr[$med - $del_len]) / 2;
            } else {
                return $new_arr[$med - $del_len];
            }
        }

        if ($nums1[$del_len - 1] >= $nums2[$del_len - 1]) {
            $nums2 = array_slice($nums2, $del_len, $len2);
        } else {
            $nums1 = array_slice($nums1, $del_len, $len1);
        }

        if (!empty($nums1) && !empty($nums2)) {
            if ($is_even == 0 && $med == 1) {
                return min($nums1[0], $nums2[0]);
            } elseif ($is_even == 1 && $med == 2) {
                $new_arr = [$nums1[0], $nums2[0]];
                if (isset($nums1[1])) {
                    $new_arr[] = $nums1[1];
                }
                if (isset($nums2[1])) {
                    $new_arr[] = $nums2[1];
                }
                sort($new_arr);
                return ($new_arr[0] + $new_arr[1]) / 2;
            }
        }

        return $this->del($nums1, $nums2, $med - $del_len, $is_even);
    }
}

$a = new Solution();
$b = $a->findMedianSortedArrays([], [1]);
var_dump($b);