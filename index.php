<?php
	require_once "DB/Tests.php";
	require_once "DB/Questions.php";
	require_once "DB/Users.php";

	session_start();

//tiek izveidoti jauni mainīgie
	$testsDb = new Tests();
	$questionsDb = new Questions();
	$usersDb = new Users();

//iesūtam DB mums interesējošās lietas
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$testId = $_POST['test'];
		$test = $testsDb->getById($testId);
		$test['questions'] = $questionsDb->getByTestId($testId);

//ieliekam sesijā, lai vr sekot līdzi uz kādiem jautājumiem atbild un, kas atbild
		$_SESSION["test"] = $test;
		$_SESSION["user_name"] = $name;
		$_SESSION["user_id"] = $usersDb->createNew($name);

		header("Location: QuestionView.php?num=0");
	}

//izsaucam visus pieejamos testus	
	$tests = $testsDb->getAll();
?>


<!DOCTYPE html>
<html>
<head>
	<title> TESTS </title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="StyleDrGroupSkola.css">
	<!-- <link rel="#" href="QuestionView.php"> -->
	
</head>

<body>
	<!-- Ar bootstrapa palīdzību uztaisu, lai lapa ir responsīva -->
	<div class="container-fluid" >
		<div class="row">
			<div class="col text-dark text-justify">
				<h1 align="center">Testa uzdevums</h1>
				<form align="center" action="index.php" method="post">
					<input type="text" name="name" id="NameInput" placeholder="Ievadi savu vārdu" required>
					<br>
					<br>

					<select name="test" id="selectTest" required>
						<option> Izvēlies testu</option>
						<? foreach ($tests as $test) { ?>
							<option value="<?=$test['ID'];?>"><?=$test['Test_Name'];?></option>
						<? } ?>
					</select>
					<br>
					<br>
					
					<button id="submit-btn" type="submit" name="submit">Sākt</button>
					<br>

				</form>

			</div>
		</div>
	</div>

	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
	</script>

</body>
</html>