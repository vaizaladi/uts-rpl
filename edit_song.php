<?php
include 'config.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM songs WHERE id = :id");
$query->execute([':id' => $id]);
$song = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $duration = $_POST['duration'];
    $release_date = $_POST['release_date'];

    $stmt = $conn->prepare("UPDATE songs SET title = :title, artist = :artist, album = :album, duration = :duration, release_date = :release_date WHERE id = :id");
    $stmt->execute([':title' => $title, ':artist' => $artist, ':album' => $album, ':duration' => $duration, ':release_date' => $release_date, ':id' => $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Song</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Song</h1>
        <form method="post">
            <div class="form-group">
                <input type="text" name="title" value="<?php echo htmlspecialchars($song['title']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="artist" value="<?php echo htmlspecialchars($song['artist']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="album" value="<?php echo htmlspecialchars($song['album']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="duration" value="<?php echo htmlspecialchars($song['duration']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="date" name="release_date" value="<?php echo htmlspecialchars($song['release_date']); ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Song</button>
            <a href="index.php" class="btn btn-secondary">Back to Playlist</a>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
