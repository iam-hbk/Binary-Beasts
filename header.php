<?php include "forum/connect.php"; session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/e005c8a2fd.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="headerIndexFooter.css" />
    <link rel="stylesheet" href="getHelp/gethelp.css">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Document</title>
  </head>

  <body>    <header>
      <div class="logo">
      <img
      onclick="window.location.replace('index.php')"
      style="cursor:pointer"
      src="images/logo.png" alt="Crimeline logo" srcset="" />
      </div>
      <div class="tabs">
        <span class="tab"
          ><a class="anchorHeader" id="home" href="/Binary-Beasts/index.php">Home</a></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="hotline" href="hotlines"
            >Hot-lines</a
          ></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="forum" href="/Binary-Beasts/forum/index.php">Community</a></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="getHelp" href="getHelp"
            >Get Help</a
          ></span
        >
        <!-- <span class="tab"
          ><a class="anchorHeader" id="stats" href="#stats">Statistics</a></span
        > -->
        <span class="tab" style="padding-left: 10px;"
          ><a class="anchorHeader" id="about" href="#footer">About</a></span
        >
      </div>
      
          </header>
