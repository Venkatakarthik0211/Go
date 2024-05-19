<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1 align="center">Welcome to the Awesome Web App! 🚀</h1>

<p align="center">
    <img src="https://cdn-icons-png.freepik.com/512/9226/9226554.png" alt="Awesome Web App Logo" width="200">
</p>

<p align="center">
    <b>Explore, Visualize, and Supercharge Your Data! 📊✨</b>
</p>

## 📂 Project Structure

- 📁 **data**: Contains essential data file
    - 📄 `data.csv`: Your magical data source!
- 📁 **displaycsv**: Home of the HTML goodness
    - 📄 `index.html`: The heart of the display magic
- 📄 `go.mod`: Go modules for managing dependencies
- 📄 `go.sum`: Secure go dependencies checksum file
- 📄 `main.go`: The epicenter of all things awesome!

## 🚀 Getting Started

To run this awesome web application locally, follow these steps:

### Prerequisites

1. **Go Programming Language:**
   - Ensure that Go is installed on your machine. You can download it from the official website: [Go Downloads](https://golang.org/dl/).

2. **Required Packages:**
   - Install the required external packages using the following command in your terminal:
     ```bash
     go get github.com/GeertJohan/go.rice
     ```

3. **CSV File:**
   - The code assumes the presence of a CSV file named `data.csv` inside the `data` directory. Make sure you have a CSV file with the required structure.

4. **Static Files for Display:**
   - The code uses the `go.rice` package to embed static files (`index.html`, etc.) for serving through HTTP. Generate the rice-box for these static files with the following commands:
     ```bash
     go get github.com/GeertJohan/go.rice/rice
     rice embed-go
     ```

5. **Web Server Port:**
   - The code attempts to start an default HTTP server on port `8080`. Ensure that this port is available, and no other process is using it.
   - To access different service /task and /test. Replace the port with `8081` and `8082`

### Running the Application as docker

1. **Install Docker :**
    ```bash
    # Update and install Docker
    sudo apt-get update
    sudo apt-get install ca-certificates curl gnupg
    sudo install -m 0755 -d /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
        sudo chmod a+r /etc/apt/keyrings/docker.gpg
                echo \
        "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
        "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
        sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
    sudo apt-get install docker docker.io make openssl openssh-server python3 -y
    sudo systemctl enable docker
    sudo systemctl start docker
    ```
2. **Use docker run command :**
    ```bash
    sudo docker run -p 8080:8080 sacredspirits47/revenuecalculator:latest
    ```
### Running the Application via Cloning

1. **Clone the repository and install go:**
    ```bash
    # Install Go and set PATH
    wget https://go.dev/dl/go1.20.5.linux-amd64.tar.gz
    sudo rm -rf /usr/local/go 
    sudo tar -C /usr/local -xzf go1.20.5.linux-amd64.tar.gz
    export PATH=$PATH:/usr/local/go/bin
    go version
    
    #Clone the repository 
    https://github.com/Venkatakarthik0211/revenuecalculator.git
    cd revenuecalculator
    ```
2. **Run the Web App:**
    ```bash
    go run main.go
    ```

3. **Open Your Browser:**
    - Visit [http://localhost:8080](http://localhost:8080) - Default Service
    - Visit [http://localhost:8081](http://localhost:8081) - /test Service
    - Visit [http://localhost:8082](http://localhost:8082) - /task Service
    - Marvel at the awesomeness! 🌈

4. **Results:**
    - Visit [http://localhost:8080/customer.txt](http://localhost:8080/customer.txt) - Display Customer Revenue Based on customer ID
    - Visit [http://localhost:8080/monthly.txt](http://localhost:8080/customer.txt) - Display MOnthly Revenue Based on Month
    - Visit [http://localhost:8080/output.txt](http://localhost:8080/output.txt) - Display Total Revenue

## 🧰 Prerequisites

- Go installed on your machine
- A dash of curiosity and a sprinkle of excitement! 🎉

## 🤝 Contributing

Pull requests are welcome! Contribute to make this app even more awesome! 🌟
---

**Feel free to star ⭐ this repository if you find it helpful!** 🌟

Happy coding! 🚀

</body>
</html>
