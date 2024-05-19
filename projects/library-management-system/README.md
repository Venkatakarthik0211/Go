# Library-Management-Using-Go

<h2>Database Schema</h2>
<img src="https://github.com/Venkatakarthik0211/library-management-backend/blob/main/Database-schema.png" alt="Database-schema" style="border: 2px solid #000;">



**_What's Required?_**
_Install Go & MongoDB_
```sh
wget https://go.dev/dl/go1.20.5.linux-amd64.tar.gz
sudo rm -rf /usr/local/go 
sudo tar -C /usr/local -xzf go1.20.5.linux-amd64.tar.gz
export PATH=$PATH:/usr/local/go/bin
go version   
```
Get required Go Packages
```sh
go get go.mongodb.org/mongo-driver/
go get github.com/Venkatakarthik0211/library-management-backend/
go get go.mongodb.org/mongo-driver/bson/ #For MongoDB-drivers
go get github.com/gin-gonic/gin
go get github.com/dgrijalva/jwt-go #For JWT Authentication
go get github.com/joho/godotenv
```
Create a .env file for configurations
```sh 
PORT=9000
MONGODB_URL=mongodb://localhost:27017/go-auth
```


