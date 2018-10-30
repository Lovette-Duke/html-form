<?php
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$gender = $_POST['gender'];
$country = $_POST['country'];

header('Location:success.html');

function saveToDATABASE($fname,$lname,$email,$password,$phonenumber,$gender,$country){
	$serverName = "localhost";
	$database = "dufunaSignup";
	$username = "root";
	$password = "mysql";
	

	$conn = mysqli_connect($serverName, $username, $password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

	$sql = "INSERT INTO signups (firstname, lastname, email, password, phonenumber, gender, country) 
		VALUES ('$fname', '$lname', '$email', '$password', '$phonenumber', '$gender', '$country')";
	$result = mysqli_query($conn, $sql);

	if (!$result) {
			die("Error: " . $sql . "<br>" . mysqli_error($conn));
		}

	mysqli_close($conn);
	

	/*$fileHandler = fopen('sign-up.txt', 'a');
	$string = $fname . ',' . $lname . ',' . $email .$password . ',' .$phonenumber .',' .$gender . ',' .$country. "\n";
	fwrite($fileHandler, $string);
	fclose($fileHandler);*/
}
saveToDATABASE($fname,$lname,$email,$password,$phonenumber,$gender,$country);

?>