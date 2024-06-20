<?php
function connect() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Voting";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Establish the database connection
$conn = connect();

// Loop to insert values from 78400 to 78433
for ($crn = 78400; $crn <= 78433; $crn++) {
    $sql = "INSERT INTO crn_number (crn) VALUES (?)";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the variable to the prepared statement as an integer
        $stmt->bind_param("i", $crn);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record inserted successfully: $crn\n";
        } else {
            echo "Error inserting record: " . $stmt->error . "\n";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error . "\n";
    }
}

// Close the database connection
$conn->close();
?>
