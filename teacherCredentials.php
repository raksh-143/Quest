<?php 
    include('sqlRequest.php');
    $stmt = $dbh->prepare("select id,name from teacher");
    $stmt->execute();
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Teacher Credentials</h1>
    <table class="table" border="1">
        <tr>
            <th>Teacher Id</th>
            <th>Teacher Name</th>
        </tr>
        <?php foreach($teachers as $teacher){
            echo '<tr><td>'.$teacher['id'].'</td><td>'.$teacher['name'].'</td></tr>';
        } ?>
    </table>
    <a href="admin.html" class="mt-3 mb-3 btn btn-outline-success shadow-none">Back to Main Page</a>
</body>
</html>