<?php
// Retrieve form data
// $clinicId = $_POST['clinicId'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$address = $_POST['address'];
$nic = $_POST['nic'];
$contact = $_POST['contact'];
$patientType = $_POST['patientType'];
$nic = $_POST['nic'];



// Connect to your database (replace placeholders with your actual database credentials)
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cpm_dmc_enc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO patient_basic (gender, nic_number , name,age,patient_type, email, contact_number,address) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("sssissss",   $gender,$nic,$name, $age, $patientType,  $email,$contact, $address);

// Execute the statement
if ($stmt->execute()) {

    $successMessage = "Patient Registered successfully.";
    // $stmt->close();
    // $conn->close();

} else {

    $errorMessage = "Error occurred while inserting data. You Alredy Registered! ";

}
// var_dump($patientType);
// var_dump($stmt->error);



  $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script>


        <?php if (isset($successMessage)) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo $successMessage; ?>',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to another page after the SweetAlert is closed
                    window.location.href = 'index.php';
                    
                }
            });
        <?php } elseif (isset($errorMessage)) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?php echo $errorMessage; ?>',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to another page after the SweetAlert is closed
                    window.location.href = 'index.php';
                    window.location.replace = 'index.php';
                    
                }
            });
        <?php } 


error_reporting(E_ALL);
ini_set('display_errors', 1);
        ?>
    </script>  



</body>
</html>

