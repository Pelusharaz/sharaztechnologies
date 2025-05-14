<!-- messages delete handler -->
<?php
ob_start();
require_once '../includes/config.php';

if (isset($_GET['id'], $_GET['type']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    switch ($type) {
        case 'contact':
            $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: ../pages/contacts.php');
            exit;

        case 'newsletter':
            $stmt = $pdo->prepare("DELETE FROM newsletter_subscribers WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: ../pages/newsletter.php');
            exit;

        default:
            header('Location: ../pages/dashboard.php?status=invalid_type');
            exit;
    }
} else {
    header('Location: ../pages/dashboard.php?status=invalid');
    exit;
}
?>



<!-- messages delete handler  -->
