<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    hapusItinerary($id);
    header("Location: index.php?message=Itinerary berhasil dihapus.");
}
?>
