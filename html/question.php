<?php include '../includes/config.php';?>
<?php
	//Задаем номер вопроса
	$number = (int) $_GET['n'];
	//получаем вопрос
	$query_q = mysqli_query($con,"SELECT * FROM questions_html WHERE question_number = $number");

	$question = mysqli_fetch_assoc($query_q); //Извлекает результирующий ряд в виде ассоциативного массива

	//получаем варианты ответов
	$query_a = mysqli_query($con,"SELECT * FROM choices_html WHERE question_number = $number");

	//общее количество вопросов
		$query = mysqli_query($con,"SELECT * FROM questions_html");
		$total = mysqli_num_rows($query);// Получает число рядов в результирующей выборке


?>
<!DOCTYPE html>
<html>
<head>
	<title>ТЕСТ</title>
	<link rel="stylesheet" type="text/css" href="../style/test_style.css">
</head>
<body>
	<div class="test">
	<header>
		<div class="container">
			<h1>HTML тест</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Вопрос <?php echo $number;?> из <?php echo $total;?></div>
			<p class="question">
				<?php echo $question['text']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
				<?php while($row = mysqli_fetch_assoc($query_a)) :?>
					<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']?></li>
				<?php endwhile;?>
				</ul>
				<input type="submit" value="Вперед!">
				<input type="hidden" name="number" value="<?php echo $number ?>">
			</form>
		</div>
	</main>
	</div>
		<script>
			history.pushState(null, null, location.href);
			window.onpopstate = function(event) {
		    history.go(1);
			};
		</script>
</body>
</html>