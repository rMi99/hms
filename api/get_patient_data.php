<?php
// Include your database connection file (dbConnection.php) here
include '../dbConnection.php';

// Check if the patient ID is provided via POST
if (isset($_POST['id'])) {
    $patientId = $_POST['id'];

    // Prepare and execute a query to fetch patient data based on the ID
    $query = "SELECT * FROM patient_basic WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("i", $patientId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            // Fetch the patient data
            $patientData = $result->fetch_assoc();
            
            // Close the database connection and the prepared statement
            $stmt->close();
            $mysqli->close();
            
            // Return the patient data as JSON response
            $response = [
                'success' => true,
                'data' => $patientData,
            ];
            echo json_encode($response);
        } else {
            // No patient data found for the provided ID
            $response = [
                'success' => false,
                'message' => 'Patient not found',
            ];
            echo json_encode($response);
        }
    } else {
        // Error in preparing the query
        $response = [
            'success' => false,
            'message' => 'Query preparation error',
        ];
        echo json_encode($response);
    }
} else {
    // Patient ID not provided via POST
    $response = [
        'success' => false,
        'message' => 'Patient ID not provided',
    ];
    echo json_encode($response);
}
?>
