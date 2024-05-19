package middleware

import (
	"fmt"
	"net/http"

	helper "github.com/Venkatakarthik0211/library-management-backend/helpers"
	"github.com/gin-gonic/gin"
)

func Authenticate() gin.HandlerFunc {
	return func(c *gin.Context) {
		clientToken := c.Request.Header.Get("Authorization")
		if clientToken == "" {
			fmt.Println("Token not found")
			c.JSON(http.StatusInternalServerError, gin.H{"error": "Token not found"})
			c.Abort()
			return
		}
		helper.ValidateToken(clientToken)
		claim, err := helper.ValidateToken(clientToken)
		if err != "" {
			c.JSON(http.StatusInternalServerError, gin.H{"error": "Token not found"})
			c.Abort()
			return
		}
		c.Set("email", claim.Email)
		c.Set("first_name", claim.First_name)
		c.Set("last_name", claim.Last_name)
		c.Set("uid", claim.Uid)
		c.Set("user_type", claim.User_type)
		c.Next()
	}
}
