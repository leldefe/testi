<?php
	require_once "DB/Questions.php";
	require_once "DB/Answers.php";
	require_once "DB/UserAnswers.php";

	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: index.php");
	}

	$num = $_GET['num'];
	$question = $_SESSION['test']['questions'][$num];



	$answerDb = new Answers();

	$answers = $answerDb->getByQuestionId($question['ID']);
	//tā, kā indexā ir visi testi dabūti ar if, tā man te jādabū visas atbildes un jāuztaisa pogas

	if(isset($_POST['submit'])){
		$AnswId = $_POST['submit'];
		$UserAnsw = new UserAnswers();
		$UserAnsw->createNew($AnswId, $_SESSION['user_id']);
	}
?>

<h1>Lietotājs <?=$_SESSION['user_name'];?> (<?=$_SESSION['user_id'];?>)</h1>
<h1>Tests <?=$_SESSION['test']['Test_Name'];?></h1>
<b><?=$question["TEXT"];?></b>

<br>				





<form align="center" action="QuestionView.php?num=<?=$num+1;?>" method="post">


<? foreach ($answers as $answer) { ?>
	<button id="submit-btn" type="submit" name="submit" value="<?=$answer['ID'];?>"><?=$answer['Text'];?></button>
<? } ?>
<br>
</form>



<!-- lai atzīmējas, kurš jautājums pēc kārtas -->

