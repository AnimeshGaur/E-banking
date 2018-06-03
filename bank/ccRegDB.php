<?php
require 'dbconnection.php';
error_reporting(0);
if(isset($_SESSION['checkno']))
{
    header("Location: check.php"); exit(0);
}
if(isset($_SESSION['checkno']))
{
    header("Location: check.php");
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$payeename=$_REQUEST["payeename"];
$recivername=$_REQUEST["Recivername"];
$bankname=$_REQUEST["bname"];
$ifse=$_REQUEST["ifse"];
$day=$_REQUEST["Day"];
$month=$_REQUEST["Month"];
$year=$_REQUEST["Year"];
$payeeacc=$_REQUEST["Mnum"];
$reciveracc=$_REQUEST["Mnum1"];
$checkno=$_REQUEST["checkno"];
$cpwd=$_REQUEST["checkno1"];
$mobile=$_REQUEST["Mobile"];
//$trcpwd1=$_REQUEST["checkimg"];
//$accstatus=$_REQUEST["accstatus"];
$date= date('Y-m-d');
$sqlquery = "INSERT INTO checkdetails('payee name','reciver name','bank name','ifse','checkdate','payee acc no','reciver acc no','checkno,mobile') 
VALUES('$payeename','$recivername','$bankname','$ifse','$date','$payeeacc','$reciveracc','$checkno','$mobile')";
        

if ($conn->query($sqlquery) === TRUE) {
    echo "New record created successfully";
    header('Location:check.php?success=1');

} else {
    echo "Error: " . $sqlquery . "<br>" . $conn->error;
    header('Location:check.php?error=3'); error(0);
}

$conn->close();
?>