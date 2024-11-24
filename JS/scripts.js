// Get the logout button
var logoutBtn = document.getElementById("logoutBtn");

// When the user clicks the logout button, confirm logout
logoutBtn.onclick = function() {
    var confirmation = confirm("Are you sure you want to log out?");
    
    if (confirmation) {
        
        window.location.href = "index.php";
        // Add your logout functionality here, like redirecting or clearing session
        // window.location.href = "/logout"; // Example redirect to logout URL
    } else {
        
    }
}
