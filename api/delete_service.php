<?php
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: service_list.php');
    exit;
}

$id = trim($_POST['id'] ?? '');
if ($id === '') {
    header('Location: service_list.php?error=missing_id');
    exit;
}

$stmt = $conn->prepare("DELETE FROM service WHERE ServiceId=?");
$stmt->bind_param('s', $id);

if ($stmt->execute()) {
    header('Location: service_list.php?ok=deleted');
} else {
    header('Location: service_list.php?error=' . urlencode($stmt->error));
}
exit;
