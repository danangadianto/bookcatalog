<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

$conn = mysqli_connect("localhost", "root", "", "library");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
        return $rows;
}

// PHP Pagination

$totalDataPerPage = 25;
$totalData = count(query("SELECT * FROM travelling"));
$totalPage = ceil($totalData / $totalDataPerPage);
$activePage = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$firstData = ( $totalDataPerPage * $activePage ) - $totalDataPerPage;

// Function to search
function search($keyword) {
    $query = "SELECT * FROM travelling
                WHERE
            title LIKE '%$keyword%'
            ";
    
    return query($query);
}

?>