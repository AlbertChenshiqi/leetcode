<?php
class MyStack {
    private $data;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->data = new SplQueue();
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->data->push($x);
        return null;
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop() {
        if ($this->data->isEmpty()) {
            return false;
        } else {
            $x = $this->data->pop();
            return $x;
        }
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top() {
        return $this->data->top();
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty() {
        return $this->data->isEmpty();
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */