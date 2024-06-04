<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // header('Location: login.php');
    // exit;
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_id = $_POST['id'];
    echo $contact_id;
    $user_id = 1;//$_SESSION['user_id'];

    // Ensure the contact belongs to the logged-in user
    $stmt = $pdo->prepare("DELETE FROM Contacts WHERE contact_id = :contact_id AND user_id = :user_id");
    $stmt->execute([':contact_id' => $contact_id, ':user_id' => $user_id]);
    // header('Location: contacts.html');
    exit;
}
