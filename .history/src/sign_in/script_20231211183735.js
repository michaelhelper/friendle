$(document).ready(function() {
  // Add click event listener to the "Log in" button
  $("#loginBtn").click(function() {
    // Get the email and password values
    var email = $("#emailInput").val();
    var password = $("#passwordInput").val();

    // Send AJAX request to the server
    $.ajax({
      url: "../apis/sign_in.php", // Replace with the actual path to your PHP file
      method: "POST",
      data: { email: email, password: password },
      success: function(response) {
        // Handle the response from the server
        // re
        // Set the cookie with the user id
        // ...
      },
      error: function(xhr, status, error) {
        // Handle the error
        console.log(error);
      }
    });
  });
});