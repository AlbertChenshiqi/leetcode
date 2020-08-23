package main

func maxArea(height []int) int {
	length := len(height)

	var s int
	var i int

	for j:=length-1; i < j ; {
		temp_s := (j - i) * min(height[i], height[j])

		if (temp_s > s) {
			s = temp_s
		}

		if height[i] > height[j] {
			j--
		} else {
			i++
		}
	}

	return s
}

func min(a, b int) int {
	if b < a {
		return b
	}
	return a
}