<?php
    include('sqlRequest.php');
    session_start();
    if(isset($_POST['submit'])){
        $question = $_POST['question'];
        if($question === ""){
            echo '<script>alert("Enter a question!")</script>';
        }else{
            $teacher = $_SESSION['teacher'];
            $subject = $_SESSION['subject'];
            $stmt = $dbh->prepare('insert into questions(teacher,subject,question) values(:teacher,:subject,:question)');
            $stmt->execute([':teacher'=>$teacher,':subject'=>$subject,':question'=>$question]);
            echo '<script>alert("Question successfully submitted!")</script>';
        }
    }
    $subject = $_SESSION['subject'];
    $teacher =  $_SESSION['teacher'];
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
            text-align: center;
            color: #054870;
            font-family: 'Roboto Condensed', sans-serif;
            font-style: italic;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color: #FFBDA9;">
    <h1 style="margin-top:120px;" class="mt-3">Post your Question</h1>
    <form method="post" action="askQuestions.php">
        <textarea class="text-center form-control-lg m-3 p-5 mb-1" rows="5" cols="70" placeholder="What's your question?" name="question"></textarea><br>
        <input class="mt-3 btn btn-outline-success shadow-none" type="submit" name="submit" value="Submit"><br>
    </form>
    <a class="mt-3 btn btn-outline-success shadow-none" href="student.html">Select a different subject?</a><br>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherSelect.php">Select a different teacher?</a><br>
    <a class="mt-3 btn btn-outline-success shadow-none" href="studentQuestions.php">Back</a><br>
    <a class="mb-3 mt-3 btn btn-outline-success shadow-none" href="homepage.html">Home</a>
</body>
</html>