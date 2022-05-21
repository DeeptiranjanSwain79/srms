<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link rel="stylesheet" href="./styles.css">
    
</head>
<style>
    body{background: linear-gradient(90deg, green, red);}
     form{height: 700px;}
</style>
<body>
    <h1>Welcome</h1>
    <form method="post">
        <input type="number" name="roll" placeholder="Roll number">
        <input type="text" name="password" placeholder="Password">
        <input type="text" name="name" placeholder="Name">
        <input type="number" name="phy" placeholder="Physics">
        <input type="number" name="chem" placeholder="Chemistry">
        <input type="number" name="math" placeholder="Mathematics">
        <input type="number" name="cs" placeholder="CS">
        
        <button type="submit" class="btn">Submit</button>
    </form>
    <footer>&copy;All Rights Reserved | 2021</footer>
</body>
</html>

<?php
    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        
        include 'conn/dbconnect.php';
        $roll = $_POST['roll'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phy = $_POST['phy'];
        $chem = $_POST['chem'];
        $math = $_POST['math'];
        $cs = $_POST['cs'];
        $score = $phy + $chem + $math + $cs;
        $grade = NULL;
        if($score/4>=90){
            $grade = "O";
        }else if($score/4>=80){
            $grade = "E";
        }else if($score/4>=70){
            $grade = "A";
        }else if($score/4>=60){
            $grade = "B";
        }else if($score/4>=50){
            $grade = "C";
        }else if($score/4>=40){
            $grade = "E";
        }else if($score/4>=35){
            $grade = "A";
        }else if($score/4<70){
            $grade = "F";
        }

        $sql = "Insert into student (Roll, Password, Name, Physics, Chemistry, Mathematics, CS, Score, grade) values ($roll, '$password', '$name', $phy, $chem, $math, $cs,$score, '$grade')";
        $results = mysqli_query($conn, $sql);

        if($results){
            echo "Inserted Successfully";
        }else{
            echo '<script>alert("Something went wrong")</script>';
        }

    }
?>