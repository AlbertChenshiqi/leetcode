package main

type MinStack struct {
	data []int
	min []int
}


/** initialize your data structure here. */
func Constructor() MinStack {
	return MinStack{data: []int{}, min: []int{}}
}


func (this *MinStack) Push(x int)  {
	this.data = append(this.data, x)
	if len(this.min) == 0 || this.min[len(this.min) - 1] >= x {
		this.min = append(this.min, x)
	}
}


func (this *MinStack) Pop()  {
	if len(this.data) != 0 {
		x := this.data[len(this.data) - 1]
		this.data = this.data[:len(this.data) - 1]
		if len(this.min) != 0 && this.min[len(this.min) -1 ] == x {
			this.min = this.min[:len(this.min) -1]
		}
	}
}


func (this *MinStack) Top() int {
	return this.data[len(this.data) - 1]
}


func (this *MinStack) GetMin() int {
	return this.min[len(this.min) - 1]
}


/**
 * Your MinStack object will be instantiated and called as such:
 * obj := Constructor();
 * obj.Push(x);
 * obj.Pop();
 * param_3 := obj.Top();
 * param_4 := obj.GetMin();
 */