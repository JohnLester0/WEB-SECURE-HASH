<?php
require "db.php"; 


if (isset($_POST["register"])) {
   $fullname = trim($_POST["fullname"]);
   $email = trim($_POST["email"]);
   $password = $_POST["password"];
   $confirm_password = $_POST["confirm_password"];

   if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
       die("All fields are required.");
   }

   if ($password !== $confirm_password) {
       die("Passwords do not match.");
   }

   $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
   // Prepares a parameterized SQL query to look up whether the email
   // already exists in the users table. Using a prepared statement
   // (rather than concatenating $email into the query) prevents SQL injection.

   $check->bind_param("s", $email);
   // Binds $email to the "?" placeholder in the query. "s" tells mysqli
   // the parameter is a string type.

   $check->execute();
   // Runs the prepared query against the database.

   $result = $check->get_result();
   // Retrieves the result set from the executed query as a mysqli_result object.

   if ($result->num_rows > 0) {
       die("Email already exists.");
   }
   // If the query found one or more rows, that email is already registered —
   // stop and reject the registration to enforce unique accounts.

   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   // Hashes the plaintext password using PHP's built-in secure hashing
   // function. PASSWORD_DEFAULT currently maps to bcrypt (the "$2y$..."
   // format from your earlier message), and PHP will automatically pick
   // a stronger algorithm in the future if the default changes.
   // This is the correct way to store passwords — never store plaintext.

   $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
   // Prepares a parameterized INSERT statement to add the new user,
   // again avoiding SQL injection via placeholders.

   $stmt->bind_param("sss", $fullname, $email, $hashed_password);
   // Binds the three values to the three "?" placeholders, all as
   // strings ("sss").

   if ($stmt->execute()) {
       header("Location: login.php?success=1");
       exit();
   } else {
       echo "Error: " . $stmt->error;
   }
   // Runs the INSERT. On success, confirms registration; on failure,
   // outputs the mysqli error message (useful for debugging, though in
   // production you'd typically log this instead of showing it to users).

   $stmt->close();
   // Frees the resources associated with the INSERT prepared statement.

   $check->close();
   // Frees the resources associated with the SELECT prepared statement.

   $conn->close();
   // Closes the database connection.
}
?>