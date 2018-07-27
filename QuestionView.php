<?php
	require_once "DB/Questions.php";

	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: index.php");
	}

	$num = $_GET['num'];
	$question = $_SESSION['test']['questions'][$num];

	// new Answers();
	// ->getByQuestionId();

	if(isset($_POST['pogasNosaukums']))	{
		$answerId = $_POST['pogasNosaukums'];

		// new UserAnswers()
		// ->createNew($answerId, $_SESSION['user_id'])
	}
?>

<h1>Lietotājs <?=$_SESSION['user_name'];?> (<?=$_SESSION['user_id'];?>)</h1>
<h1>Tests <?=$_SESSION['test']['Test_Name'];?></h1>
<b><?=$question["TEXT"];?></b>

<!-- lai atzīmējas, kurš jautājums pēc kārtas -->
<a href="QuestionView.php?num=<?=$num+1;?>">Nākamais</a>