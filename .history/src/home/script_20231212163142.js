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
    get_user_data();
    friend_requests();
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

function add_wordle() {
    let wordle = document.getElementById("wordle").value;
    let wordle_number = "";
    let wordle_score = "";
    // ignores the first character of the wordle string until it finds a number
    while (wordle[0] < '0' || wordle[0] > '9') {
        wordle = wordle.substring(1);
    }
    // adds the number to the wordle_number string until it finds a non-number
    while (wordle[0] >= '0' && wordle[0] <= '9') {
        wordle_number += wordle[0];
        wordle = wordle.substring(1);
    }
    wordle = wordle.substring(1);
    //check if wordle[0] is an integerssssssss
    wordle_score = wordle[0];
    //while wordle[0] is a number, letter, or whitespace, continue adding to wordle
    while (wordle[0] === '/' || (wordle[0] >= '0' && wordle[0] <= '9') || (wordle[0] >= 'a' && wordle[0] <= 'z') || (wordle[0] >= 'A' && wordle[0] <= 'Z') || wordle[0] == ' ' || wordle[0] == '\n') {
        wordle = wordle.substring(1);
    }
    const isInformationCorrect = confirm("Is the Wordle correct?" + "\n" + "Wordle Number: " + wordle_number + "\n" + "Wordle Score: " + wordle_score + "/6" + "\n" + "Wordle:" + "\n" + wordle);

    if (isInformationCorrect) {
        const formData = new FormData();
        formData.append("wordle", wordle);
        formData.append("wordle_number", wordle_number);
        formData.append("wordle_score", wordle_score);
        fetch("../apis/add_wordle.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // Call get_user_data() after updating the database
                get_user_data();
                if (data !== "success") {
                    alert(data);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
    document.getElementById("wordle").value = "";
}

function get_user_data() {
    fetch("../apis/user_data.php")
        .then(response => response.text())
        .then(data => {
            let totalScore = 0;
            let totalWordles = 0;
            let totalWordlesCompleted = 0;
            let currentStreak = 0;
            let lastWordleNumber = data[0]["wordle_number"];
            // parse the data into a json object
            data = JSON.parse(data);
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                // check if the wordle number is the same as the last wordle number
                if (data[i]["wordle_number"] == lastWordleNumber+1 || (data[i]["wordle_number"] == lastWordleNumber)) {
                    currentStreak++;
                }
                else {
                    currentStreak = 1;
                }
                
                // check if data[i][wordle_score] is an integer after type conversion
                if (data[i]["wordle_score"] != 'x' && data[i]["wordle_score"] != 'X') {
                    totalScore += parseInt(data[i]["wordle_score"]);
                    totalWordlesCompleted++;
                }
                totalWordles++;
            }
            docu
            let averageScore = Math.round((totalScore / totalWordlesCompleted) * 100) / 100;
            let completionPercentage = Math.round((totalWordlesCompleted / totalWordles) * 100);
            document.getElementById("total_wordles_played").innerHTML = totalWordles;
            document.getElementById("average_score").innerHTML = averageScore
            document.getElementById("completion_percentage").innerHTML = completionPercentage + "%";
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

function sign_out() {
    //send request to server
    fetch("../apis/sign_out.php", {
        method: 'GET'
    })
        .then(response => response.text())
        .then(data => {
            //redirect to home page
            if (data == "success") {
                window.location.href = "../sign_in ";
            }
            else {
                alert(data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

function add_friend() {
    let friend = document.getElementById("friend").value;
    const formData = new FormData();
    formData.append("friend", friend);
    fetch("../apis/add_friend.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            // Call get_user_data() after updating the database
            get_user_data();
            if (data !== "success") {
                alert(data);
            }
            else {
                alert("Friend request sent!");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    document.getElementById("friend").value = "";
}

function friend_requests() {
    // write a get request to get the friend requests
    fetch("../apis/friend_requests.php", {
        method: "GET"
    })
        .then(response => response.text())
        .then(data => {
            // parse the data into a json object
            data = JSON.parse(data);
            console.log(data);
            console.log("username");
            console.log(data[0]["username"]);
            let top = 812;
            for (i = 0; i < data.length; i++) {
                // create a div for each friend request
                let friend_request = document.createElement("div");
                friend_request.style.cssText = "position: absolute; left: 7px; justify-content: start; align-items: start; gap: 7px; display: inline-flex; top: " + (top + i * 35) + "px";
                // create the inner elements
                friend_request.id = data[i]["username"];
                let friendName = document.createElement("div");
                friendName.style.cssText = "width: 77px; height: 25px; position: relative";
                // friendName.id = data[i]["username"];
                friendName.innerHTML = '<div style="width: 77px; height: 25px; left: 0; top: 0; position: absolute; display: flex; justify-content: center; align-items: center; text-align: center; color: white; font-size: 12px; font-weight: bold; font-family: \'Inter\'; background-color: #498245;">' + data[i]["username"] + '</div>';

                let acceptButton = document.createElement("button");
                acceptButton.style.cssText = "width: 25px; height: 25px; position: relative";
                // acceptButton.id = data[i]["username"] + "4";
                acceptButton.innerHTML = '<button id="' + data[i]["username"] + '2" style="width: 25px; height: 25px; left: 0; top: 0; position: absolute; display: flex; justify-content: center; align-items: center; text-align: center; color: white; font-size: 12px; font-weight: bold; font-family: \'Inter\'; background-color: #498245;" onclick="handle_friend_request(\'accept\', this.id)">✓</button>';

                let rejectButton = document.createElement("button");
                rejectButton.style.cssText = "width: 25px; height: 25px; position: relative";
                // rejectButton.id = data[i]["username"] + "5";
                rejectButton.innerHTML = '<button id="' + data[i]["username"] + '1" style="width: 25px; height: 25px; left: 0; top: 0; position: absolute; display: flex; justify-content: center; align-items: center; text-align: center; color: white; font-size: 12px; font-weight: bold; font-family: \'Inter\'; background-color: #AC9534;" onclick="handle_friend_request(\'deny\', this.id)">x</button>';

                // append the inner elements to the friend_request div
                friend_request.appendChild(friendName);
                friend_request.appendChild(acceptButton);
                friend_request.appendChild(rejectButton);

                // append the friend_request div to the document body or any other container element
                document.getElementById("screen").appendChild(friend_request);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

function handle_friend_request(action, friend) {
    //get the friends parent div
    friend = friend.substring(0, friend.length - 1);
    const formData = new FormData();
    formData.append("friend", friend);
    formData.append("action", action);
    fetch("../apis/handle_friend_request.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            // Call get_user_data() after updating the database
            get_user_data();
            if (data == "success") {
                alert("Friend request " + action + "ed!");
            }
            else {
                alert(data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    //reload the page
    window.location.reload();
}