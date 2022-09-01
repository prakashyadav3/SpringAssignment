<?php
$conn = mysqli_connect('localhost', 'root', '','test');
?>

<?php

  $conn = mysqli_connect('localhost', 'root', '','test');
  
  $sql2 = "SELECT * FROM `company`";
  $company = mysqli_query($conn,$sql2);

  if(isset($_POST['submit']))
  {
    
    $c_id = mysqli_real_escape_string($conn,$_POST['company']);
    
    $result = mysqli_query($conn, "SELECT user.user_id,user.user_name,user.email_id,user.phone_no FROM `user`
    LEFT JOIN usercompany ON user.user_id = usercompany.user_id  WHERE company_id = $c_id; ");
$data = array();
echo '<table class="data-table" style="padding-left: 50px;">
      <tr class="data-heading">';
while ($property = mysqli_fetch_field($result)) {
      echo '<td>' . $property->name . '</td>';  
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
    
   
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
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
<p><center style="font-size: 40px;">View Company Users</center></p>
<center>
<form method="POST">
<br><br>  <br><br>

<label>Select a company</label>
    <select name="company">
      <?php
        while ($company1 = mysqli_fetch_array($company,MYSQLI_ASSOC)):;
      ?>
        <option value="<?php echo $company1["company_id"];
        ?>">
          <?php echo $company1["company_name"];
          ?>
        </option>
      <?php
        endwhile;
      ?>
    </select>
    <br><br>
    <input type="submit" value="submit" name="submit">
</form>
</center>
  <br>
</body>
</html>
