function callSignUpWithInputValues() {
    const usernameInput = document.getElementById('usernameInput').value;
    const emailInput = document.getElementById('emailInput').value;
    const passwordInput = document.getElementById('passwordInput').value;

    const formData = new FormData();
    formData.append('username', usernameInput);
    formData.append('email', emailInput);
    formData.append('password', passwordInput);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../apis/sign_up.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Do something with the response data
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            console.error('Error:', xhr.status);
        }
    };
    xhr.send(formData);
}

function sign_in() {
    //redirect to sign in page
    window.location.href = "../sign_in";
}
