<?php 
	if(isset($_POST['login_button'])){
		$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
		$_SESSION['log_email'] = $email;
		$password = $_POST['log_password'];

		$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		$check_login_query = mysqli_num_rows($check_database_query); //ищем сходства с базой

		if($check_login_query ==1){
			$row = mysqli_fetch_array($check_database_query); //если есть 1 совпадение записываем его в $row
			$username = $row['username']; //достаем с $row username
			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit();
		} else {
		array_push($error_array, "Email или пароль не совпадают<br>");
		}
	}
?>