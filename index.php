<?php
require_once 'function.php';

$itineraries = dapatkanItinerary();
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="title-link">Travel Planner</a>
        <div class="admin">Admin</div>
    </div>

    <div class="container">
        <h2>Daftar Itinerary</h2>
        <button id="btnTambah" class="btn">Tambah Itinerary</button>

        <div id="popupForm" class="popup">
            <div class="popup-content">
                <span id="closePopup" class="close">&times;</span>
                <h3>Tambah Itinerary</h3>
                <form method="POST" action="tambah_itinerary.php">
                    <label for="title">Judul:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Deskripsi:</label>
                    <textarea id="description" name="description" required></textarea>
                    <label for="date_start">Tanggal Mulai:</label>
                    <input type="date" id="date_start" name="date_start" required>
                    <label for="date_end">Tanggal Selesai:</label>
                    <input type="date" id="date_end" name="date_end" required>
                    <input type="submit" value="Tambah Itinerary">
                </form>
            </div>
        </div>

        <div id="popupEditForm" class="popup">
            <div class="popup-content">
                <span id="closeEditPopup" class="close">&times;</span>
                <h3>Edit Itinerary</h3>
                <form id="editForm" method="POST" action="edit_itinerary.php">
                    <input type="hidden" id="edit_id" name="id">
                    <label for="edit_title">Judul:</label>
                    <input type="text" id="edit_title" name="title" required>
                    <label for="edit_description">Deskripsi:</label>
                    <textarea id="edit_description" name="description" required></textarea>
                    <label for="edit_date_start">Tanggal Mulai:</label>
                    <input type="date" id="edit_date_start" name="date_start" required>
                    <label for="edit_date_end">Tanggal Selesai:</label>
                    <input type="date" id="edit_date_end" name="date_end" required>
                    <input type="submit" value="Edit Itinerary">
                </form>
            </div>
        </div>

        <div id="notificationPopup" class="popup-notification">
            <div class="popup-notification-content">
                <span id="closeNotification" class="close">&times;</span>
                <p id="notificationMessage"><?php echo $message; ?></p>
            </div>
        </div>

        <?php if (empty($itineraries)) { ?>
            <p>Belum ada itinerary.</p>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($itineraries as $itinerary) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $itinerary['title']; ?></td>
                            <td><?php echo $itinerary['description']; ?></td>
                            <td><?php echo $itinerary['date_start']; ?></td>
                            <td><?php echo $itinerary['date_end']; ?></td>
                            <td>
                                <button class="btn-edit" onclick="editItinerary(<?php echo $itinerary['id']; ?>, '<?php echo $itinerary['title']; ?>', '<?php echo $itinerary['description']; ?>', '<?php echo $itinerary['date_start']; ?>', '<?php echo $itinerary['date_end']; ?>')">Edit</button>
                                <button class="btn-delete" onclick="hapusItinerary(<?php echo $itinerary['id']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
