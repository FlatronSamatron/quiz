<?php include '../includes/config.php';?>
<?php
	if(!isset($_SESSION['score_html'])){
		$_SESSION['score_html'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;

		$next = $number+1;

		//общее количество вопросов
		$query = mysqli_query($con,"SELECT * FROM questions_html");
		$total = mysqli_num_rows($query);
		$_SESSION['total_html'] = $total;

		//правильный ответ
		$query = mysqli_query($con,"SELECT * FROM choices_html WHERE question_number = $number AND is_correct = 1");

		$row = mysqli_fetch_assoc($query);

		$correct_choice = $row['id'];

		if($correct_choice == $selected_choice){
			$_SESSION['score_html']++;
		}

		//Проверка на последний вопрос
		if($number == $total){
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?n=".$next);
		}

	}


?>