package main

import { 
	"fmt"
} 

func main() {
	var Name = "Go Cart"         //Variables
	const Numberofitems = 50     //Constants
	var Stockavailable uint = 50 // Variable with type
	var userName string
	var userAge int
	var userAddress string
	var numberofitemspurchased uint
	fmt.Printf("Welcome to %v app\n", Name)
	fmt.Println("Number of items Available:", Numberofitems)
	fmt.Println("Each item stock is:", Stockavailable)
	fmt.Println("Enter user details")
	fmt.Println("Enter your name")
	fmt.Scan(&userName)
	fmt.Println("Enter your age")
	fmt.Scan(&userAge)
	fmt.Println("Enter your address")
	fmt.Scan(&userAddress)
	fmt.Scan()
	fmt.Println("Enter number of items purchased")
	fmt.Scan(&numberofitemspurchased)
	Stockavailable = Numberofitems - numberofitemspurchased
	fmt.Println("User Details")
	fmt.Println("Name:", userName)
	fmt.Println("Age:", userAge)
	fmt.Println("Address:", userAddress)
	fmt.Println("Number of items purchased:", Stockavailable)
}
