<?php session_start(); ?>
<?php include 'includes/config.php';?>

<?php 
  if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    $mainUser = $user['username'];
    $_SESSION['user'] = $mainUser;
  } else {
    header("Location: register.php");
  }
?>


<?php
  /*
  PHP(Количество вопросов, лучший результат)
  */
  //количество вопросов
  $queryPhp = mysqli_query($con,"SELECT * FROM questions_php");
  $totalPhp = mysqli_num_rows($queryPhp);//Получает число рядов в результирующей выборке

  //получаем результат правильных ответов
  $scorePhp = mysqli_query($con,"SELECT score_php FROM users WHERE username = '$mainUser'");
  $rowPhp = mysqli_fetch_assoc($scorePhp);
  $scoresPhp = $rowPhp['score_php'];
  $query = mysqli_query($con,"SELECT * FROM questions_php");
  $totalPhp = mysqli_num_rows($query);
  $procentScoresPhp = round((($scoresPhp*100)/$totalPhp), 2);

  /*
  CSS(Количество вопросов, лучший результат)
  */
  //количество вопросов
  $queryCss = mysqli_query($con,"SELECT * FROM questions_css");
  $totalCss = mysqli_num_rows($queryCss);//Получает число рядов в результирующей выборке

  //получаем результат правильных ответов
  $scoreCss = mysqli_query($con,"SELECT score_css FROM users WHERE username = '$mainUser'");
  $rowCss = mysqli_fetch_assoc($scoreCss);
  $scoresCss = $rowCss['score_css'];
  $query = mysqli_query($con,"SELECT * FROM questions_css");
  $totalCss = mysqli_num_rows($query);
  $procentScoresCss = round((($scoresCss*100)/$totalCss), 2);

  /*
  HTML(Количество вопросов, лучший результат)
  */
  //количество вопросов
  $queryHtml = mysqli_query($con,"SELECT * FROM questions_html");
  $totalHtml = mysqli_num_rows($queryHtml);//Получает число рядов в результирующей выборке

  //получаем результат правильных ответов
  $scoreHtml = mysqli_query($con,"SELECT score_html FROM users WHERE username = '$mainUser'");
  $rowHtml = mysqli_fetch_assoc($scoreHtml);
  $scoresHtml = $rowHtml['score_html'];
  $query = mysqli_query($con,"SELECT * FROM questions_html");
  $totalHtml = mysqli_num_rows($query);
  $procentScoresHtml = round((($scoresHtml*100)/$totalHtml), 2);
?>

<!DOCTYPE html>
<html>
<head>
<title>ТЕСТ</title>
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <p> Здравствуйте <b><?php echo str_replace("_"," ",$mainUser); ?></b> пройдите тест, проверьте свои знания!</p>
<div id="charging" class="fa"></div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'php')" id="defaultOpen" >PHP</button>
  <button class="tablinks" onclick="openCity(event, 'css')">CSS</button>
  <button class="tablinks" onclick="openCity(event, 'html')">HTML</button>
  <button class="tablinks"><a href="logout.php">EXIT</a></button>
</div>


<div id="php" class="tabcontent">
  <h2>Тест на знания <b>PHP</b></h2>
      <p>Этот тест содержит несколько вариантов ответов, чтобы проверить ваши знания php</p>
      <ul>
        <li><strong>Количество вопросов: </strong><?php echo $totalPhp;?></li>
        <li><strong>Тип теста: </strong>Множественный выбор</li>
        <li><strong>Расчетное время: </strong><?php echo $totalPhp*0.5?> мин.</li>
      </ul>
      <a href="php/question.php?n=1" class="start">Начать тестирование</a>
</div>

<div id="css" class="tabcontent">
  <h2>Тест на знания <b>CSS</b></h2>
      <p>Этот тест содержит несколько вариантов ответов, чтобы проверить ваши знания css</p>
      <ul>
        <li><strong>Количество вопросов: </strong><?php echo $totalCss;?></li>
        <li><strong>Тип теста: </strong>Множественный выбор</li>
        <li><strong>Расчетное время: </strong><?php echo $totalCss*0.5?> мин.</li>
      </ul>
      <a href="css/question.php?n=1" class="start">Начать тестирование</a> 
</div>

<div id="html" class="tabcontent">
  <h2>Тест на знания <b>HTML</b></h2>
      <p>Этот тест содержит несколько вариантов ответов, чтобы проверить ваши знания html</p>
      <ul>
        <li><strong>Количество вопросов: </strong><?php echo $totalHtml;?></li>
        <li><strong>Тип теста: </strong>Множественный выбор</li>
        <li><strong>Расчетное время: </strong><?php echo $totalHtml*0.5?> мин.</li>
      </ul>
      <a href="html/question.php?n=1" class="start">Начать тестирование</a>
</div>

<div class="results">

<p>Ваш лучший результат:</p>

<p>PHP (<?php echo $scoresPhp ?> из <?php echo $totalPhp  ?>)</p>
<div class="container">
  <div class="skills php" style="width: <?php echo $procentScoresPhp ?>%; background-color: #f44336;"><?php echo $procentScoresPhp; ?>%</div>
</div>

<p>CSS (<?php echo $scoresCss ?> из <?php echo $totalCss  ?>)</p>
<div class="container">
  <div class="skills css" style="width: <?php echo $procentScoresCss ?>%; background-color: #2196F3;"><?php echo $procentScoresCss; ?>%</div>
</div>

<p>HTML  (<?php echo $scoresHtml ?> из <?php echo $totalHtml ?>)</p>
<div class="container">
  <div class="skills html" style="width: <?php echo $procentScoresHtml ?>%; background-color: #4CAF50;"><?php echo $procentScoresHtml ?>%</div>

</div>
</div>

<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

function chargebattery() {
  var a;
  a = document.getElementById("charging");
  a.innerHTML = "&#xf244;";
  setTimeout(function () {
    a.innerHTML = "&#xf243;";
  }, 1000);
  setTimeout(function () {
    a.innerHTML = "&#xf242;";
  }, 2000);
  setTimeout(function () {
    a.innerHTML = "&#xf241;";
  }, 3000);
  setTimeout(function () {
    a.innerHTML = "&#xf240;";
  }, 4000);
}
chargebattery();
setInterval(chargebattery, 5000);
</script>