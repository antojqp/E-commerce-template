<?php 
if (isset($_POST[Submit])) {
	
	require 'databaseinfo.php'; #remember this file has to be modified if you are trying to use a diferent database
	$name=$_POST["Name"];
	$userName=$_POST["UserName"];
	$email=$_POST["Email"];
	$password=$_POST["Password"];
	$verifyPassword=$_POST["Verify_Password"];

	#error checkers
	if (empty($name) || empty($userName) || empty($email) || empty($password) || empty($verifyPassword)) {
		#First checker this one will check if the user didn't put something in the inputs
		header("Location: ../register.php?error=emptyfields&Name=" . $name . "&Email=" . $email);
		exit();
	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		#second check if the email is valid
		header("Location: ../register.php?error=invalidmail&Name=" . $name);
		exit();
	}elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $userName)) {
		#third check if the Username is valid
		header("Location: ../register.php?error=invalidusername&Email=". $email);
		exit();
	}elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $userName) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		# this one does both of the uper ones
		header("Location: ../register.php?error=Everythingiswrong");
		exit();
	}elseif ($password !== $verifyPassword) {
	
		#this one checks if the password is the same in both fields
		header("Location: ../register.php?error=passwordnotmatch");
		exit();
	}else{

		#now here it'll check if the name already exists
		$sql = "SELECT USERNAME FROM users WHERE USERNAME=?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			#error in case it can't read the database
			header("Location: ../register.php?error=sqlerror101");
			exit();
		}else{
			/*
			these will make sure if somebody already has the same username by verifying if the database has it, it'll have a result (that's the one in stmt), and it'll be 0 or 1
			If the result is 1 then it'll throw an error and if its 0 it'll go on and if it's something else Imma shot maself*/

			mysqli_stmt_bind_param($stmt, "s", $userName);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			#remember to always close the statements ALWAYS
			mysqli_stmt_close($stmt);
			if ($resultCheck > 0) {
			
				header("Location: ../register.php?error=usernametaken");
				exit();

			}else{

				$sql = "INSERT INTO users (NAME, USERNAME, EMAIL, PASS) VALUES (?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					#error in case it can't write in the database
					header("Location: ../register.php?error=sqlerror202");
					exit();
				}else{
						#always encript ur password
						#now this is the last part if everything was correct it'll hash the password and write everything in the database
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			        	mysqli_stmt_bind_param($stmt, "ssss", $name, $userName, $email, $hashedPwd);
			        	mysqli_stmt_execute($stmt);
			        	header("Location: ../register.php?signup=success");
			        	exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
  	mysqli_close($conn);
}

else{

	echo "begone thot";
}