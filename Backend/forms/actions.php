<!-- messages delete handler -->
<?php
ob_start();
require_once '../includes/config.php';

// -------- DELETE ACTION (GET) --------
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'], $_GET['type'], $_GET['action']) && $_GET['action'] === 'delete' && is_numeric($_GET['id'])) {
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

        case 'pricing':
            $stmt = $pdo->prepare("DELETE FROM pricing WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: ../pages/pricing.php?status=deleted');
            exit;

        default:
            header('Location: ../pages/dashboard.php?status=invalid_type');
            exit;
    }
}

// -------- FEATURE TOGGLE (POST) --------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['action']) && $_POST['action'] === 'feature') {
    $id = intval($_POST['id']);

    $stmt = $pdo->prepare("SELECT featured FROM pricing WHERE id = ?");
    $stmt->execute([$id]);
    $current = $stmt->fetchColumn();

    $newVal = $current ? 0 : 1;

    $update = $pdo->prepare("UPDATE pricing SET featured = ? WHERE id = ?");
    $update->execute([$newVal, $id]);

    header("Location: ../pages/pricing.php?status=updated");
    exit;
}

// -------- FALLBACK --------
header('Location: ../pages/dashboard.php?status=invalid_request');
exit;
?>
<!-- messages delete handler  -->

