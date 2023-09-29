<?php
// Include your database connection file (dbConnection.php)
include './dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted via POST request

    // Check if the 'id' parameter is set in the POST request
    if (isset($_POST['id'])) {
        // Sanitize and get the patient ID from the POST request
        $patientID = $_POST['id'];

        // Prepare a DELETE statement to delete the patient record
        $deleteQuery = "DELETE FROM patient_basic WHERE id = ?";

        // Use a prepared statement to prevent SQL injection
        $stmt = $mysqli->prepare($deleteQuery);
        if ($stmt) {
            // Bind the parameter
            $stmt->bind_param("i", $patientID);

            // Execute the statement
            if ($stmt->execute()) {
                // Deletion was successful
                header('Location: your_page.php'); // Redirect to your page
                exit();
            } else {
                // Error in execution
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Error in preparing the statement
            echo "Error: " . $mysqli->error;
        }

        // Close the database connection
        $mysqli->close();
    } else {
        // 'id' parameter is not set in the POST request
        echo "Invalid request";
    }
}
?>
