<?php
require 'db.php';

if (isset($POST['id'])) {
    $contact_id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM Contacts WHERE contact_id = :contact_id");
    $stmt->execute([':contact_id' => $contact_id]);

    header('Location: index.php');
} else {
    header('Location: index.php/x');
}
