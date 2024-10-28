<?php
require_once 'db_travelplanner_db.php';

function buatPengguna($nama_lengkap, $nama, $nomor_hp, $email, $username, $password) {
    global $conn;
    $sql = "INSERT INTO users (nama_lengkap, nama, nomor_hp, email, username, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nama_lengkap, $nama, $nomor_hp, $email, $username, $password);
    return $stmt->execute();
}

function dapatkanPengguna() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function buatItinerary($title, $description, $date_start, $date_end) {
    global $conn;
    $sql = "INSERT INTO itineraries (title, description, date_start, date_end) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $description, $date_start, $date_end);
    return $stmt->execute();
}

function dapatkanItinerary() {
    global $conn;
    $sql = "SELECT * FROM itineraries ORDER BY date_start ASC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function editItinerary($id, $title, $description, $date_start, $date_end) {
    global $conn;
    $sql = "UPDATE itineraries SET title = ?, description = ?, date_start = ?, date_end = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $date_start, $date_end, $id);
    return $stmt->execute();
}

function hapusItinerary($id) {
    global $conn;
    $sql = "DELETE FROM itineraries WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>