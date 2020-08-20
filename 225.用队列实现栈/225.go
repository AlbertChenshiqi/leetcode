package main

type Node struct {
	Next *Node
	Val int
}

type MyStack struct {
	top *Node
}


/** Initialize your data structure here. */
func Constructor() MyStack {
	return MyStack{}
}


/** Push element x onto stack. */
func (this *MyStack) Push(x int)  {
	node := &Node{Next: this.top, Val: x}
	this.top = node
}


/** Removes the element on top of the stack and returns that element. */
func (this *MyStack) Pop() int {
	if this.top == nil {return -1}
	r := this.top.Val
	this.top.Next, this.top = nil, this.top.Next // 这里注意把pop的节点的Next置为nil，防止内存泄露
	return r
}


/** Get the top element. */
func (this *MyStack) Top() int {
	return this.top.Val
}


/** Returns whether the stack is empty. */
func (this *MyStack) Empty() bool {
	return this.top == nil
}


/**
 * Your MyStack object will be instantiated and called as such:
 * obj := Constructor();
 * obj.Push(x);
 * param_2 := obj.Pop();
 * param_3 := obj.Top();
 * param_4 := obj.Empty();
 */