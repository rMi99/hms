let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
let logo = document.querySelector(".logoimg");

sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  document.getElementById("logoimg").src = "images/profile.jpg";
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}


// modal
