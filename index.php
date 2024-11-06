<?php
include 'config.php';

// Menyiapkan dan mengeksekusi query
$sql = "SELECT * FROM songs";
$stmt = $conn->prepare($sql);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Playlist App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center text-primary">Music Playlist</h1>
        <a href="add_song.php" class="btn btn-success mb-3">Add New Song</a>
        <ul class="list-group">
            <?php
            // Mengambil data lagu dari hasil query
            if ($stmt->rowCount() > 0) {
                // Mengambil semua data sebagai array asosiatif
                while ($song = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo '<div>';
                    echo '<strong>' . htmlspecialchars($song['title']) . '</strong><br>';
                    echo 'Artis: ' . htmlspecialchars($song['artist']) . '<br>';
                    echo 'Album: ' . htmlspecialchars($song['album']) . '<br>';
                    echo 'Durasi: ' . htmlspecialchars($song['duration']) . '<br>';
                    echo 'Tanggal Rilis: ' . htmlspecialchars($song['release_date']);
                    echo '</div>';
                    echo '<span>';
                    echo '<a href="edit_song.php?id=' . $song['id'] . '" class="btn btn-warning btn-sm">Edit</a>';
                    echo '<a href="delete_song.php?id=' . $song['id'] . '" class="btn btn-danger btn-sm">Delete</a>';
                    echo '</span>';
                    echo '</li>';
                }
            } else {
                echo '<li class="list-group-item">Tidak ada lagu ditemukan</li>';
            }
            ?>
        </ul>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $conn = null; // Menutup koneksi PDO ?>
