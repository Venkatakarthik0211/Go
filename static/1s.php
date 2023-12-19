<html>
<head>
<style>
table
{
border-style:solid;
border-width:4px;
width: 100%;
border-color: black;
text-align: center;
}
b{
    color: green;
}
i{
    color:red;
}
</style>

</head>
<body bgcolor="AFAFAF">
<?php
echo "Welcome to the stage where we are ready to get connected to a database <br>";
$servername = "localhost";
$username = "root";
$password = "Karthik@8185";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful";
}


if ($conn->query("Drop DATABASE dbm")) {
    printf(" <br> Database dbm dropped successfully.<br />");
 }

 echo (" <br> ");

$sql = "CREATE DATABASE dbm";
$result = mysqli_query($conn, $sql);
if($result){
    echo "The db was created successfully!<br>";
}
else{
    echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
}

$database ="dbm";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "CREATE TABLE `phptrip` 
( `sno` INT(3) NOT NULL AUTO_INCREMENT , 
`fname` VARCHAR(12) NOT NULL , 
`lname` VARCHAR(12) NOT NULL , 
`email` VARCHAR(50) NOT NULL ,
 `pno` VARCHAR(11) NOT NULL, 
 `address` VARCHAR(50) NOT NULL,
 `fooditem` VARCHAR(50) NOT NULL,
 `quantity` INT(2) NOT NULL, 
 `time1` VARCHAR(25) NOT NULL,
PRIMARY KEY (`sno`))";
$result = mysqli_query($conn, $sql);
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($conn);
}
$database = "dbm";
$conn = mysqli_connect($servername, $username, $password, $database);
 $choice = "0";
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    if(isset($_POST['submit']))
    {
     $choice = 1;
    }
}

 switch ($choice) 
 {
    case "1":
    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pno = $_POST["pno"]; 
    $address = $_POST["address"];
    $fooditem = $_POST["fooditem"];
    $quantity = $_POST["quantity"];   
    $date = new DateTime();
    $time1 = $date->format('YmdHisv');
    $conn = mysqli_connect($servername, $username, $password, $database);
    echo (" <br> ");
    $sql = "INSERT INTO `phptrip` (`fname`, `lname` , `email` , `pno` , `address` , `fooditem` , `quantity`, `time1`)
     VALUES
      ('$fname', '$lname' , '$email' , '$pno' , '$address','$fooditem','$quantity','$time1')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "The record has been inserted successfully successfully!<br>";
    }
    else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    }
echo "<br> <br>";
    $sql = "SELECT * FROM `phptrip`";
    $result = mysqli_query($conn, $sql);
    echo "<center> <h3> DISPLAYING INFORMATION </h3> </center>";
    $num = mysqli_num_rows($result);
    echo "<table border='1'>
<tr>
<th>sno</th>
<th>fname</th>
<th>lname</th>
<th>email</th>
<th>pno</th>
<th>address</th>
<th>fooditem</th>
<th>quantity</th>
<th>time</th>
</tr>";
    echo " <center> $num <b>records inserted into the DataBase </b> </center> <br>";
    if($num> 0){
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>". $row['sno'] . "</td>" .
                 "<td>". $row['fname'] ."</td>" .
                 "<td>". $row['lname'] . "</td>" .
                 "<td>". $row['email'] . "</td>" .
                 "<td>". $row['pno'] . "</td>" .
                 "<td>". $row['address'] . "</td>" .
                 "<td>". $row['fooditem'] . "</td>" .
                 "<td>". $row['quantity'] ."</td>" . 
                 "<td>". $row['time1'] . "</td>" 
                 ;
                 echo "</tr>";
            echo "<br>";
        }
    }
break;
 }
 if(array_key_exists('delete', $_POST)) 
 {
    delete();
}

if(array_key_exists('display', $_POST)) 
{
   display();
}

function delete()
{
    $servername = "localhost";
    $username = "root";
    $password = "Karthik@8185";
    $database = "dbm";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM `phptrip` WHERE `sno` LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $aff = mysqli_affected_rows($conn);
    echo "<br>Number of affected rows: $aff <br>";
    if($result)
    {
        echo "Delete successfully";
    }
    else{
        $err = mysqli_error($conn);
        echo "Not Delete successfully due to this error --> $err";
    }
    echo "<br> <br>";
    $sql = "SELECT * FROM `phptrip`";
    $result = mysqli_query($conn, $sql);
    echo "<center> <h3> DISPLAYING INFORMATION </h3> </center>";
    $num = mysqli_num_rows($result);
    echo "<table border='1'>
<tr>
<th>sno</th>
<th>fname</th>
<th>lname</th>
<th>email</th>
<th>pno</th>
<th>address</th>
<th>fooditem</th>
<th>quantity</th>
</tr>";
    echo " <center> <b> $num records found in the DataBase </b> </center> <br>";
    if($num> 0){
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>". $row['sno'] . "</td>" .
                 "<td>". $row['fname'] ."</td>" .
                 "<td>". $row['lname'] . "</td>" .
                 "<td>". $row['email'] . "</td>" .
                 "<td>". $row['pno'] . "</td>" .
                 "<td>". $row['address'] . "</td>" .
                 "<td>". $row['fooditem'] . "</td>" .
                 "<td>". $row['quantity'] ."</td>";
                 echo "</tr>";
            echo "<br>";
        }
    }
}
function display()
{
    $servername = "localhost";
$username = "root";
$password = "Karthik@8185";
    $database = "dbm";
    $conn = mysqli_connect($servername, $username, $password, $database);
    echo "<br> <br>";
    $sql = "SELECT * FROM `phptrip`";
    $result = mysqli_query($conn, $sql);
    echo "<center> <h3> DISPLAYING INFORMATION </h3> </center>";
    $num = mysqli_num_rows($result);
    echo "<table border='1'>
<tr>
<th>sno</th>
<th>fname</th>
<th>lname</th>
<th>email</th>
<th>pno</th>
<th>address</th>
<th>fooditem</th>
<th>quantity</th>
</tr>";
    echo " <center> <b> $num records found in the DataBase </b> </center> <br>";
    if($num> 0){
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>". $row['sno'] . "</td>" .
                 "<td>". $row['fname'] ."</td>" .
                 "<td>". $row['lname'] . "</td>" .
                 "<td>". $row['email'] . "</td>" .
                 "<td>". $row['pno'] . "</td>" .
                 "<td>". $row['address'] . "</td>" .
                 "<td>". $row['fooditem'] . "</td>" .
                 "<td>". $row['quantity'] ."</td>";
                 echo "</tr>";
            echo "<br>";
        }
    }    
}
header('Refresh: 3; URL = 1s.php');
?>
</body>
<form method = "post">
<input type="submit" name="delete" class="delete" value="Order is done"/>
<input type="submit" name="display" class="display" value="Display Order Details"/>
</form>
</html>