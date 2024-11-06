<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM songs WHERE id = :id");
$stmt->execute([':id' => $id]);
header('Location: index.php');
?>
