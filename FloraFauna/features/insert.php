<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: ../regis-login/login.php");
    exit;
}

require '../functions/functions.php';

// check if button is clicked
if( isset($_POST["submit"]) ) {

    // check if data has been added successfully or not
    if( add($_POST) > 0 ) {
        echo "
            <script>
                alert('Data has been added succsessfully!');
                document.location.href = '../content/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed!');
                document.location.href = '../content/index.php';
            </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li><input type="text" name="name" id="name" placeholder="Name" autocomplete="off" required></li>
        </ul>
        <ul>
            <li><input type="date" name="date" id="date" placeholder="Birthday"></li>
        </ul>
        <ul>
            <li><input type="text" name="prefecture" id="prefecture" placeholder="Prefecture"></li>
        </ul>
        <ul>
            <li><input type="file" name="picture" id="picture"></li>
        </ul>
        <ul>
            <button name="submit">Add</button>
        </ul>
    </form>
    
</body>
</html>