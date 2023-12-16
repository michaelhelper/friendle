window.onload = function() {
    // initialize dark mode toggle to current theme
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }

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