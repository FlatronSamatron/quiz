<?php include '../includes/config.php';?>
<?php
	if(!isset($_SESSION['score_css'])){
		$_SESSION['score_css'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;

		$next = $number+1;

		//общее количество вопросов
		$query = mysqli_query($con,"SELECT * FROM questions_css");
		$total = mysqli_num_rows($query);
		$_SESSION['total_css'] = $total;

		//правильный ответ
		$query = mysqli_query($con,"SELECT * FROM choices_css WHERE question_number = $number AND is_correct = 1");

		$row = mysqli_fetch_assoc($query);

		$correct_choice = $row['id'];

		if($correct_choice == $selected_choice){
			$_SESSION['score_css']++;
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