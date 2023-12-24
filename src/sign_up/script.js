window.onload = function() {
    // initialize dark mode toggle to current theme
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
}

function callSignUpWithInputValues() {
    const usernameInput = document.getElementById('usernameInput').value;
    const emailInput = document.getElementById('emailInput').value;
    const passwordInput = document.getElementById('passwordInput').value;
    const confirmPassword = document.getElementById('confirmPasswordInput').value;
    const phoneNumberInput = document.getElementById('phoneInput').value;
    if (confirmPassword != passwordInput) {
        alert('Passwords do not match');
        document.getElementById('passwordInput').value = '';
        document.getElementById('confirmPasswordInput').value = '';
        return;
    }
    const formData = new FormData();
    formData.append('username', usernameInput);
    formData.append('email', emailInput);
    formData.append('password', passwordInput);
    formData.append('phone', phoneNumberInput);

    fetch('../apis/sign_up.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            //redirect to home page
            if (data == "success") {
                const formData = new FormData();
                formData.append("email", usernameInput);
                formData.append("password", passwordInput);
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
            else {
                alert(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function sign_in() {
    //redirect to sign in page
    window.location.href = "../sign_in";
}