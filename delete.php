<?php
$conn = mysqli_connect('localhost', 'root', '','test');

$query = mysqli_query($conn,"DELETE FROM company WHERE company_id={$_GET['company_id']} ");
if(!$query)
    die ("The error is: " . mysqli_error($conn));
else
    echo "<script>location.href = 'company.php';</script>";
?>
