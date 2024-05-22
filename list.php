<?php
require 'db.php';

// if (!isset($_SESSION['user_id'])) {
//     // header('Location: login.php');
//     // exit;
// }
// $user_id = $_SESSION['user_id'];
$user_id="1";

$stmt = $pdo->prepare("SELECT contact_id,fullname,phone,email FROM Contacts WHERE user_id = :user_id");
$stmt->execute([':user_id' => $user_id]);
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($contacts);