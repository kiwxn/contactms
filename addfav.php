<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // header('Location: login.php');
    // exit;
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $user_id = 1;//$_SESSION['user_id'];
    $contact_id = $_POST['id'];

    // Check if the contact is already in the favorites list
    $stmt = $pdo->prepare("SELECT * FROM Favorites WHERE user_id = :user_id AND contact_id = :contact_id");
    $stmt->execute(['user_id' => $user_id, 'contact_id' => $contact_id]);
    $favorite = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$favorite) {
        // Add the contact to the favorites list
        $stmt = $pdo->prepare("INSERT INTO Favorites (user_id, contact_id) VALUES (:user_id, :contact_id)");
        $stmt->execute(['user_id' => $user_id, 'contact_id' => $contact_id]);

        echo "Contact added to favorites successfully.";
    } else {
        echo "This contact is already in your favorites list.";
    }
}
?>