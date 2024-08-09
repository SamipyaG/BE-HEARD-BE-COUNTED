<?php
// Include database connection logic
include_once './backend/logic.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user inputs
    $email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $newPassword = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Check if both email and password are provided
    if (!empty($email) && !empty($newPassword)) {
        // Connect to the database
        $conn = connect(); 

        // Escape user inputs for security
        $email = mysqli_real_escape_string($conn, $email);
        $newPassword = mysqli_real_escape_string($conn, $newPassword);

        // Update the user's password in the database
        $sql = "UPDATE tbl_users SET password='$newPassword' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>
                        alert('Password updated successfully.');
                        window.location.href = 'login.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Email not found.');
                        window.location.href = 'updatepassword.php';
                      </script>";
            }
      

       
        mysqli_close($conn);
    } else {
        echo "<script>
                alert('Please provide both email and new password.');
                window.location.href = 'updatepassword.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request method.');
            window.location.href = 'updatepassword.php';
          </script>";
}
?>
