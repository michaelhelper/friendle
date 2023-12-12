function callSignUp(username, email, password) {
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

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
