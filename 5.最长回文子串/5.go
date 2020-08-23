package main

func longestPalindrome(s string) string {
	str_len := len(s)

	if str_len <= 1 {
		return s;
	}

	var start int
	var offset int

	for i := 0; i < str_len; i++  {
		len1 := centerExpand(s, str_len, i, i)
		len2 := centerExpand(s, str_len, i, i+1)

		if len1 > len2 && len1 > offset {
			start = i - (len1 - 1) / 2
			offset = len1
		}

		if len1 <= len2 && len2 > offset {
			start = i - len2/2 + 1
			offset = len2
		}
	}

	return s[start:start+offset]
}

func centerExpand(s string, str_len int, left int, right int) int  {
	for left >= 0 && right < str_len && s[left] == s[right] {
		right++
		left--
	}

	return right - left - 1
}