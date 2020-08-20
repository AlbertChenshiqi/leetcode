<?php
class MinStack {
    private $data;
    private $min;
    /**
     * initialize your data structure here.
     */
    function __construct() {
        $this->data = new SplStack();
        $this->min = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->data->push($x);
        if ($this->min->isEmpty() || $this->min->top() >= $x) {
            $this->min->push($x);
        }
        return null;
    }

    /**
     * @return NULL
     */
    function pop() {
        if ($this->data->isEmpty()) {
            return false;
        } else {
            $x = $this->data->pop();
            if (!$this->min->isEmpty() && $x == $this->min->top()) {
                $this->min->pop();
            }
            return null;
        }
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->data->top();
    }

    /**
     * @return Integer
     */
    function getMin() {
        return $this->min->top();
    }
}