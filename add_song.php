<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $duration = $_POST['duration'];
    $release_date = $_POST['release_date'];

    $stmt = $conn->prepare("INSERT INTO songs (title, artist, album, duration, release_date) VALUES (:title, :artist, :album, :duration, :release_date)");
    $stmt->execute([':title' => $title, ':artist' => $artist, ':album' => $album, ':duration' => $duration, ':release_date' => $release_date]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Song</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Song</h1>
        <form method="post">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Enter song title" required>
            </div>
            <div class="form-group">
                <input type="text" name="artist" class="form-control" placeholder="Enter artist name" required>
            </div>
            <div class="form-group">
                <input type="text" name="album" class="form-control" placeholder="Enter album name" required>
            </div>
            <div class="form-group">
                <input type="text" name="duration" class="form-control" placeholder="Enter duration" required>
            </div>
            <div class="form-group">
                <input type="date" name="release_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Song</button>
            <a href="index.php" class="btn btn-secondary">Back to Playlist</a>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
