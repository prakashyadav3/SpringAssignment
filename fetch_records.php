<?php
$conn = mysqli_connect('localhost', 'root', '','test');

$column = array("user_id","user_name", "email_id" , "phone_no");

$query =  "select * from user" ;

$statement = $conn->prepare($query);
 
$statement->execute();
  
$statement = $conn->prepare($query);
 
$statement->execute();
 
$result = $statement->fetchAll();
 
$data = array();

?>