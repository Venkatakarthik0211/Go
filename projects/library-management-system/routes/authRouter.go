package routes

import (
	controller "github.com/Venkatakarthik0211/library-management-backend/controllers"

	"github.com/gin-gonic/gin"
)

func AuthRoutes(incoming *gin.Engine) {
	incoming.POST("users/signup", controller.Signup())
	incoming.POST("users/login", controller.Login())
	incoming.GET("/books", controller.GetBooks())
	incoming.GET("/books/:id", controller.GetBookByID())
	incoming.PUT("/books/:id", controller.UpdateBook())
	incoming.DELETE("/books/:id", controller.DeleteBook())

}
