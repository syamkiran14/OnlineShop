<?php
include 'db.php';

$name=$_GET['ename'];
$mail=$_GET['email'];
$mobile=$_GET['mobile'];
$password=$_GET['password'];

/* Using PDO (prepared statements) prevents SQL injection: */
$sql = $conn->prepare("INSERT INTO CUSTOMERS (NAME, E_MAIL, MOBILE, PASSWORD) VALUES (?, ?, ?, ?)");
$sql->bind_param("is", $name, $mail, $mobile, $password);
$result = $sql->execute();

if (!$result) {
	echo "Error inserting data";
	$sql->close();
} else {
	 echo "Data inserted successfully";
	 $sql->close();
 }

/* Prone to SQL Injection:

$sql="INSERT INTO `emp` (`eid`,`ename`) values ('$id','$name')";
$check=mysql_query($sql,$conn);
if(!$check)
	die( "Error inserting data".mysql_error() );
else echo "Data Inserted Succesfully";

mysql_close($conn);
*/
?>
