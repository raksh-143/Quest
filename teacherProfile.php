<?php 
    include('sqlRequest.php');
    session_start();
    $teacherId = $_SESSION['tid'];
    $stmt = $dbh->prepare("select * from teacher where id = :tid");
    $stmt->execute([':tid'=>$teacherId]);
    $teacherInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h1 style="margin-top: 120px;">Your Profile</h1>
    <p><?php echo "ID: ".$teacherInfo[0]['id'] ?></p>
    <p><?php echo "Name: ".$teacherInfo[0]['name'] ?></p>
    <p><?php echo "Handling Subjects: ".$teacherInfo[0]['subject'] ?></p>
    <a class="mt-3 btn btn-outline-success shadow-none" href="teacherPage.php">Questions</a><br>
    <form method="post" action="teacherProfile.php">
        <input class="mt-3 btn btn-outline-success shadow-none" type="submit" name="out" value="Sign Out">
    </form>
</body>
</html>