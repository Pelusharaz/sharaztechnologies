<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../composure/vendor/autoload.php';
require_once '../includes/config.php'; // Your DB config

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Subject and message are required.']);
        exit;
    }

    // Fetch subscriber emails
    $stmt = $pdo->query("SELECT email FROM newsletter_subscribers");
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $mail = new PHPMailer(true);
    $successCount = 0;

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sharaztechs@gmail.com'; // <-- your Gmail
        $mail->Password = 'lsos qdht vhmr tzhd';   // <-- app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('sharaztechs@gmail.com', 'Sharaz Technologies');

        foreach ($emails as $email) {
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->send()) {
                $successCount++;
            }
        }

        echo json_encode(['status' => 'success', 'message' => "Bulk email sent to $successCount subscribers."]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}

?>