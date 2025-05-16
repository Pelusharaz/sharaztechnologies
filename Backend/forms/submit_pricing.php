<?php
ob_start();
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    // Common inputs
    $title = $_POST['title'] ?? '';
    $price = $_POST['price'] ?? '';
    $icon = $_POST['icon'] ?? '';
    $color = $_POST['color'] ?? '';
    $desc = $_POST['description'] ?? '';
    $cta_text = $_POST['cta_text'] ?? '';
    $cta_link = $_POST['cta_link'] ?? '';
    $note = $_POST['note'] ?? '';
    $featured = isset($_POST['featured']) ? 1 : 0;
    $featuresFormatted = trim(preg_replace('/\s*;\s*/', "\n", $desc));

    try {
        if ($action === 'add') {
            $stmt = $pdo->prepare("INSERT INTO pricing (title, price_label, icon_class, icon_color, features, cta_text, cta_link, notes, featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $price, $icon, $color, $featuresFormatted, $cta_text, $cta_link, $note, $featured]);
            header("Location: ../pages/pricing.php?status=success");
            exit;
        }

        if ($action === 'update' && $id) {
            $stmt = $pdo->prepare("UPDATE pricing SET title=?, price_label=?, icon_class=?, icon_color=?, features=?, cta_text=?, cta_link=?, notes=?, featured=? WHERE id=?");
            $stmt->execute([$title, $price, $icon, $color, $featuresFormatted, $cta_text, $cta_link, $note, $featured, $id]);
            header("Location: ../pages/pricing.php?status=updated");
            exit;
        }

        if ($action === 'feature' && $id) {
            $stmt = $pdo->prepare("SELECT featured FROM pricing WHERE id = ?");
            $stmt->execute([$id]);
            $current = $stmt->fetchColumn();
            $newVal = $current ? 0 : 1;
            $stmt = $pdo->prepare("UPDATE pricing SET featured = ? WHERE id = ?");
            $stmt->execute([$newVal, $id]);
            header("Location: ../pages/pricing.php?status=updated");
            exit;
        }
    } catch (Exception $e) {
        header("Location: ../pages/pricing.php?status=error");
        exit;
    }
}


// Fallback
header("Location: ../pages/pricing.php?status=error");
exit;

