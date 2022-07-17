<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <style>
        *{
            text-align: center;
            color: #0566ad;
            font-family: 'Roboto Condensed', sans-serif;
            font-style: italic;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color: #FFBDA9;">
    <h1 style="margin-top:120px;">Select the Teacher</h1>
    <form method="post" action="studentQuestions.php">
</body>
</html>
<?php 
    include('sqlRequest.php');
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['subject'] = $_POST['subject'];
    }
    $choice = $_SESSION['subject'];
    $pat = "%".$choice."%";
    $stmt = $dbh->prepare("select id,name from teacher where subject like :subject");
    $stmt->execute([':subject'=>$pat]);
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $teachersList = "<select class='form-select-lg m-5 p-5 form-select-danger border-2' name='teacher'>";
    foreach($teachers as $teacher){
        $teachersList .= '<option value="'. $teacher['id'] . '">'. $teacher['name'] . '</option>';
    }
    $teachersList .= "</select><br>";
    echo $teachersList;
    echo '<input class="mt-3 btn btn-outline-success shadow-none" type="submit" value="Submit" name="teacherSelect"></form><a class="mt-3 btn btn-outline-success shadow-none" href="student.html">Select a different subject?</a><br><a class="mb-3 mt-3 btn btn-outline-success shadow-none" href="homepage.html">Home</a>';
?>