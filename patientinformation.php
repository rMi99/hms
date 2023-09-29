<?php include 'header.php'; ?>
<!-- Include DataTables CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .table td, .table th {
    padding: -0.25rem;
    vertical-align: top;
    border-top: -16px solid #dee2e6;
}
</style>
<!-- Initialize DataTable -->
<!-- <script>
    $(document).ready(function () {
        $('#yourTableId').DataTable();
    });
</script> -->

<span class="dashboard">Patient Information</span>
</div>

<div class="profile-details">
    <img src="images/profile.jpg" alt="" />
    <span class="admin_name">RME BOY</span>
    <i class="bx bx-chevron-down"></i>
</div>
</nav>
<!-- close title section -->

<div class="home-content">
    <div class="card" data-toggle="modal" data-target="#patientinfo">
        <img src="images/insertnViewPatirntInformation.png" class="imgCard" alt="Avatar" style="width:100%">
    </div>

    <div class="card" style="margin-left: 10%;" data-toggle="modal" data-target="#patientinfo">
        <img src="images/getsummery.png" class="imgCard" alt="Avatar" style="width:100%">
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="patientinfo">
        <div class="modal-dialog" style="max-width: 90%; ">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1">Patient Basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab2">Patient Advance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab3">Prescription Details</a>
                        </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="row">
                                <!-- Form on the right -->
                                <div class="col-md-4">
                                <form id="patientForm patientinfo" method="post">
                                        <!-- Your form elements go here -->
                                        <!-- Clinic ID -->
                                        <div class="form-group">
                                            <label for="clinic_id">Clinic ID:</label>
                                            <input type="text" name="clinic_id" id="clinic_id" readonly>
                                        </div>
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" required>
                                        </div>
                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <textarea id="address" name="address" required></textarea>
                                        </div>
                                        <!-- NIC -->
                                        <div class="form-group">
                                            <label for="nic">NIC:</label>
                                            <input type="text" name="nic" id="nic" required>
                                        </div>
                                        <!-- Contact -->
                                        <div class="form-group">
                                            <label for="contact">Contact:</label>
                                            <input type="text" name="contact" id="contact" required>
                                        </div>
                                        <!-- Patient Type -->
                                        <div class="form-group">
                                            <label for="patientTypeInput">Patient Type:</label>
                                            <input type="text" name="patientType" id="patientTypeInput" readonly>
                                        </div>
                                        <!-- Save, Clear, and Cancel Buttons -->
                                        <div class="modal-buttons">
                                            <button class="btn" id="updateBtn" onclick="" type="button">Save</button>
                                            <button class="btn danger" type="button" id="clearBtn">Clear</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Table on the left -->
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table" id="patient_details">
                                            <thead>
                                                <tr>
                                                    <th>Clinic id</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Nic Number</th>
                                                    <th>Gender</th>
                                                    <th>Patient_type</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include './dbConnection.php';
                                                // Replace 'your_table_name' with the actual name of your database table
                                                $query = "SELECT * FROM patient_basic";
                                                $result = $mysqli->query($query);

                                                if (!$result) {
                                                    die("Query failed: " . $mysqli->error);
                                                }

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['clinic_id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['age'] . "</td>";
                                                    echo "<td>" . $row['nic_number'] . "</td>";
                                                    
                                                    echo "<td>" . $row['gender'] . "</td>";
                                                    echo "<td>" . $row['patient_type'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['address'] . "</td>";
                                                    echo "<td>" . $row['contact_number'] . "</td>";
                                                    echo "<td>";
                                                    echo "<button class='editBtn' data-id='" . $row['id'] . "'><span class='bi bi-pencil'></span> Edit</button>";
                                                   
  // Trigger SweetAlert for delete inside the echo
  echo "<button class='deleteBtn' data-id='" . $row['id'] . "' onclick=\"deletePatient(" . $row['id'] . ")\">Delete</button>";
    

                                                    echo "</td>";
                                                    echo "</tr>";
                                                }

                                                $result->close();
                                                ?>
                                                <!-- Add more table rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <div class="row">
                                <!-- Form on the right -->
                                <div class="col-md-4">
                                <form id="patientForm patientinfo" method="post" >
                                        <!-- Your form elements go here -->
                                        <!-- Clinic ID -->
                                        <div class="form-group">
                                            <label for="clinic_id">Clinic ID:</label>
                                            <input type="text" name="clinic_id" id="clinic_id" required>
                                        </div>
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" required>
                                        </div>
                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <textarea id="address" name="address" required></textarea>
                                        </div>
                                        <!-- NIC -->
                                        <div class="form-group">
                                            <label for="nic">NIC:</label>
                                            <input type="text" name="nic" id="nic" required>
                                        </div>
                                        <!-- Contact -->
                                        <div class="form-group">
                                            <label for="contact">Contact:</label>
                                            <input type="text" name="contact" id="contact" required>
                                        </div>
                                        <!-- Patient Type -->
                                        <div class="form-group">
                                            <label for="patientTypeInput">Patient Type:</label>
                                            <input type="text" name="patientType" id="patientTypeInput" required>
                                        </div>
                                        <!-- Save, Clear, and Cancel Buttons -->
                                        <div class="modal-buttons">
                                            <button class="btn" type="submit">Save</button>
                                            <button class="btn danger" type="button" id="clearBtn">Clear</button>

                                        </div>
                                    </form>
                                </div>
                                <!-- Table on the left -->
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Clinic id</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Nic</th>
                                                    
                                                    <th>Gender</th>
                                                    <th>Patient_type</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Same PHP code as tab1
                                                include './dbConnection.php';
                                                $query = "SELECT * FROM patient_basic";
                                                $result = $mysqli->query($query);

                                                if (!$result) {
                                                    die("Query failed: " . $mysqli->error);
                                                }

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['clinic_id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['age'] . "</td>";
                                                    echo "<td>" . $row['nic'] . "</td>";
                                                    echo "<td>" . $row['gender'] . "</td>";
                                                    echo "<td>" . $row['patient_type'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['address'] . "</td>";
                                                    echo "<td>" . $row['contact_number'] . "</td>";
                                                    echo "<td>";
                                                   
                                                    echo "<button class='editBtn' data-id='" . $row['id'] . "'><span class='bi bi-pencil'></span> Edit</button>";
                                                    // Trigger SweetAlert for delete inside the echo
    echo "<button class='deleteBtn' data-id='" . $row['id'] . "' onclick=\"deletePatient(" . $row['id'] . ")\">Delete</button>";
    
                                                    

                                                    echo "</tr>";
                                                }

                                                $result->close();
                                                ?>
                                                <!-- Add more table rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add more tab panes for Tab 3, Tab 4, and Tab 5 with your content -->

                        <!-- Modal body -->
                        <div class="tab-pane" id="tab3">
                            <!-- Tab 3 Content - Form and Table -->
                            <div class="row">
                                <!-- Form on the left -->
                                <div class="col-md-4">
                                    <form id="patientForm patientinfo" method="post" action="save_patient.php">
                                        <!-- Your form elements go here -->
                                        <!-- Clinic ID -->
                                        <div class="form-group">
                                            <label for="clinic_id">Clinic ID:</label>
                                            <input type="text" name="clinic_id" id="clinic_id" readonly>
                                        </div>
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" required>
                                        </div>
                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <textarea id="address" name="address" required></textarea>
                                        </div>
                                        <!-- NIC -->
                                        <div class="form-group">
                                            <label for="nic">NIC:</label>
                                            <input type="text" name="nic" id="nic" required>
                                        </div>
                                        <!-- Contact -->
                                        <div class="form-group">
                                            <label for="contact">Contact:</label>
                                            <input type="text" name="contact" id="contact" required>
                                        </div>
                                        <!-- Patient Type -->
                                        <div class="form-group">
                                            <label for="patientTypeInput">Patient Type:</label>
                                            <input type="text" name="patientType" id="patientTypeInput" required>
                                        </div>
                                        <!-- Save, Clear, and Cancel Buttons -->
                                        <div class="modal-buttons">
                                            <button class="btn" id="updateBtn" type="submit">Save</button>
                                            <button class="btn danger" type="button" id="clearBtn">Clear</button>

                                        </div>
                                    </form>
                                </div>
                                <!-- Table on the right -->
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table" id="yourTableId">
                                            <thead>
                                                <tr>
                                                    <th>Clinic id</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Patient_type</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Mobile No</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Same PHP code as tab1
                                                include './dbConnection.php';
                                                $query = "SELECT * FROM patient_basic";
                                                $result = $mysqli->query($query);

                                                if (!$result) {
                                                    die("Query failed: " . $mysqli->error);
                                                }

                                                
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['clinic_id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['age'] . "</td>";
                                                    echo "<td>" . $row['gender'] . "</td>";
                                                    echo "<td>" . $row['patient_type'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['address'] . "</td>";
                                                    echo "<td>" . $row['contact_number'] . "</td>";
                                                    // ... (other table columns)
                                                
                                                    // Add a form for deleting the record
                                                    echo "<td>";
                                                    echo "<form method='POST' action='delete_patient.php'>";
                                                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                                    echo "<button class='editBtn btn' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#patientinfo'><span class='bi bi-pencil'></span> Edit</button>";

// Add a hidden input field in your form to store the patient ID
echo "<input type='hidden' id='editPatientId' name='editPatientId' value='" . $row['id'] . "'>";

                                                    echo "<button type='submit'>Delete</button>";
                                                    echo "</form>";
                                                    echo "</td>";
                                                
                                                    echo "</tr>";
                                                }
                                                
                                                $result->close();
                                                ?>
                                                <!-- Add more table rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to delete a patient record
    function deletePatient(id) {
        // Send an AJAX request to your delete_patient.php script
        $.ajax({
            url: './api/delete_patient.php', // Replace with your PHP script's URL
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                // Check if the deletion was successful
                if (response.success) {
                    // Show a success message (e.g., using SweetAlert or native alert)
                    alert('Patient record deleted successfully');
                    removeTableRow(id);
                } else {
                    // Show an error message (e.g., using SweetAlert or native alert)
                    alert('Error deleting patient record: ' + response.message);
                }
            },
            error: function () {
                // Show an error message for AJAX request failure
                alert('An error occurred while deleting the patient record.');
                alert(id);

            },
        });
    }

    // Function to remove the deleted row from the HTML table
    function removeTableRow(id) {
        $('#patient_details').find('tr[data-id="' + id + '"]').remove();
    }



      // Event listener for the "Edit" button
      $('.editBtn').click(function () {
        // Get the patient ID from the data attribute
        var patientId = $(this).data('id');
        
        // Set the patient ID in the hidden input field
        $('#editPatientId').val(patientId);
        
        // Populate the form fields with the data of the selected patient record
        $.ajax({
            url: './api/get_patient_data.php', // Replace with your PHP script to fetch patient data
            type: 'POST',
            data: { id: patientId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Populate form fields with the retrieved data
                    $('#nic').val(response.data.nic_number);
                    $('#name').val(response.data.name);
                    $('#age').val(response.data.age);
                    $('#email').val(response.data.email);
                    $('#clinic_id').val(response.data.clinic_id);
                    $('#address').val(response.data.address);
                    $('#patientTypeInput').val(response.data.patient_type);
                    $('#contact').val(response.data.contact_number);

                    
                    // Populate other fields as needed
                } else {
                    alert('Error fetching patient data: ' + response.message);
                }
            },
            error: function () {
                alert('An error occurred while fetching patient data.');
            },
        });
    });


    // Function to update patient data and show a SweetAlert message
    function updatePatientData() {
        // Get the updated values from the form
        var clinicId = $('#clinic_id').val();
        var name = $('#name').val();
        var gender = $('#gender').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var nic = $('#nic').val();
        var contact = $('#contact').val();
        var patientType = $('#patientTypeInput').val();
        
        // ...

        $.ajax({
            url: './api/update_patient.php',
            type: 'POST',
            data: {
                editPatientId: editPatientId,
                clinic_id: clinicId,
                name: name,
                gender: gender,
                email: email,
                address: address,
                nic: nic,
                contact: contact,
                patientType: patientType
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Show a success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Patient record updated successfully!',
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            // Optionally, you can reload the page or perform other actions
                            location.reload(); // Reload the page
                        }
                    });
                } else {
                    // Show an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error updating patient record: ' + response.message,
                    });
                }
            },
            error: function () {
                // Show an error message for AJAX request failure
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating the patient record.',
                });
            },
        });
    }

    // Call the updatePatientData function when the "Save" button is clicked
    $('#updateBtn').click(function () {
        updatePatientData();
    });
</script>



<?php include 'footer.php'; ?>
