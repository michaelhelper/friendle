function callSignUp() {
    fetch('sign_up.php')
        .then(response => response.text())
        .then(data => {
            console.log(data); // Do something with the response data
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
