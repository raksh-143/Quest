<?php 
    include('sqlRequest.php');
    session_start();
    if(isset($_POST['teacherSelect'])){
        $_SESSION['teacher'] = $_POST['teacher'];
    }
    $subject = $_SESSION['subject'];
    $teacher =  $_SESSION['teacher'];
    $stmt = $dbh->prepare('select question,answer from questions where teacher = :teacher and subject = :subject');
    $stmt->execute([':teacher'=>$teacher,':subject'=>$subject]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quest</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <style>
        *{
            color: #054870;
            font-family: 'Roboto Condensed', sans-serif;
            font-style: italic;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color: #FFBDA9;">
    <h1>Existing Questions</h1>
    <table class="table" border="1">
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        <?php foreach($questions as $question){
            $answer = $question['answer'];
            if($answer == ""){
                $answer = "Question not answered yet";
            }
            echo '<tr><td>'.$question['question'].'</td><td>'.$answer.'</td></tr>';
        } ?>
    </table>
    <form action="askQuestions.php" method="post">
        <input class="mt-3 btn btn-outline-success shadow-none" type="submit" value="Want to ask a new question?" name="ask">
    </form>
    <a class="mt-3 btn btn-outline-success shadow-none" href="student.html">Select a different subject?</a><br>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherSelect.php">Select a different teacher?</a><br>
    <a class="mt-3 btn btn-outline-success shadow-none" href="homepage.html">Home</a>
</body>
</html>