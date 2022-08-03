<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: ../regis-login/login.php");
    exit;
}

require '../functions/functions.php';

$id = $_GET["id"];

if( delete($id) > 0 ) {
    echo "
        <script>
            alert('Data has been deleted succsessfully!');
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

?>