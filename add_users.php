<?php
$conn = mysqli_connect('localhost', 'root', '','test');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

if(isset($_POST['submit'])){
  $user_name = $_POST['user_name']; 
  $email = $_POST['email'];
  $phone = $_POST['phone'];

$sql = "INSERT INTO user(user_name, email_id, phone_no)
VALUES ('$user_name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
  echo "New user added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}    
?>
<!DOCTYPE html>
<html>
<head>
<title>assignment</title>
</head>
<style type="text/css">
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  /*background-color: pink;  */
}  
.container {  
    padding: 50px;  
  /*background-color: lightblue;  */
}  
  
input[type=text], input[type=password],input[type=email], textarea {  
  width: 20%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  

input[type=text]:focus, input[type=password]:focus {  
  background-color: orange;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
         }  
hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  
.registerbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 16px 20px;  
  margin: 8px 0;  
  border: none;  
  cursor: pointer;  
  width: 100%;  
  opacity: 0.9;  
}  
.registerbtn:hover {  
  opacity: 1;  
}  
</style> 
<body>


<p><center style="font-size: 40px;">Add Users</center></p>
<center>
<form action="#" method="post">
<div class="container">
<label>User Name: </label>
<input type="text" name="user_name" size="20"><br>
<label>Email Id: </label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="email" name="email" size="50"><br>
<label>Phone No: </label>
<input type="text" name="phone" size="20"><br>
<input type="submit" value="submit" name="submit">
</div>
</form></center>
</body>
</html>