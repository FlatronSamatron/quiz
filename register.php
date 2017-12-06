<?php include 'includes/config.php';?>
<?php include 'includes/register_handler.php';?>
<?php include 'includes/login_handler.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>ТЕСТ</title>
	<link rel="stylesheet" type="text/css" href="style/register_style.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/js.js"></script>
</head>
<body>

	<?php 
		if(isset($_POST['register_button'])) {
			echo'
				<script>
					$(document).ready(function(){
						$("#first").hide();
						$("#second").show();
					});
				</script>
			';
		}
	?>

	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
			<h1>WEB-тесты</h1>
			Войдите или зарегестрируйтесь!
		</div>
	<div id="first">
		<form action="register.php" method="POST">
			<input type="email" name="log_email" placeholder="Ваш Email">
			<br>
			<input type="password" name="log_password" placeholder="Ваш пароль">
			<br>
			<?php if(in_array("Email или пароль не совпадают<br>", $error_array))
				echo "Email или пароль не совпадают<br>";
			?>
			<input type="submit" name="login_button" value ="Войти">
			<br>
			<a href="#"" id="signup" class="signup">Нужен аккаунт? Зарегестрируйся здесь!</a>
		</form>
	<br>
	</div>

	<div id="second">
		<form action="register.php" method="POST">
			<input type="text" name="reg_fname" placeholder="Имя" value="<?php
			 if(isset($_SESSION['reg_fname'])){
			 	echo $_SESSION['reg_fname'];
			 } ?>" required>
			<br>
			<?php if(in_array("Ваше Имя должно содержать от 2 до 25 символов<br>", $error_array))
				echo "Ваше Имя должно содержать от 2 до 25 символов<br>";
			?>
			<?php if(in_array("Ваше Имя должно содержать только английские буквы или цыфры<br>", $error_array))
				echo "Ваше Имя должно содержать только английские буквы или цыфры<br>";
			?>

			<input type="text" name="reg_lname" placeholder="Фамилия" value="<?php
			 if(isset($_SESSION['reg_lname'])){
			 	echo $_SESSION['reg_lname'];
			 } ?>" required>
			<br>
			<?php if(in_array("Ваша Фамилия должна содержать от 2 до 25 символов<br>", $error_array))
				echo "Ваша Фамилия должна содержать от 2 до 25 символов<br>";
			?>
			<?php if(in_array("Ваша Фамилия должно содержать только английские буквы или цыфры<br>", $error_array))
				echo "Ваша Фамилия должно содержать только английские буквы или цыфры<br>";
			?>

			<input type="email" name="reg_email" placeholder="Email" value="<?php
			 if(isset($_SESSION['reg_email'])){
			 	echo $_SESSION['reg_email'];
			 } ?>" required>
			<br>

			<input type="email" name="reg_email2" placeholder="Повторите Email" value="<?php
			 if(isset($_SESSION['reg_email2'])){
			 	echo $_SESSION['reg_email2'];
			 } ?>" required>
			<br>
			<?php if(in_array("Этот Email уже используеться<br>", $error_array))
				echo "Этот Email уже используеться<br>";?>
			<?php if(in_array("Неверный формат Email<br>", $error_array))
				echo "Неверный формат Email<br>";?>
			<?php if(in_array("Email не совпадают<br>", $error_array))
				echo "Email не совпадают<br>";?>

			<input type="password" name="reg_password" placeholder="Пароль" required>
			<br>
			<input type="password" name="reg_password2" placeholder="Повторите Пароль" required>
			<br>
			<?php if(in_array("Ваш пароль не совпадает<br>", $error_array))
				echo "Ваш пароль не совпадает<br>";?>
			<?php if(in_array("Ваш пароль должет содержать только английские буквы или цыфры<br>", $error_array))
				echo "Ваш пароль должет содержать только английские буквы или цыфры<br>";?>
			<?php if(in_array("Ваш пароль должен содержать от 5 до 30 символов<br>", $error_array))
				echo "Ваш пароль должен содержать от 5 до 30 символов<br>";?>

			<input type="submit" name="register_button" value="Регистрация">
			<br>
			<?php if(in_array("<span style='color: #14c800;'></span>Вы зарегестрировались!<br>", $error_array))
				echo "<span style='color: #14c800;'></span>Вы зарегестрировались!<br>";?>
			<a href="#"" id="signin" class="signin">Есть аккаунт? Можешь войти здесь!</a>
		</form>
	</div>
	</div>
	</div>
</body>
</html>