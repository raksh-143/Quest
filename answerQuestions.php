<?php
    include('sqlrequest.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $dbh->prepare('select answer from questions where question = :question');
        $stmt->execute([':question'=>$id]);
        $curanswer = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if(isset($_POST['submit'])){
        session_start();
        $teacher = $_SESSION['tid'];
        echo $teacher;
        $question = $_GET['id'];
        echo $question;
        $answer = $_POST['answer'];
        echo $answer;
        $stmt = $dbh->prepare('update questions set answer=:answer where teacher = :teacher and question = :question');
        $stmt->execute([':teacher'=>$teacher,':question'=>$question,':answer'=>$answer]);
        header('location:unansweredQuestions.php');
    }
    if(isset($_POST['out'])){
        session_destroy();
        header('location:homepage.html');
    }
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
        input:textarea{
            width: 200px;
            border: 1px solid black;
        }
        *{
            font-family: 'Roboto Condensed', sans-serif;
            color: #F64668;
            font-style: italic;
        }
        input{
            color: #41436A;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color:#F4C095">
    <form method="post" action="answerQuestions.php?id=<?php echo $id; ?>">
        <label class="mt-3 fs-5">
            <?php echo '<b>Question:</b> '.$id.' '; ?>
        </label><br>
        <textarea style="resize: none;" class="text-center form-control-lg m-3 p-5 mb-1" name="answer" rows="10" cols="20"><?php echo $curanswer[0]['answer'] ?></textarea><br>
        <input class="mt-3 btn btn-outline-success shadow-none" type="submit" name="submit">
    </form>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherPage.php">Back</a>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherProfile.php">My Profile</a>
    <form method="post" action="answerQuestions.php">
        <input class="mb-3 mt-3 btn btn-outline-success shadow-none" type="submit" name="out" value="Sign Out">
    </form>
</body>
</html>