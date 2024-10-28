<?php
require_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    editItinerary($id, $title, $description, $date_start, $date_end);
    header("Location: index.php?message=Itinerary berhasil diperbarui.");
}
?>
