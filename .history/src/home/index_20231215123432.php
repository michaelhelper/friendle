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
          <div id="username" class="w-[109px] h-[27px] left-0 top-0 absolute flex justify-center items-center text-center text-white text-base font-bold font-['Inter'] bg-[#AC9534]">Hello, </div>
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
        <style>
          .parent-container {
            display: flex;
            flex-direction: column;
          }
        </style>

        <div class="parent-container">
          <!-- Your existing code here -->
        </div>
