<?php
    include('sqlRequest.php');
    session_start();
    $teacher = $_SESSION['tid'];
    $stmt = $dbh->prepare('select question from questions where teacher = :teacher');
    $stmt->execute([':teacher'=>$teacher]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        *{
            color: #F64668;
            font-family: 'Roboto Condensed', sans-serif;
            font-style: italic;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color:#F4C095">
    <h1>Current Questions</h1>
    <form>
        <table class="table" border="1">
            <tr>
                <td>Question</td>
            </tr>
            <?php
                foreach($questions as $question){
                    $id = $question['question'];
            ?>
            <tr>
                <td><a style="text-decoration: none; color: #F64668" href="answerQuestions.php?id=<?php echo $id; ?>">
                <?php
                    echo $question['question'];
                ?>
                </td></a>
            </tr>
            <?php
                }
            ?>
        </table>
    </form>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherPage.php">Back</a><br>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherProfile.php">My Profile</a><br>
    <form method="post" action="unansweredQuestions.php">
        <input class="mb-3 mt-3 btn btn-outline-success shadow-none" type="submit" name="out" value="Sign Out"><br>
    </form>
</body>
</html>