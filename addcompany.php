<?php
$conn = mysqli_connect('localhost', 'root', '','test');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

if(isset($_POST['submit'])){
  $company_name = $_POST['company_name']; 
  $city = $_POST['city'];

$sql = "INSERT INTO company(company_name, city)
VALUES ('$company_name', '$city')";

if ($conn->query($sql) === TRUE) {
  echo "New company added successfully";
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
}  
.container {  
    padding: 50px;  
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
<p><center style="font-size: 40px;">Add Company</center></p>
<center>
<form action="#" method="post">
<div class="container">
<label>Company Name </label>
<input type="text" name="company_name" size="20"><br>
<label>Company City </label> &nbsp;
<input type="text" name="city" size="20"><br>
<input type="submit" value="submit" name="submit">
</div>
</form>
</center>
</body>
</html>