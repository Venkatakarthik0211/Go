package main

import (
	"bufio"
	"fmt"
	"log"
	"net/http"
	"os"
	"sort"
	"strconv"
	"strings"

	rice "github.com/GeertJohan/go.rice"
)

func calculateTotalRevenue(csvfile *os.File) (float64, map[string]float64, map[int]float64, error) {
	var totalRevenue float64
	monthlyRevenue := make(map[string]float64)
	customerRevenue := make(map[int]float64)

	// Parse the file
	scanner := bufio.NewScanner(csvfile)
	// Skip the header row
	if scanner.Scan() {
		for scanner.Scan() {
			record := strings.Split(scanner.Text(), ",")

			// Using fmt.Sscanf for parsing
			var quantity int
			var totalPrice float64
			var month string
			var customerID int

			_, err := fmt.Sscanf(record[4], "%d", &quantity)
			if err != nil {
				log.Printf("Error parsing quantity in line %s: %v", scanner.Text(), err)
				continue
			}

			_, err = fmt.Sscanf(record[6], "%f", &totalPrice)
			if err != nil {
				log.Printf("Error parsing total price in line %s: %v", scanner.Text(), err)
				continue
			}

			// Extracting month from record[7]
			month = record[7]

			// Extracting customer_id from record[1]
			customerID, err = strconv.Atoi(record[1])
			if err != nil {
				log.Printf("Error parsing customer_id in line %s: %v", scanner.Text(), err)
				continue
			}

			// Calculate revenue for each record
			revenue := float64(quantity) * totalPrice
			totalRevenue += revenue
			monthlyRevenue[month] += revenue
			customerRevenue[customerID] += revenue
		}
	}

	// Check for any scanner errors
	if err := scanner.Err(); err != nil {
		return 0, nil, nil, fmt.Errorf("Error reading CSV file: %v", err)
	}

	return totalRevenue, monthlyRevenue, customerRevenue, nil
}

func writeToOutputFile(filename string, content string) error {
	outputFile, err := os.Create(filename)
	if err != nil {
		return fmt.Errorf("Error creating output file: %v", err)
	}
	defer outputFile.Close()

	// Write content to the output file
	outputFile.WriteString(content)

	return nil
}

func main() {
	csvfile, err := os.Open("data/data.csv")
	if err != nil {
		log.Fatalln("Couldn't open the csv file", err)
	}

	// Calculate total, monthly, and customer revenue
	totalRevenue, monthlyRevenue, customerRevenue, err := calculateTotalRevenue(csvfile)
	if err != nil {
		log.Fatalf("Error calculating revenue: %v", err)
	}

	// Write total revenue to output.txt
	err = writeToOutputFile("displaycsv/output.txt", fmt.Sprintf("Total Revenue: %v\n", totalRevenue))
	if err != nil {
		log.Fatalf("Error writing to output file: %v", err)
	}

	// Create a sorted slice of months
	var months []string
	for month := range monthlyRevenue {
		months = append(months, month)
	}

	// Sort months based on their numeric values
	sort.Slice(months, func(i, j int) bool {
		monthI, _ := strconv.Atoi(months[i])
		monthJ, _ := strconv.Atoi(months[j])
		return monthI < monthJ
	})

	// Write monthly revenue to monthly.txt in order
	monthlyContent := "Monthly Revenue:\n"
	for _, month := range months {
		monthlyContent += fmt.Sprintf("%s: %v\n", month, monthlyRevenue[month])
	}
	err = writeToOutputFile("displaycsv/monthly.txt", monthlyContent)
	if err != nil {
		log.Fatalf("Error writing to monthly file: %v", err)
	}

	// Create a sorted slice of customer IDs
	var customerIDs []int
	for customerID := range customerRevenue {
		customerIDs = append(customerIDs, customerID)
	}

	// Sort customer IDs in ascending order
	sort.Ints(customerIDs)

	// Write customer-wise revenue to customer.txt
	customerContent := "Customer-wise Revenue:\n"
	for _, customerID := range customerIDs {
		customerContent += fmt.Sprintf("Customer %d: %v\n", customerID, customerRevenue[customerID])
	}
	err = writeToOutputFile("displaycsv/customer.txt", customerContent)
	if err != nil {
		log.Fatalf("Error writing to customer file: %v", err)
	}
	csvBox := rice.MustFindBox("displaycsv")

	// Create two ServeMux instances for /test and /task sessions
	testMux := http.NewServeMux()
	taskMux := http.NewServeMux()

	// Serve the static files for /test session
	testMux.Handle("/displaycsv/", http.StripPrefix("/displaycsv/", http.FileServer(csvBox.HTTPBox())))

	// Serve the static files for /task session
	taskMux.Handle("/displaycsv/", http.StripPrefix("/displaycsv/", http.FileServer(csvBox.HTTPBox())))

	// Start your HTTP servers for /test and /task sessions
	go func() {
		log.Fatal(http.ListenAndServe(":8081", testMux)) // Change the port for /test session
	}()

	go func() {
		log.Fatal(http.ListenAndServe(":8082", taskMux)) // Change the port for /task session
	}()

	// Start your default HTTP server
	log.Fatal(http.ListenAndServe(":8080", nil))
}
