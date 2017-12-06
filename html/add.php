<?php include '../includes/config.php';?>
<?php 
	if(isset($_POST['submit'])){
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];

		//Воросы
		$query_row = mysqli_query($con,"INSERT INTO questions_html (question_number, text)
			VALUES('$question_number', '$question_text' )");
		//Проверка вводимого
		if($query_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Варианты ответа
					$query = mysqli_query($con,"INSERT INTO choices_html (question_number, is_correct, text)
					VALUES ('$question_number', '$is_correct', '$value') ");

					//Проверка
					if($query_row){
						continue;
					} else {
						die('Error');
					}
				}
			}
			$msg = 'Вопрос добавлен';
		}
	}
	$query = mysqli_query($con,"SELECT * FROM questions_html");
	$total = mysqli_num_rows($query);
	$next = $total+1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ТЕСТ</title>
	<link rel="stylesheet" type="text/css" href="../style/add.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>Html тест</h1>
		</div>
	</header>
	<main>
		<div class="container">
		<h2>Добавление вопроса</h2>
		<?php if(isset($msg)){echo $msg;} ?>
		<form method="post" action="add.php">
			<p>
				<label>Номер вопроса: </label>
				<input type="number" value="<?php echo $next ?>" name="question_number">
			</p>
			<p>
				<label>Вопрос: </label>
				<input type="text" name="question_text">
			</p>
			<p>
				<label>Ответ №1: </label>
				<input type="text" name="choice1">
			</p>
			<p>
				<label>Ответ №2: </label>
				<input type="text" name="choice2">
			</p>
			<p>
				<label>Ответ №3: </label>
				<input type="text" name="choice3">
			</p>
			<p>
				<label>Ответ №4: </label>
				<input type="text" name="choice4">
			</p>
			<p>
				<label>Ответ №5: </label>
				<input type="text" name="choice5">
			</p>
			<p>
				<label>Номер правильного ответа: </label>
				<input type="number" name="correct_choice">
			</p>
			<p>
				<input type="submit" name="submit" value="Создать">
			</p>
		</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, PHP TEST
		</div>
	</footer>
</body>
</html>