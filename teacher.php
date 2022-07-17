<?php
    include('sqlRequest.php');
    if(isset($_POST['submit'])){
        $enteredId = $_POST['id'];
        $enteredPword = $_POST['pword'];
        $stmt = $dbh->query("select * from teacher");
        $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $flag = false;
        foreach($teachers as $teacher){
            if($teacher['id'] === $enteredId && $teacher['pword'] === $enteredPword){
                $flag = true;
                break;
            }
        }
        if($flag == false){
            echo '<script>alert("Login Failed! Please try again!")</script>';
        }
        else{
            echo '<script>alert("Login Successful! Redirecting to Quest!")</script>';
            session_start();
            $_SESSION['tid'] = $_POST['id'];
            header('location:teacherPage.php');
        }
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
            font-family: 'Roboto Condensed', sans-serif;
            color: #F64668;
            font-style: italic;
        }
        input{
            color: #41436A;
        }
        h1{
            margin-top: 200px;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color:#F4C095">
    <h1 style="margin-top:120px;">Enter your Login Credentials</h1>
    <form action="teacher.php" method="POST">
        <input id="first" class="m-3 p-3 input form-control-lg border-1" type="text" placeholder="Enter Login ID" required name="id"><br>
        <input class="input m-3 p-3 form-control-lg border-1" type="password" placeholder="Enter Password" required name="pword"><br>
        <input class="mb-3 mt-3 btn btn-outline-success shadow-none" id="last" class="input" type="submit" value="Log In" name="submit">
    </form>
    <a class="btn btn-outline-success shadow-none" href="homepage.html">Back to Homepage</a>
</body>
</html>