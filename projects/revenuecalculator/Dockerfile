FROM golang:latest

WORKDIR /Ordering_site

COPY go.mod go.sum ./

RUN go mod download

COPY . .

RUN CGO_ENABLED=0 GOOS=linux go build -o Ordering_site

EXPOSE 8080 8081 8082

# default service
CMD ["./Ordering_site"]

# Start additional servers for /test and /task sessions on ports 8081 and 8082
CMD ["./Ordering_site", "-port", "8081"]  # for /test
CMD ["./Ordering_site", "-port", "8082"]  # for /task
