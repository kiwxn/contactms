<?php
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }

require 'db.php';

if (isset($POST['id'])) {
    $contact_id = $POST['id'];
    $user_id =1 ;//$_SESSION['user_id'];

    // Fetch the contact details to be edited
    $stmt = $pdo->prepare("SELECT * FROM Contacts WHERE contact_id = :contact_id AND user_id = :user_id");
    $stmt->execute([':contact_id' => $contact_id, ':user_id' => $user_id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        echo "Contact not found or you do not have permission to edit this contact.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $photo = "url";//$_POST['photo'];
    $user_id =1;// $_SESSION['user_id'];

    // Update the contact details
    $stmt = $pdo->prepare("UPDATE Contacts SET fullname = :fullname, phone = :phone, email = :email WHERE contact_id = :contact_id AND user_id = :user_id");
    $stmt->execute([':fullname' => $fullname, ':phone' => $phone, ':email' => $email, ':contact_id' => $contact_id, ':user_id' => $user_id]);
    echo $contact_id;
   
    // $stmt = $pdo->prepare("UPDATE Contacts SET fullname = :fullname, phone = :phone, email = :email, photo = :photo WHERE contact_id = :contact_id AND user_id = :user_id");
    // $stmt->execute([':fullname' => $fullname, ':phone' => $phone, ':email' => $email, ':photo' => $photo, ':contact_id' => $contact_id, ':user_id' => $user_id]);
    // header('Location: contacts.html');

    exit;
}
