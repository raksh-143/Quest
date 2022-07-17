<?php
    include('sqlRequest.php');
    if(isset($_POST['submit'])){
        $pword = $_POST['pword'];
        $cpword = $_POST['pword2'];
        if($pword != $cpword){
            echo '<script>alert("Password and Confirm Password have to be same!")</script>';
        }
        else{
            $stmt = $dbh->prepare("update admin set pword=:pword");
            $stmt->execute([':pword'=>$pword]);
            echo '<script>alert("Password reset successful!")</script>';
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
    <h1 style="margin-top: 120px;">Enter your Login Credentials</h1>
    <form action="adminPword.php" method="POST">
        <input id="first" class="m-3 p-3 input form-control-lg border-1" type="password" placeholder="Enter Password" required name="pword"><br>
        <input class="input m-3 p-3 form-control-lg border-1" type="password" placeholder="Confirm Password" required name="pword2"><br>
        <input class="mb-3 mt-3 btn btn-outline-success shadow-none" id="last" class="input" type="submit" value="Reset" name="submit">
    </form>
    <a href="admin.html" class="mb-3 mt-3 btn btn-outline-success shadow-none">Back to Main Page</a>
</body>
</html>