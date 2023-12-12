function callSignUpWithInputValues() {
    const usernameInput = document.getElementById('usernameInput').value;
    const emailInput = document.getElementById('emailInput').value;
    const passwordInput = document.getElementById('passwordInput').value;

    const formData = new FormData();
    formData.append('username', usernameInput);
    formData.append('email', emailInput);
    formData.append('password', passwordInput);

    fetch('../sign_up.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Do something with the response data
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function sign_in() {
    //redirect to sign in page
    window.location.href = "../sign_in";
}
