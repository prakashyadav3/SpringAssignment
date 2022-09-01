<?php

  $conn = mysqli_connect('localhost', 'root', '','test');
    $sql = "SELECT * FROM `user`";
  $user = mysqli_query($conn,$sql);
  $sql2 = "SELECT * FROM `company`";
  $company = mysqli_query($conn,$sql2);

  if(isset($_POST['submit']))
  {
    $u_id = mysqli_real_escape_string($conn,$_POST['user']);
    
    $c_id = mysqli_real_escape_string($conn,$_POST['company']);
    
    
    $sql_insert = "INSERT INTO `usercompany`(`user_id`, `company_id`)
    VALUES ('$u_id','$c_id')";
  
    if(mysqli_query($conn,$sql_insert))
    {
      echo '<script>alert("User company mapped successfully")</script>';
    }
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
<p><center style="font-size: 40px;">Add Company to users profile</center></p>
<center>
  <br><br>
  <form method="POST">
    <label>Select User &nbsp; &nbsp; &nbsp; &nbsp;</label>
    <select name="user" style="width: 10%;">
      <?php
        while ($user1 = mysqli_fetch_array($user,MYSQLI_ASSOC)):;
      ?>
        <option value="<?php echo $user1["user_id"];
        ?>">
          <?php echo $user1["user_name"];
          ?>
        </option>
      <?php
        endwhile;
      ?>
    </select>
    <br>
    <br>
    <label>Select Company</label>
    <select name="company" style="width: 10%;">
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
    <br>
    <br>
    <br>
    <input type="submit" value="submit" name="submit">
  </form>
</center>
<br>
</body>
</html>
