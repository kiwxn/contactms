<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // header('Location: login.php');
    // exit;
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_id = 1; //$_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO Contacts (user_id, fullname, phone, email) VALUES (:user_id, :fullname, :phone, :email)");
    $stmt->execute([
        ':user_id' => $user_id,
        ':fullname' => $fullname,
        ':phone' => $phone,
        ':email' => $email
    ]);
    echo $_POST['id'];
}
?>
