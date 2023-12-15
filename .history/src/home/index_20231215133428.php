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
      <div class="pt-[12px] justify-center items-center gap-1.5 flex relative">
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245] ">F</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">R</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">I</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">E</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">N</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">D</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#498245]">L</div>
          <div class="w-[42px] h-[43px] relative flex justify-center items-center text-center text-white text-xl font-bold font-['Inter'] bg-[#AC9534]">E</div>
      </div>
      <!--Navigation Bar-->
      <div class="pt-[12px] relative flex justify-center items-center gap-[7px] ">
        <div id="username" class="w-[109px] h-[27px] relative flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]">Hello, </div>
        <button class="w-[85px] h-[27px] relative flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]" onclick="sign_out()">Sign Out</button>
        <button class="w-[97px] h-[27px] relative flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]" onclick="toggleDarkMode()">Dark Mode</button>
      </div>
      <!--Enter Results-->
      <div class="pt-[12px] relative flex justify-center items-center gap-[5px] ">
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">N</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">T</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">R</div>
          <div class="w-[25px] h-[25px] bg-[#498245]"></div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">R</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">E</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">S</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">U</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">L</div>
          <div class="w-[25px] h-[25px]  relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]">T</div>
      </div>
      <textarea id="wordle" class="w-[200px] h-[125px] mt-[12px] mx-auto relative flex justify-center items-center text-center bg-[#AC9534] bg-opacity-30 text-sm dark:text-white" placeholder="Enter Today's Worldle Results"></textarea>
      <button class="w-[46px] h-[25px] mt-[12px] mx-auto relative flex justify-center items-center text-center text-white text-sm font-bold font-['Inter'] bg-[#498245]" onclick="add_wordle()">Enter</button>
      <!--Stats-->
      <div class="pt-[24px] pl-[10px] relative justify-start items-start gap-1.5 flex">
        <div class="w-[35px] h-[35px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
        <div class="w-[35px] h-[35px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">T</div>
        <div class="w-[35px] h-[35px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">A</div>
        <div class="w-[35px] h-[35px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">T</div>
        <div class="w-[35px] h-[35px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
        <div id="streak" class="w-[130px] h-[35px] ml-[20px] relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">0 Day STREAK</div>
      </div>
      <!--Average Score-->
      <div class="pl-[10px] pt-[12px] relative justify-start items-start gap-[9px] inline-flex">
        <div class="w-[100px] h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Average Score</div>
        <div id= "average_score" class="w-9 h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">NA</div>
      </div>
      <!--Wordles Played-->
      <div class="pl-[10px] pt-[12px] relative justify-start items-start gap-3 flex">
        <div class="w-[138px] h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Total Wordles Played</div>
        <div id="total_wordles_played" class="w-[29px] h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">NA</div>
      </div>
      <!--Completion Percentage-->
      <div class="pl-[10px] pt-[12px] relative justify-start items-start gap-2.5 inline-flex">
          <div class="w-[152px] h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Completion Percentage</div>
          <div id="completion_percentage" class="w-9 h-[25px] relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">NA</div>
      </div>
      <!--Friends-->
      <div class="pl-[10px] pt-[24px] relative justify-start items-start gap-[5px] inline-flex">
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">F</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">R</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">I</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">E</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">N</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#AC9534]">D</div>
          <div class="w-[35px] h-[35px]  relative flex justify-center items-center text-center text-white text-lg font-bold font-['Inter'] bg-[#498245]">S</div>
      </div>
      <!--Friends List-->
      <div class="pl-[10px] pt-[12px] relative justify-start items-start gap-[5px] inline-flex">
        <div class="w-[68px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Friend #1</div>
        <div class="w-[130px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Email Notifications</div>
        <label class="switch w-[50px] h-[25px]  relative flex justify-center items-center">
          <input type="checkbox">
          <span class="slider"></span>
        </label>
      </div>
      <!--Results-->
      <div class="left-[7px] top-[676px]  relative justify-start items-start gap-2 inline-flex">
          <div class="w-[97px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Todays Results</div>
          <div class="w-[33px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">Win</div>
          <div class="w-[60px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]">2 V.S. 3 </div>
      </div>
      <!--Head to Head-->
      <div class="left-[7px] top-[719px]  relative justify-start items-start gap-[9px] inline-flex">
          <div class="w-[89px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">Head to Head</div>
          <div class="w-[68px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">20 Wins</div>
          <div class="w-[77px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#498245]">20 Losses</div>
      </div>
      <!--Add Friends-->
      <div class="left-[7px] top-[769px]  relative justify-start items-start gap-2 inline-flex">
          <button class="w-[77px] h-[25px]  relative flex justify-center items-center text-center text-white text-xs font-bold font-['Inter'] bg-[#AC9534]" onclick="add_friend()">Add Friend</button>
          <input id="friend" class="w-[167px] h-[25px]  relative flex justify-center items-center text-center dark:text-white bg-opacity-30 text-xs font-bold font-['Inter'] bg-[#AC9534]" placeholder="Enter Username Here"></input>
      </div>
      <!--Friend Requests-->
    </div>
  </body>
</html>
