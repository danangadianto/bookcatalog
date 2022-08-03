<?php 

require '../functions/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM books 
            WHERE
            title LIKE '%$keyword%'
        ";

$books = query($query);

?>

<script src="../js/script.js"></script>

<table border="1" cellpadding="5" cellspacing:"0" class="table table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
        </tr>
    </thead>

    <?php $num = 1 ?>
    <?php foreach ($books as $book) : ?>
        <tbody>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $book["title"]; ?></td>
                <td><?= $book["author"]; ?></td>
                <td><?= $book["publisher"]; ?></td>
                <!-- <td>
                    <a href="../features/update.php?id=<?= $va["id"] ?>">Update</a> |
                    <a href="../features/delete.php?id=<?= $va["id"]; ?>" onclick="return confirm('Are You Sure?'); ">Delete</a>
                </td> -->
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
