<?php
$conn = mysqli_connect('localhost', 'root', '','test');

$result = mysqli_query($conn, "SELECT user.user_id as id,user.user_name,user.email_id,user.phone_no,company.company_name FROM `user`
LEFT JOIN usercompany ON user.user_id= usercompany.user_id 
LEFT JOIN company ON usercompany.company_id= company.company_id GROUP BY id; ");
$data = array();
echo'<html><body><p><center style="font-size: 40px;">View Records</center></p>
</body></html>';
echo '<table class="data-table" id="records" style="margin: 150px;">
        <tr class="data-heading">';
while ($property = mysqli_fetch_field($result)) {
    echo '<td >' . $property->name . '</td>';  
    $data[] = $property->name;  
}
echo '</tr>';

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($data as $item) {
        echo '<td>' . $row[$item] . '</td>'; 
    }
    echo '</tr>';
}
echo "</table>";
?>
<style type="text/css">
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  /*background-color: pink;  */
}  
.container {  
    padding: 50px;  
  background-color: lightblue;  
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
<!DOCTYPE html>
<html>
<head>

</head>
<body>


</body>
</html>