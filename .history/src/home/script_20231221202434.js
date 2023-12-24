// get the day of the year starting from 2000
var now = new Date();
var start = new Date(2021, 5, 19);
var diff = (now - start) + ((start.getTimezoneOffset() - now.getTimezoneOffset()) * 60 * 1000);
var oneDay = 1000 * 60 * 60 * 24;
var day = Math.floor(diff / oneDay);

window.onload = function () {
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
    get_friends();
    friend_requests();
    //add function to set email preference buttons to the correct values
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
    //check if wordle[0] is an integer
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
        formData.append("current_wordle_day", day)
        fetch("../apis/add_wordle.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
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
    window.location.reload();
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
            for (let i = 0; i < data.length; i++) {
                // check if the wordle number is the same as the last wordle number
                if (data[i]["wordle_number"] == lastWordleNumber + 1 || (data[i]["wordle_number"] == lastWordleNumber)) {
                    currentStreak++;
                } else {
                    currentStreak = 1;
                }
                lastWordleNumber = data[i]["wordle_number"];
                // check if data[i][wordle_score] is an integer after type conversion
                if (data[i]["wordle_score"] != 'x' && data[i]["wordle_score"] != 'X') {
                    totalScore += parseInt(data[i]["wordle_score"]);
                    totalWordlesCompleted++;
                }
                totalWordles++;
            }
            if (lastWordleNumber != day && lastWordleNumber != day - 1) {
                currentStreak = 0;
            }
            if (lastWordleNumber == day) {
                // delete elements inside the enter_wordle div
                let enter_wordle = document.getElementById("enter_wordle");
                // enter_wordle.classList.add("relative", "flex", "justify-center", "items-center");
                // pt-[15px] relative flex justify-center items-center gap-[5px] 
                while (enter_wordle.firstChild) {
                    enter_wordle.removeChild(enter_wordle.firstChild);
                }
                // create a message to tell the user that they have already entered today's wordle
                let shareStatement = document.createElement("button");
                shareStatement.innerHTML = "Today's Wordle results have been added!";
                shareStatement.classList.add("h-[25px]", "mt-[12px]", "pl-[10px]", "pr-[10px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-md", "font-bold", "font-['Inter']", "bg-[#498245]", "mx-auto");


                // console log the latest wordle
                // add those results to the screen
                let wordle_stats = document.createElement("button");
                wordle_stats.innerHTML = "Wordle: " + data[data.length - 1]["wordle_number"] + " Score: " + data[data.length - 1]["wordle_score"] + "/6";
                wordle_stats.classList.add("h-[25px]", "mt-[12px]", "mb-[10px]", "pl-[10px]", "pr-[10px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-md", "font-bold", "font-['Inter']", "bg-[#498245]", "mx-auto");
                
                let wordle = document.createElement("div");
                wordle.classList.add("flex-col");
                let wordle_data = data[data.length - 1]["wordle"];
                wordle_data = wordle_data.replaceAll("\\r", "");
                wordle_data = wordle_data.split("\\n");
                for (let i = 0; i < wordle_data.length; i++) {
                    let wordle_row = document.createElement("div");
                    wordle_row.classList.add("flex", "justify-center", "items-center", "gap-1.5");
                    wordle_row.innerHTML = wordle_data[i];
                    wordle.appendChild(wordle_row);
                }
                let shareButton = document.createElement("button");
                shareButton.innerHTML = "Share with Friends ";
                // shareButton.innerHTML += '<i class="fas fa-share"></i>';
                shareButton.innerHTML += '&#10150;';
                // add the share button to the screen
                shareButton.classList.add("h-[25px]", "mt-[12px]", "pl-[10px]", "pr-[10px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-md", "font-bold", "font-['Inter']", "bg-[#498245]", "mx-auto", "hover:bg-[#3e6e3e]");
                shareButton.onclick = function () {
                    Share_wordle(0, data[data.length - 1]["wordle_number"], data[data.length - 1]["wordle_score"], data[data.length - 1]["wordle"]);
                }
                enter_wordle.appendChild(shareStatement);
                enter_wordle.appendChild(wordle_stats);
                enter_wordle.appendChild(wordle);
                // declare the friend variable
                let friend;

                enter_wordle.appendChild(shareButton);
                // console log a list of the user's friends by making a fetch request to the server with the user's id in the cookie
                fetch("../apis/get_friends.php", {
                        method: "GET"
                    })
                    .then(response => response.text())
                    .then(data => {
                        // parse the data into a json object
                        data = JSON.parse(data);
                        for (i = 0; i < data.length; i++) {
                            // create a button for each friend
                            friend = document.createElement("button");
                            friend.innerHTML = data[i]["username"];
                            friend.innerHTML += ' &#10150;';
                            friend.classList.add("h-[25px]", "mt-[12px]", "pl-[10px]", "pr-[10px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-md", "font-bold", "font-['Inter']", "bg-[#498245]", "mx-auto", "hover:bg-[#3e6e3e]");
                            friend.id = data[i]["username"];
                            let phoneNumber = data[i]["phone_number"];
                            let wordleNumber = data[i]["wordles"][data.length - 1]["wordle_number"];
                            let wordleScore = data[i]["wordles"][data.length - 1]["wordle_score"];
                            // let streak = 
                            // let friend_has_played = 

                            friend.onclick = function () {
                                Share_wordle(phoneNumber, wordleNumber, wordleScore, wordle_data, 10, 1);
                            }
                            enter_wordle.appendChild(friend);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });

            }
            document.getElementById("streak").innerHTML = currentStreak + " Day Streak";
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
            } else {
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
            } else {
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
            for (i = 0; i < data.length; i++) {
                // create a div for each friend request
                let friend_request = document.createElement("div");
                friend_request.classList.add("pl-[10px]", "pt-[5px]", "pb-[10px]", "relative", "justify-start", "items-start", "gap-1.5", "flex");
                // create the inner elements
                friend_request.id = data[i]["username"];
                let friendName = document.createElement("div");
                friendName.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                // friendName.id = data[i]["username"];
                friendName.innerHTML = data[i]["username"];

                let acceptButton = document.createElement("button");
                acceptButton.id = data[i]["username"] + '2';
                // acceptButton.id = data[i]["username"] + "4";
                acceptButton.innerHTML = '✓';
                acceptButton.classList.add("w-[25px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                acceptButton.onclick = function () {
                    handle_friend_request('accept', this.id);
                }

                let rejectButton = document.createElement("button");
                rejectButton.id = data[i]["username"] + '1';
                // rejectButton.id = data[i]["username"] + "5";
                rejectButton.innerHTML = 'x'
                rejectButton.classList.add("w-[25px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-lg", "font-bold", "font-['Inter']", "bg-[#AC9534]");
                rejectButton.onclick = function () {
                    handle_friend_request('deny', this.id);
                }
                /*
                input.onclick = function () {
                    change_email_preferences(username);
                };
                */
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
            } else {
                alert(data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    window.location.reload();
}

function get_friends() {
    // write a get request to get the friend requests
    fetch("../apis/get_friends.php", {
            method: "GET"
        })
        .then(response => response.text())
        .then(data => {
            // parse the data into a json object
            data = JSON.parse(data);
            // get the users wordle data
            fetch("../apis/user_data.php")
                .then(response => response.text())
                .then(user_data => {
                    // parse the data into a json object
                    user_data = JSON.parse(user_data);
                    console.log(data);
                    //loop through the json object and create a div for each friend
                    for (i = 0; i < data.length; i++) {
                        // keep track of head to head score
                        let wins = 0;
                        let losses = 0;
                        let ties = 0;
                        let today_score_user = 0;
                        let today_score_friend = 0;
                        let user_has_played = false;
                        let friend_has_played = false;
                        let friend_streak = 0;
                        for (j = 0; j <= day; j++) {
                            // check if the user has played the wordle
                            for (k = 0; k < user_data.length; k++) {
                                if (user_data[k]["wordle_number"] == j) {
                                    user_has_played = true;
                                    today_score_user = user_data[k]["wordle_score"];
                                } else {
                                    user_has_played = false;
                                }
                            }
                            for (k = 0; k < data[i]["wordles"].length; k++) {
                                if (data[i]["wordles"][k]["wordle_number"] == j) {
                                    friend_has_played = true;
                                    today_score_friend = data[i]["wordles"][k]["wordle_score"];
                                } else {
                                    friend_has_played = false;
                                }
                            }
                            if (user_has_played && friend_has_played) {
                                console.log(friend_streak);
                                friend_streak++;
                                if (today_score_user < today_score_friend) {
                                    wins++;
                                } else if (today_score_user > today_score_friend) {
                                    losses++;
                                } else {
                                    ties++;
                                }
                            }
                            else if (day != j) {
                                friend_streak = 0;
                            }
                        }
                        let todays_result = "Waiting";
                        if (user_has_played && friend_has_played) {
                            if (today_score_user < today_score_friend) {
                                todays_result = "Win";
                            } else if (today_score_user > today_score_friend) {
                                todays_result = "Loss";
                            } else {
                                todays_result = "Tie";
                            }
                        }
                        const friendDiv = document.createElement("div");
                        friendDiv.classList.add("pl-[10px]", "pt-[30px]", "relative", "justify-start", "items-start", "gap-2", "inline-flex");

                        const friendNameDiv = document.createElement("div");
                        friendNameDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        friendNameDiv.textContent = data[i]["username"];

                        const emailNotificationsDiv = document.createElement("div");
                        emailNotificationsDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        emailNotificationsDiv.textContent = "Email Notifications";

                        const label = document.createElement("label");
                        label.classList.add("switch", "w-[50px]", "h-[25px]", "relative", "flex", "justify-center", "items-center");

                        // Remember to set the checkbox state later
                        const input = document.createElement("input");
                        input.id = "email_notification";
                        input.type = "checkbox";
                        let username = data[i]["username"];
                        input.onclick = function () {
                            change_email_preferences(username);
                        };

                        const span = document.createElement("span");
                        span.classList.add("slider");

                        label.appendChild(input);
                        label.appendChild(span);

                        friendDiv.appendChild(friendNameDiv);
                        friendDiv.appendChild(emailNotificationsDiv);
                        friendDiv.appendChild(label);

                        // Append the div to the document body or any other container element
                        // Create the "Results" div
                        const resultsDiv = document.createElement("div");
                        resultsDiv.classList.add("pl-[10px]", "pt-[15px]", "relative", "justify-start", "items-start", "gap-2", "inline-flex");

                        const todaysResultsDiv = document.createElement("div");
                        todaysResultsDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#AC9534]");
                        todaysResultsDiv.textContent = "Today's Results";

                        const winDiv = document.createElement("div");
                        winDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#AC9534]");
                        winDiv.textContent = todays_result;
                        resultsDiv.appendChild(todaysResultsDiv);
                        resultsDiv.appendChild(winDiv);
                        if (todays_result != "Waiting") {
                            const scoreDiv = document.createElement("div");
                            scoreDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#AC9534]");
                            scoreDiv.textContent = today_score_user + " V.S. " + today_score_friend;
                            resultsDiv.appendChild(scoreDiv);
                        }
                        //create a friend streak div
                        const streakDiv = document.createElement("div");
                        streakDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-md", "font-bold", "font-['Inter']", "bg-[#AC9534]");
                        streakDiv.textContent = "Streak: " + friend_streak + " Days";
                        resultsDiv.appendChild(streakDiv);

                        // Create the "Head to Head" div
                        const headToHeadDiv = document.createElement("div");
                        headToHeadDiv.classList.add("pl-[10px]", "pt-[15px]", "relative", "justify-start", "items-start", "gap-2", "inline-flex");

                        const headToHeadTitleDiv = document.createElement("div");
                        headToHeadTitleDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        headToHeadTitleDiv.textContent = "Head to Head";

                        const winsDiv = document.createElement("div");
                        winsDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        winsDiv.textContent = wins + " Wins";

                        const lossesDiv = document.createElement("div");
                        lossesDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        lossesDiv.textContent = losses + " Losses";

                        const tiesDiv = document.createElement("div");
                        tiesDiv.classList.add("pl-[10px]", "pr-[10px]", "h-[25px]", "relative", "flex", "justify-center", "items-center", "text-center", "text-white", "text-xs", "font-bold", "font-['Inter']", "bg-[#498245]");
                        tiesDiv.textContent = ties + " Ties";

                        headToHeadDiv.appendChild(headToHeadTitleDiv);
                        headToHeadDiv.appendChild(winsDiv);
                        headToHeadDiv.appendChild(lossesDiv);
                        headToHeadDiv.appendChild(tiesDiv);

                        // Append the div to the document body or any other container element
                        const screenDiv = document.getElementById("friends");
                        screenDiv.appendChild(friendDiv);
                        screenDiv.appendChild(resultsDiv);
                        screenDiv.appendChild(headToHeadDiv);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        })
}
// function to change email preferences
function change_email_preferences(friend_username) {
    let email_notification = document.getElementById("email_notification").checked;
    const formData = new FormData();
    formData.append("email_notification", email_notification);
    formData.append("friend_username", friend_username);
    fetch("../apis/email_notification.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Call get_user_data() after updating the database
            get_user_data();
            if (data !== "success") {
                alert(data);
            } else {
                alert("Email notifications updated!");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

function Share_wordle(phoneNumber, wordleNumber, score, wordle, friend_streak, friend_has_played ) {
    wordle = wordle.join("\n");
    let baseText = "wordle " + wordleNumber + " " + score + "/6\n\n" + wordle + "\n\n";
    navigator.clipboard.writeText(baseText)
        .then(() => {
            // Open new text message with the text
            if (phoneNumber == 0) {
                window.open(`sms:?body=${encodeURIComponent(baseText)}`);
                
            }
            else {
                if (friend_has_played) {
                    if (friend_streak == 0) {
                        baseText += "Lets start a wordle streak!";
                    }
                    else {
                        baseText += "Lets keep the " + friend_streak + " day streak going!";
                    }
                    baseText += "\n\n";
                }
                baseText += "See if you can beat my score! @ friendle.com";
                console.log(baseText);
                window.open(`sms:${phoneNumber}?body=${encodeURIComponent(baseText)}`);
            }
            
            
        })
        .catch(error => {
            console.error("Error copying to clipboard:", error);
        });
}

