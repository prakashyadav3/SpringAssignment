<?php
$conn = mysqli_connect('localhost', 'root', '','test');

$result = mysqli_query($conn,"SELECT * FROM company");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Company</title>
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
<style>
#records {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 85%;
}

#records td, #records th {
  border: 1px solid #ddd;
  padding: 8px;
}

#records tr:nth-child(even){background-color: #f2f2f2;}

#records tr:hover {background-color: #ddd;}

#records th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<body>
<p><center style="font-size: 40px;">View Companies</center></p>
<table id="records" style="margin: 150px;">
    <tr>
    <td>Id</td>
    <td>Name</td>
    <td>City</td>
    <td>Action</td>
    </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $row["company_id"]; ?></td>
    <td><?php echo $row["company_name"]; ?></td>
    <td><?php echo $row["city"]; ?></td>
    <td><a href="delete.php?company_id=<?php echo $row["company_id"]; ?>">Delete</a></td>
    </tr>
    <?php
    $i++;
    }
    ?>
</table>
</body>
</html>
