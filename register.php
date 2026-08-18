<?php

require 'db.php';

if (isset($_POST["register"])) {
   $firstname = trim($_POST["firstname"] ?? "");
   $lastname = trim($_POST["lastname"] ?? "");
   $middlename = trim($_POST["middlename"] ?? "");
   $age = (int)($_POST["age"] ?? 0);
   $gender = strtolower(trim($_POST["gender"] ?? ""));
   $email = trim($_POST["email"] ?? "");
   $password = $_POST["password"] ?? "";
   $confirm_password = $_POST["confirm_password"] ?? "";

   if (empty($firstname) || empty($lastname) || empty($middlename) || $age <= 0 || empty($gender) || empty($email) || empty($password) || empty($confirm_password)) {
       die("All fields are required.");
   }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       die("Please enter a valid email address.");
   }

   if ($password !== $confirm_password) {
       die("Passwords do not match.");
   }

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email); 
   $check->execute();
   $result = $check->get_result();

   if ($result->num_rows > 0) {
       header("Location: alredyexixt.php");
       exit;
   }

   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, middlename, age, gender, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("sssisss", $firstname, $lastname, $middlename, $age, $gender, $email, $hashed_password);

   if ($stmt->execute()) {
       header("Location: login.php");
       exit;
   } else {
       echo "Error: " . $stmt->error;
   }

   $stmt->close();
   $check->close();
   $conn->close();
}
?>