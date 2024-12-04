
<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=ymviqste_inventory', 'ymviqste_SomaliaInventory', 'w2ctv;;_N4jq');

// Retrieve reset code and new password from form
$reset_code = $_POST['reset_code'];
$new_password = $_POST['new_password'];

// Check if code is valid
$stmt = $pdo->prepare('SELECT id FROM login WHERE password = ?');
$stmt->execute([$reset_code]);
$user = $stmt->fetch();

if (!$user) {
    // If  code is invalid,  back to reset_password.php with an error message
    header('Location: reset_password.php?error=Invalid reset code');
    exit;
}

// Update user's password in the database
$hashed_password = $new_password;
$stmt = $pdo->prepare('UPDATE users SET password = ?  WHERE id = ?');
$stmt->execute([$hashed_password, $user['id']]);


header('Location: login.php?message=Password reset successfully');
exit;
// 
