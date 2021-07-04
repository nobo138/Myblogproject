<?php	
	
	//Change these configs according to your MySQL server
	session_start();
	include('conn.php');
	// Create connection
	#mysqli_set_charset('utf8', $conn);
		// Check connection
	if (isset($_POST['signup'])){ 
			// 2 ways to get fields in form, the later is more secure
		$name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sanitized_password = mysqli_real_escape_string($conn, $password);
		$sanitized_email = mysqli_real_escape_string($conn, $email);
		$sanitized_name = mysqli_real_escape_string($conn, $name);

		function checkmail($email){
			if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email))
				return true;
		};
		function checkusername($username){
			if(preg_match("/^([a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){1,18}[a-zA-Z0-9])$/",$username))
				return true;
		};
		function checkpass($password){
			if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[.!@#$%^&*_=+-]).{8,}$/",$password))
				return true;
		};

		if (checkmail($email)&&checkpass($password)&&checkusername($name)){
		
		
			$query=mysqli_query($conn,"select * from users where username='".$sanitized_name."'");

			if (mysqli_num_rows($query) > 0){
				$_SESSION['message']="Signup failed. Username existed!";	
				header('location:Signup.php');
			}	
			else {
				
				
				$hashed_password = password_hash($sanitized_password, PASSWORD_DEFAULT);
				
				//Create SQL command to insert data to database
				$sql_command = "INSERT INTO users (username, password,email) VALUES ('$sanitized_name','$hashed_password','$sanitized_email')";

				if ($conn->query($sql_command) === TRUE){
					header('location:index.php');
				}
				else
				{
					$_SESSION['message']="Signup failed. Try again!";
					header('location:Signup.php');
				}
			}
		}
	}
	mysqli_close($conn);
?>