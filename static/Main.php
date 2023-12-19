<!DOCTYPE html>
<html lang="en">
<head>
  
    <link rel="stylesheet" href="skin.css">
    <script src="validator.js"></script>
    <title>order</title>
</head>

<body>

    
<div class="header">
    <nav class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact us</a></li>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search this website">
            </div>
        </ul>
    </nav>
</div>

<div class="catalogue">
    <h2 style="text-align: center;">CATALOGUE</h2> 
<table>
    <tr> <h2 style="text-align: center;"> ARABIC </h2> </tr>
        <tr><th>knafeh</th> <th>baklava</th> <th>falafel</th> </tr>
       <tr> <td><div class="container"><img src="knafeh.jpg">  <div class="overlay">
        <div class="text">Knafeh - ₹500  </div>
      </div>
    </div>
    </td>
        <td ><div class="container"><img src="baklava.jpg" > <div class="overlay"> <div class="text">Baklava - ₹450</div>
        </div>
      </div></td> <td> <div class="container"><img src="falafel.jpg">  <div class="overlay"><div class="text">Falafel - ₹350</div>
      </div>
    </div></td> </tr>
       <tr> <td><div class="container"><img src="sushi.jpg"> <div class="overlay">  <div class="overlay">
        <div class="text">Sushi - ₹800</div>
      </div>
    </div></td> <td><div class="container"><img src="ramen.jpg"> <div class="overlay"><div class="text">Ramen - ₹1000</div>
    </div>
  </div></td> <td> <div class="container"><img src="Tiramisu.jpg"> <div class="overlay"> <div class="text">Tiramisu - ₹1450</div>
  </div>
</div></td> </tr>
    

</table>
</div>

<div class="menu"></div>
<div class="order">
    <form name="order" onsubmit="return validateForm()" action="1s.php" method="post">
    <div class="form-group">
            <label for="name">First Name: </label>
            <input type="text" name="fname" id="fname" placeholder="Enter your First name">
            <div class="error" id="ferror"></div>
        </div>
        <div class="form-group">
            <label for="name">Last Name: </label>
            <input type="text" name="lname" id="lname" placeholder="Enter your Last name">
            <div class="error" id="lerror"> </div>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <div class="error" id="emailerror"></div>
        </div>
        <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="phone" name="pno" id="pno" placeholder="Enter your phone">
            <div class="error" id="pherror"> </div>
        </div>
        <div class="form-group">
            <label for="message">Address: </label>
            <textarea name="address" id="address" cols="30" rows="10"></textarea>
            <div class="error" id="adderror"> </div>
        </div>
        <div class="form-group">
            <select name="fooditem" id="fooditem">
                <option value="" disabled selected hidden>Choice </option>
                <option> 1</option>
                <option> 2 </option>
                <option> 3 </option>
                <option> 4 </option>
                <option> 5 </option>
                <option> 6 </option> 
            </select>
            
            <select name="quantity" id="quantity">
                <option value="" disabled selected hidden>Quantity</option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9 </option>
               
            </select>
        </div>
        <div class="error" id="error"></div>

        <input type="submit" value="Proceed to payment page" name="submit"> 
    
</form>
</div>
</body>
</html>

