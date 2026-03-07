<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?error=Invalid request method.');
    exit;
}

$studentName = trim($_POST['student_name'] ?? '');
$parentName = trim($_POST['parent_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$classApplied = trim($_POST['class_applied'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($studentName === '' || $parentName === '' || $phone === '' || $classApplied === '') {
    header('Location: index.php?error=Please fill all required fields.');
    exit;
}

if (!preg_match('/^\d{10}$/', $phone)) {
    header('Location: index.php?error=Phone number must be 10 digits.');
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=Please provide a valid email address.');
    exit;
}

$sql = 'INSERT INTO admission_queries (student_name, parent_name, phone, email, class_applied, message)
        VALUES (:student_name, :parent_name, :phone, :email, :class_applied, :message)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':student_name' => $studentName,
    ':parent_name' => $parentName,
    ':phone' => $phone,
    ':email' => $email !== '' ? $email : null,
    ':class_applied' => $classApplied,
    ':message' => $message !== '' ? $message : null,
]);

header('Location: index.php?success=Your admission query has been submitted successfully.');
exit;
