function callSignUp(usernameInput, emailInput, passwordInput) {
    const formData = new FormData();
    formData.append('username', usernameInput);
    formData.append('email', emailInput);
    formData.append('password', passwordInput);

    fetch('sign_up.php', {
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
