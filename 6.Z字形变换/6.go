package main

import (
	"fmt"
	"math"
)

func convert(s string, numRows int) string {
	if numRows <= 1 {
		return s
	}

	length := len(s)

	var res string
	numColumn := int(math.Ceil(float64(length) / 2 / float64(numRows - 1)))

	for i := 0; i < numRows ; i++ {
		for j := 0; j < numColumn ; j++ {
			if i + (numRows - 1) * 2 * j < length {
				res += string(s[i + (numRows - 1) * 2 * j])
			}

			if i != 0 && i != numRows - 1 && ((numRows - 1) * 2 * (j + 1) - i) < length {
				res += string(s[(numRows - 1) * 2 * (j + 1) - i])
			}
		}
	}

	return res
}

func main()  {
	a := convert("PAYPALISHIRING", 3)
	fmt.Println(a)
}