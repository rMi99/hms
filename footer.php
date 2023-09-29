 
    </section>

    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  var imgElement = document.getElementById("logoimg");

  sidebarBtn.onclick = function () {
    sidebar.classList.toggle("active");

    if (sidebar.classList.contains("active")) {
      var imgElement = document.getElementById("logoimg");
      imgElement.src = "images/logo2.png";
         imgElement.style.marginLeft = "-10%";
         imgElement.style.marginTop = "30px";
     imgElement.style.minwidth = "82px";
      sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else
    {
     var imgElement = document.getElementById("logoimg");
     imgElement.src = "images/logo.png";
     imgElement.style.marginLeft = "25%";
     imgElement.style.marginTop = "17px";
       sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    
    }
  };



  
    // Push a new state to the browser's history
    window.history.pushState(null, null, window.location.href);

    // Detect the "popstate" event (triggered when the user clicks the "Back" button)
    window.addEventListener("popstate", function(event) {
        // Push another state to prevent the user from going back
        window.history.pushState(null, null, window.location.href);
        // Display a custom message (optional)
        // alert("You cannot go back in this step of the process.");


        Swal.fire({
        title: "Warning!",
        text: "You cannot go back in this step of the process.",
        icon: "error",
        customClass: {
            container: "light-background"
        }
    });


    });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
