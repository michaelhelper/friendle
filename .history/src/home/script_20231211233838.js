window.onload = function() {
    // initialize dark mode toggle to current theme
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
    //set the username in the navbar by making a fetch request to the server with the user's id in the cookie
    fetch("../apis/username.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("username").innerHTML = "Hello, " + data;
        })
        .catch(error => {
            console.error("Error:", error);
        });
}
// Dark Mode Toggle
function toggleDarkMode() {
    let htmlClasses = document.documentElement.classList;
    if (localStorage.theme == 'dark') {
        htmlClasses.remove('dark');
        localStorage.removeItem('theme')
    } else {
        htmlClasses.add('dark');
        localStorage.theme = 'dark';
    }
}
function add_wordle(){
    const wordle = document.getElementById("wordle").value;
    // parse the wordle data
    // the first integer is the wordle n
    const formData = new FormData();
    formData.append("wordle_name", wordle_name);
    //send request to server
    // fetch("../apis/add_wordle.php", {
    //     method: "POST",
    //     body: formData
    // })
    //     .then(response => response.text())
    //     .then(data => {
    //         //redirect to home page
    //         if (data == "success") {
    //             alert("Wordle Added");
    //         }
    //         else {
    //             alert(data);
    //         }
    //     })
    //     .catch(error => {
    //         console.error("Error:", error);
    //     });
}