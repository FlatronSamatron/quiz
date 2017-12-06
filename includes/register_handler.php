<?php  
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

if(isset($_POST['register_button'])){ //если нажали на кнопку
	/*ИМЯ*/
$fname = strip_tags($_POST['reg_fname']);//strip_tags-Удаляет HTML и PHP-теги из строки
$fname = str_replace(" ", "", $fname);//убераем пробелы
$fname = ucfirst(strtolower($fname));//Делаем первую букву большой остальные маленькими
$_SESSION['reg_fname'] = $fname;

	/*ФАМИЛИЯ*/
$lname = strip_tags($_POST['reg_lname']);//strip_tags-Удаляет HTML и PHP-теги из строки
$lname = str_replace(" ", "", $lname);//убераем пробелы
$lname = ucfirst(strtolower($lname));//Делаем первую букву большой остальные маленькими
$_SESSION['reg_lname'] = $lname;

	/*EMAIL*/
$em = strip_tags($_POST['reg_email']);//strip_tags-Удаляет HTML и PHP-теги из строки
$em = str_replace(" ", "", $em);//убераем пробелы
$em = ucfirst(strtolower($em));//Делаем первую букву большой остальные маленькими
$_SESSION['reg_email'] = $em;

	/*EMAIL2*/
$em2 = strip_tags($_POST['reg_email2']);//strip_tags-Удаляет HTML и PHP-теги из строки
$em2 = str_replace(" ", "", $em2);//убераем пробелы
$em2 = ucfirst(strtolower($em2));//Делаем первую букву большой остальные маленькими
$_SESSION['reg_email2'] = $em2;

	/*ПАРОЛЬ*/
$password = strip_tags($_POST['reg_password']);//strip_tags-Удаляет HTML и PHP-теги из строки
$password2 = strip_tags($_POST['reg_password2']);//strip_tags-Удаляет HTML и PHP-теги из строки

$date = date("Y-m-d");

/*Проверка Email*/
if($em == $em2){ //если совпадают email
	if(filter_var($em , FILTER_VALIDATE_EMAIL)){ //проверяем формат Email с помощью фильтра FILTER_VALIDATE_EMAIL
		$em = filter_var($em , FILTER_VALIDATE_EMAIL); //Если все хорошо записываем email в переменную
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'"); //Ищем совпадения EMAIL в таблице
		$row_cnt = mysqli_num_rows($e_check);//ищем совпадения
		if($row_cnt > 0){
			array_push($error_array, "Этот Email уже используеться<br>"); //заталкиваем в error_erray
		}
	} else {
		array_push($error_array, "Неверный формат Email<br>"); 
	}

} else {
	array_push($error_array,"Email не совпадают<br>");
}
/*Проверка имени фамилии*/
		if(strlen($fname)>25 || strlen($fname)<2){
			array_push($error_array,"Ваше Имя должно содержать от 2 до 25 символов<br>");
		} else {
			if(preg_match('/[^A-Za-z0-9]/', $fname)){
				array_push($error_array, "Ваше Имя должно содержать только английские буквы или цыфры<br>");
			}
		}

		if(strlen($lname)>25 || strlen($lname)<2){
			array_push($error_array, "Ваша Фамилия должна содержать от 2 до 25 символов<br>");
		} else {
			if(preg_match('/[^A-Za-z0-9]/', $fname)){
				array_push($error_array, "Ваша Фамилия должно содержать только английские буквы или цыфры<br>");
			}
		}
		/*Проверка пароля*/
		if($password != $password2){
			array_push($error_array, "Ваш пароль не совпадает<br>");
		} else {
			if(preg_match('/[^A-Za-z0-9]/', $password)){
				array_push($error_array, "Ваш пароль должет содержать только английские буквы или цыфры<br>");
			}
		}
		if(strlen($password)>30 || strlen($password)<5){
			array_push($error_array, "Ваш пароль должен содержать от 5 до 30 символов<br>");
		}

			if(empty($error_array)){ //Еслии отсутствуют ошибки
			//$password = md5($password);
			$username = ucfirst($lname.'_'.$fname);
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

			$i = 0; 
		    while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		    }

			$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '0', '0', '0')");
			array_push($error_array, "<span style='color: #14c800;'></span>Вы зарегестрировались!<br>");

			$_SESSION['reg_fname'] ="";
			$_SESSION['reg_lname'] ="";
			$_SESSION['reg_email'] ="";
			$_SESSION['reg_email2'] ="";
		}
}
?>
