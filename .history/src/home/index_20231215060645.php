<?php
  // Check if the user is logged in, if not then redirect to login page
  if(!isset($_COOKIE['user_id'])) {
    header("Location: ../sign_in");
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../dist/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="./script.js" defer></script>
  </head>
  <body class="flex justify-center bg-white dark:bg-black">
    <div id="screen" class="w-[393px] h-[852px] relative">
      <!--Title On Screen-->
      <div class="left-[7px] top-[12px] absolute justify-start items-start gap-1.5 inline-flex">
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245] ">F</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">R</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">I</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">E</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">N</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">D</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">L</div>
        </div>
        <div class="w-[42px] h-[43px] relative">
          <div class="w-[42px] h-[43px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">E</div>
        </div>
      </div>
      <!--Navigation Bar-->
      <div class="left-[44px] top-[64px] absolute justify-start items-start gap-[7px] inline-flex">
        <div class="w-[109px] h-[27px] relative">
          <div id="username" class="w-[109px] h-[27px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]">Hello, User1</div>
        </div>
        <div class="w-[85px] h-[27px] relative">
          <button class="w-[85px] h-[27px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]" onclick="sign_out()">Sign Out</button>
        </div>
        <div class="w-[97px] h-[27px] relative">
          <button class="w-[97px] h-[27px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]" onclick="toggleDarkMode()">Dark Mode</button>
        </div>
      </div>
      <!--Enter Results-->
      <div class="left-[16px] top-[100px] absolute justify-start items-start gap-[5px] inline-flex">
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">N</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">T</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">R</div>
        </div>
        <div class="w-[25px] h-[25px] bg-[#498245]"></div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">R</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">S</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">U</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">L</div>
        </div>
        <div class="w-[25px] h-[25px] relative">
          <div class="w-[25px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">T</div>
        </div>
      </div>
      <textarea id="wordle" class="w-[200px] h-[125px] left-[93px] top-[148px] absolute bg-[#AC9534] bg-opacity-30 text-sm text-center dark:text-white" placeholder="Enter Today's Worldle Results"></textarea>
      <div class="w-[46px] h-[25px] left-[170px] top-[285px] absolute">
        <button class="w-[46px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]" onclick="add_wordle()">Enter</button>
      </div>
      <!--Stats-->
      <div class="left-[7px] top-[333px] absolute justify-start items-start gap-1.5 inline-flex">
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">T</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">A</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">T</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
        </div>
        <div class="w-[130px] h-[35px] pl-[25px] relative">
          <div id="streak" class="w-[130px] h-[35px] absolute flex justify-center items-center text-center text-white text-md font-bold font-['Inter'] bg-[#AC9534]">10 Day STREAK</div>
        </div>
      </div>
      <!--Average Score-->
      <div class="left-[7px] top-[399px] absolute justify-start items-start gap-[9px] inline-flex">
        <div class="w-[100px] h-[25px] relative">
          <div class="w-[100px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Average Score</div>
        </div>
        <div class="w-9 h-[25px] relative">
          <div id= "average_score" class="w-9 h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">NA</div>
        </div>
      </div>
      <!--Wordles Played-->
      <div class="left-[7px] top-[455px] absolute justify-start items-start gap-3 inline-flex">
        <div class="w-[138px] h-[25px] relative">
          <div class="w-[138px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Total Wordles Played</div>
        </div>
        <div class="w-[29px] h-[25px] relative">
          <div id="total_wordles_played" class="w-[29px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">NA</div>
        </div>
      </div>
      <!--Completion Percentage-->
      <div class="left-[7px] top-[511px] absolute justify-start items-start gap-2.5 inline-flex">
        <div class="w-[152px] h-[25px] relative">
          <div class="w-[152px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Completion Percentage</div>
        </div>
        <div class="w-9 h-[25px] relative">
          <div id="completion_percentage" class="w-9 h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">NA</div>
        </div>
      </div>
      <!--Friends-->
      <div class="left-[7px] top-[567px] absolute justify-start items-start gap-[5px] inline-flex">
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">F</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">R</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">I</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">E</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">N</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">D</div>
        </div>
        <div class="w-[35px] h-[35px] relative">
          <div class="w-[35px] h-[35px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
        </div>
      </div>
      <!--Friends List-->
      <div class="w-[68px] h-[25px] left-[7px] top-[633px] absolute">
        <div class="w-[68px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Friend #1</div>
        <div class="flex items-center">
          <input type="checkbox">
          <span class="slider"></span>
        </label>
      </div>
      <!--Results-->
      <div class="left-[7px] top-[676px] absolute justify-start items-start gap-2 inline-flex">
        <div class="w-[97px] h-[25px] relative">
          <div class="w-[97px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Todays Results</div>
        </div>
        <div class="w-[33px] h-[25px] relative">
          <div class="w-[33px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Win</div>
        </div>
        <div class="w-[60px] h-[25px] relative">
          <div class="w-[60px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">2 V.S. 3 </div>
        </div>
      </div>
      <!--Head to Head-->
      <div class="left-[7px] top-[719px] absolute justify-start items-start gap-[9px] inline-flex">
        <div class="w-[89px] h-[25px] relative">
          <div class="w-[89px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Head to Head</div>
        </div>
        <div class="w-[68px] h-[25px] relative">
          <div class="w-[68px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">20 Wins</div>
        </div>
        <div class="w-[77px] h-[25px] relative">
          <div class="w-[77px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">20 Losses</div>
        </div>
      </div>
      <!--Add Friends-->
      <div class="left-[7px] top-[769px] absolute justify-start items-start gap-2 inline-flex">
        <div class="w-[77px] h-[25px] relative">
          <button class="w-[77px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]" onclick="add_friend()">Add Friend</button>
        </div>
        <div class="w-[167px] h-[25px] relative">
          <input id="friend" class="w-[167px] h-[25px] left-0 top-0 absolute flex justify-center items-center text-center dark:text-white bg-opacity-30 text-xs font-bold font-['Inter'] bg-[#AC9534]" placeholder="Enter Username Here"></input>
        </div>
      </div>
      <!--Friend Requests-->
    </div>
  </body>
</html>
