<?php include '../includes/config.php';?>
<?php 

	$scores = $_SESSION['score_css'];
	$total = $_SESSION['total_css'];
	$user = $_SESSION['user'];
	$procent_scores = ($scores*100)/$total;
	/*Достаем количество правельных ответов с таблицы*/
	$query = mysqli_query($con,"SELECT * FROM users WHERE username = '$user' ");
	$row = mysqli_fetch_assoc($query);
	$correct_choice = $row['score_css'];
	/*Если количество правильных ответов больше предыдущего записываем*/
	if($scores>$correct_choice){
	$score = mysqli_query($con,"UPDATE users SET score_css = '$scores' WHERE username = '$user' ");
	}
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
			<h1>Css тест</h1>
		</div>
	</header>
	<main>
		<div class="container final">
			<h2>Конец</h2>
				<p>Поздравляю, вы прошли тест!</p>
				<p>Ваш результат: <?php echo $procent_scores.'% (правильных ответов: '.$scores.' из '.$total.')'; ?></p>
				<a href="../index.php" class="start">Попробывать снова</a>
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
