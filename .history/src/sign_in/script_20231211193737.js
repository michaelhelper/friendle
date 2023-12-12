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
        //redirect to home page
      },
      error: function(xhr, status, error) {
        // Handle the error
        console.log(error);
      }
    });
  });
});
function sign_up() {
    //redirect to sign up page
    window.location.href = "../sign_up";
}