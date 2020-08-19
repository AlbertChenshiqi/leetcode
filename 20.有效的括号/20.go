package main

func isValid(s string) bool {
	arr := map[byte]byte{'}':'{', ']':'[', ')': '('}

	data := make([]byte, 0)

	length := len(s)
	if length == 0 {
		return true
	} else if length % 2 != 0 {
		return false
	} else {
		for i:= 0; i < length; i++ {
			if _, ok := arr[s[i]]; !ok {
				// 左括号押入栈
				data = append(data, s[i])
			} else if len(data)>0 && arr[s[i]] == data[len(data) - 1] {
				// 匹配到左括号是栈最顶层到 则弹出
				data = data[:len(data) - 1]
			} else {
				// 匹配到左括号不是栈最顶层 直接退出循环
				return false;
			}
		}
	}

	if (len(data) == 0) {
		return true
	} else {
		return false
	}
}