function callSignIpWithInputValues() {
    //get input values
    var email = document.getElementById("email").value;
    var password = document.getElementById("").value;
    //call sign in function
    sign_in(email, password);
}
function sign_up() {
    //redirect to sign up page
    window.location.href = "../sign_up";
}