<?php
// Include your database connection file (dbConnection.php) here
include '../';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated values from the form
    $patientId = $_POST['patientId'];
    $newNIC = $_POST['nic'];
    $newName = $_POST['name'];
    $newAge = $_POST['age'];
    $newEmail = $_POST['email'];
    $newClinicId = $_POST['clinic_id'];
    $newAddress = $_POST['address'];
    $newPatientType = $_POST['patientType'];
    $newContact = $_POST['contact'];
    
    // Add more fields as needed

    // Prepare and execute an SQL UPDATE query to update the patient's record
    $query = "UPDATE patient_basic SET 
              nic_number=?, 
              name=?, 
              age=?, 
              email=?, 
              clinic_id=?, 
              address=?, 
              patient_type=?, 
              contact_number=?
              WHERE clinic_id=?";

    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssssssi", $newNIC, $newName, $newAge, $newEmail, $newClinicId, $newAddress, $newPatientType, $newContact, $patientId);
        
        if ($stmt->execute()) {
            // Update successful
            $stmt->close();
            $mysqli->close();
            header("Location: patientinformation.php"); // Redirect to your page
            exit();
        } else {
            // Update failed
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        // Query preparation error
        echo "Query preparation error: " . $mysqli->error;
    }
}
?>
