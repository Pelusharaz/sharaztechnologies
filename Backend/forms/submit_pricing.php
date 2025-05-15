<?php
require_once '../includes/config.php'; // your existing PDO connection

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = $_POST['title'] ?? '';
        $price = $_POST['price'] ?? '';
        $icon = $_POST['icon'] ?? '';
        $color = $_POST['color'] ?? '';
        $features = $_POST['description'] ?? '';
        $notes = $_POST['note'] ?? '';
        $cta_text = $_POST['cta_text'] ?? 'Get Started'; // fallback value
        $cta_link = $_POST['cta_link'] ?? '#contact';
        $is_featured = isset($_POST['featured']) ? 1 : 0;

        // Optional: unset other featured rows if this is marked featured
        if ($is_featured) {
            $pdo->query("UPDATE pricing SET featured = 0");
        }

        $stmt = $pdo->prepare("INSERT INTO pricing (title, price_label, icon_class, icon_color, features, notes, cta_text, cta_link, featured) 
                               VALUES (:title, :price, :icon, :color, :features, :notes, :cta_text, :cta_link, :featured)");

        $stmt->execute([
            ':title' => $title,
            ':price' => $price,
            ':icon' => $icon,
            ':color' => $color,
            ':features' => $features,
            ':notes' => $notes,
            ':cta_text' => $cta_text,
            ':cta_link' => $cta_link,
            ':featured' => $is_featured
        ]);

        $response['success'] = true;
        $response['message'] = 'Pricing item added successfully.';
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = 'Error: ' . $e->getMessage();
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

// Return JSON if called via AJAX
header('Content-Type: application/json');
echo json_encode($response);
exit;
