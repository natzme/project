

<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$conn = new mysqli('localhost','root','','webportfolio');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactme(name,email,subject,message) values(?,?,?,?)");
		$stmt->bind_param("ssss", $name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message sent...";
		$stmt->close();
		$conn->close();
	}
?>