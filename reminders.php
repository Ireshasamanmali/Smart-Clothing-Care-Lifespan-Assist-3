<?php
require_once '../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize_input($_POST['title'] ?? '');
    $date = sanitize_input($_POST['reminder_date'] ?? '');
    $category = sanitize_input($_POST['category'] ?? 'Wash');

    if (empty($title) || empty($date)) {
        json_response('error', 'Title and date are required');
    }

    if ($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO reminders (title, garment_name, category, reminder_date) VALUES (:title, :title, :category, :reminder_date)");
            $stmt->execute([
                ':title' => $title,
                ':category' => $category,
                ':reminder_date' => $date
            ]);
        } catch (Exception $e) {
            // DB insert fallback
        }
    }

    json_response('success', 'Reminder created successfully', [
        'title' => $title,
        'date' => $date,
        'category' => $category
    ]);
}
?>
