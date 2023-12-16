

function callSignIpWithInputValues() {
    //get input values
    const email = document.getElementById("usernameInput").value;
    const password = document.getElementById("passwordInput").value;
    const formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    //send request to server
    fetch("../apis/sign_in.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            //redirect to home page
            if (data == "success") {
                window.location.href = "../home";
            }
            else {
                alert(data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    
}
function sign_up() {
    //redirect to sign up page
    window.location.href = "../sign_up";
}