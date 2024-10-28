<?php
require_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    buatItinerary($title, $description, $date_start, $date_end);
    header("Location: index.php?message=Itinerary berhasil ditambahkan.");
}
?>
