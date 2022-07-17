<?php
    include('sqlRequest.php');
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $stmt = $dbh->prepare("select id from teacher");
        $stmt->execute();
        $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $flag = 0;
        foreach($teachers as $teacher){
            if($teacher['id'] == $id){
                $flag = 1;
                break;
            }
        }
        if($flag == 0){
            echo '<script>alert("Teacher does not exist!")</script>';
        }
        else{
            $stmt = $dbh->prepare("delete from teacher where id=:id");
            $stmt->execute([':id'=>$id]);
            echo '<script>alert("Teacher Removed Successfully!")</script>';
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
            text-align: center;
            color: #984063;
            font-family: 'Roboto Condensed', sans-serif;
            font-style: italic;
        }
    </style>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color: #F0F3BD;">
    <h1 style="margin-top: 120px;">Enter teacher details</h1>
    <form action="removeTeacher.php" method="POST">
        <input id="first" class="m-3 p-3 input form-control-lg border-1" type="text" placeholder="Enter ID" required name="id"><br>
        <input class="mb-3 mt-3 btn btn-outline-success shadow-none" id="last" class="input" type="submit" value="Remove" name="submit">
    </form>
    <a href="admin.html" class="mb-3 mt-3 btn btn-outline-success shadow-none">Back to Main Page</a>
</body>
</html>