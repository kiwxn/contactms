<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // header('Location: login.php');
    // exit;
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO Contacts (user_id, name, email, phone) VALUES (:user_id, :name, :email, :phone)");
    $stmt->execute([':user_id' => $user_id, ':name' => $name, ':email' => $email, ':phone' => $phone]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>
    <form action="add_contact.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <input type="submit" value="Add Contact">
    </form>
    <br>
    <a href="index.php">Back to Contact List</a>
</body>
</html>
