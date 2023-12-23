package main

import "fmt"

func main() {
	//Lets create a user input of size 10 array
	var size int
	fmt.Println("Enter the size of the array")
	fmt.Scan(&size)
	//make is used to create a slice of size 10 for dynamic array
	arr := make([]int, size)
	fmt.Println("Enter the elements of the array")
	for i := 0; i < size; i++ {
		fmt.Scan(&arr[i])
	}
	fmt.Println("The elements of the array are")
	for i := 0; i < size; i++ {
		fmt.Println(arr[i])
	}
}
