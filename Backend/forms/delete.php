<!-- messages delete handler -->
<?php

ob_start(); // Prevent header issues

require_once '../includes/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: ../pages/contacts.php');
    exit;
} else {
    header('Location: ../pages/contacts.php?status=invalid');
    exit;
}
?>