function callSignIpWithInputValues() {
    //get input values
    const email = document.getElementById("usernameInput").value;
    const password = document.getElementById("passwordInput").value;
    const formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    //send request to server
    
    
}
function sign_up() {
    //redirect to sign up page
    window.location.href = "../sign_up";
}