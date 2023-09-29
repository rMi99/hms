<?php include 'header.php'; ?>


<span class="dashboard">Patient Registration</span>
</div>

<?php include 'user.php'; ?>
</nav>
<!-- close title section -->


<div class="home-content">

  <div class="card" id="openModalBtnDMC">
    <!-- <button id="openModalBtn">Open Modal</button> -->
    <img src="images/diabeticPR.png" class="imgCard" alt="Avatar" style="width:100%">

  </div>
  <div class="card" style="margin-left: 10%;" id="openModalBtnENC">
    <img src="images/EndocrinePR.png" class="imgCard" alt="Avatar" style="width:100%">
  </div>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal();">&times;</span>
      <h2 id="modal-heading">Patient Registration</h2>

      <form id="patientForm" method="post" action="save_patient.php">



        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <label for="nic">NIC:</label>
        <input type="text" name="nic" id="nic" required>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" required>


        <input type="hidden" name="patientType" id="patientTypeInput" value="">


        <div class="modal-buttons">
          <button type="submit">Save</button>
          <button type="button" id="clearBtn">Clear</button>
          <button type="button" onclick="closeModal()" id="cancelBtn">Cancel</button>

        </div>
      </form>
    </div>
  </div>



  <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var modalHeading = document.getElementById("modal-heading");
    var patientTypeInput = document.getElementById("patientTypeInput");

    // Get the button that opens the modal
    var btnDmc = document.getElementById("openModalBtnDMC");
    var btnEnc = document.getElementById("openModalBtnENC");

    // Get the <span> element that closes the modal
    var closeBtns = document.getElementsByClassName("close");

    // When the user clicks the button, open the modal
    btnEnc.onclick = function() {
      modalHeading.innerText = "Endocrine Patient Registration";

      modal.style.display = "block";
      patientTypeInput.value = "enc";

    };

    btnDmc.onclick = function() {
      modalHeading.innerText = "Diabetic Patient Registration";

      modal.style.display = "block";
      patientTypeInput.value = "dmc";
    };

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < closeBtns.length; i++) {
      closeBtns[i].onclick = function() {
        modal.style.display = "none";
      };
    }

    function closeModal() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        // modal.style.display = "none";
        closeModal();
      }
    };

    document.getElementById("cancelBtn").addEventListener("click", function() {
      closeModal();
    });


    // Clear form fields when the Clear button is clicked
    document.getElementById("clearBtn").addEventListener("click", function() {
      document.getElementById("patientForm").reset();
    });


    // alert("Data saved successfully!");
    modal.style.display = "none"; // Close the modal
    document.getElementById("patientForm").reset(); // Clear the form
  </script>


  <?php include 'footer.php'
  ?>