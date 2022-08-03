<?php
session_start();

// if( !isset($_SESSION["login"]) ) {
//     header("Location: regis-login/login.php");
//     exit;
// }

require 'functions/functions.php';

$english = query("SELECT * FROM english LIMIT $firstData, $totalDataPerPage");

// searchbar
if( isset($_POST["search"]) ) {
    $english = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Katalog Buku</title>
    <style>
        ul li {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <!-- <a href="regis-login/logout.php">Sign out</a> -->

    <div class="container mt-5">

        <h1>Daftar Buku Perpustakaan SMPK Anugerah</h1>
        <!-- insert -->
        <!-- <a href="features/insert.php">Add New Seiyuu</a> -->

        <!-- searchbar -->
        <form action="" method="POST">
            <input type="text" placeholder="Cari judul buku..." autocomplete="off" autofocus name="keyword" size="30" id="keyword" >
            <button type="submit" name="search" id="search-button" >Search</button>
        </form>

        <div id="container">

            <table border="1" cellpadding="5" cellspacing:"0" class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>

                <?php $num = 1 ?>
                <?php foreach ($english as $book) : ?>
                    <tbody>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $book["title"]; ?></td>
                            <td><?= $book["author"]; ?></td>
                            <td><?= $book["publisher"]; ?></td>
                            <!-- <td>
                                <a href="features/update.php?id=<?= $va["id"] ?>">Update</a> |
                                <a href="features/delete.php?id=<?= $va["id"]; ?>" onclick="return confirm('Are You Sure?'); ">Delete</a>
                            </td> -->
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>

        </div>

    <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <?php if ($activePage > 1) : ?>
                    <a href="?page=<?= $activePage - 1; ?>" class="page-link">Prev</a>
                <?php endif; ?>
            </li>       
            <li class="page-item">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <?php if ($i == $activePage) : ?>
                        <a href="?page= <?= $i; ?> " style="font-weight: bold; color: red; text-decoration: none;" class="page-link"><?= $i; ?></a>
                    <?php else : ?>
                        <a href="?page= <?= $i; ?> " class="page-link"><?= $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </li>
            <li class="page-item">
                <?php if ($activePage < $totalPage) : ?>
                    <a href="?page=<?= $activePage + 1; ?>" class="page-link">Next</a>
                <?php endif; ?>
            </li>
        </ul>

    </div>

<!-- <script src="js/jquery-3.6.0.min.js"></script> -->
<script src="js/script.js"></script>
</body>

</html>