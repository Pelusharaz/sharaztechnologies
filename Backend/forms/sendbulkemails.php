<?php
header('Content-Type: application/json');
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Subject and message are required.']);
        exit;
    }

    // Fetch all subscribers
    $stmt = $pdo->query("SELECT email FROM newsletter_subscribers");
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Send emails (using mail() for example, in real life use PHPMailer/SMTP)
    $successCount = 0;
    foreach ($emails as $email) {
        $headers = "From: sharaztechs@gmail.com\r\nContent-Type: text/plain; charset=UTF-8";
        if (mail($email, $subject, $message, $headers)) {
            $successCount++;
        }
    }

    echo json_encode(['status' => 'success', 'message' => "Bulk email sent to $successCount subscribers."]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
