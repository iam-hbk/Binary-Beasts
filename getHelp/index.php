<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gethelp.css">
    <title>GetHelp</title>
</head>
<body> -->





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
         onclick="window.location.replace('http:../index.php')"
         style="cursor:pointer"
         src="./images/logo.png" alt="Crimeline logo" srcset="" />
      </div>
      <div class="tabs">
        <span class="tab"
          ><a class="anchorHeader" id="home" href="../index.php">Home</a></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="hotline" href="../hotlines/"
            >Hot-lines</a
          ></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="forum" href="../forum/index.php">Community</a></span
        >
        <span class="tab"
          ><a class="anchorHeader" id="getHelp" href="./index.php"
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

























<div class="vid_container" id="vid_container"></div>
<div class="close_vid" id="close_vid" onclick="hide_vid()">x</div>
<video  id="vid" width="500" height="500" preload="auto" autoplay src="videos/gethelpvideo.mp4"></video>

<!-- ADDING THE POP-UP VIDEO -->
<script src="gethelp.js">

</script>

<!-- ADDING  AUTO-SLIDES -->
<div class="slideshow">
<br><br>
<div class="mySlides">
  <q class="text">It only start as pain, builds up to tears and before you know it. It has left a scar on you.</q>
  <div class="writer">
    ~ Anonymous
  </div>
</div>

<div class="mySlides">
  <q class="text">It could be a memory or fear. It can even steal your voice.</q>
  <div class="writer">
    ~ Anonymous
  </div>
</div>

<div class="mySlides">
  <q class="text">It is up to you to start moving from whatever is happening and get help.</q>
  <div class="writer">
    ~ Anonymous
  </div>
</div>

<div class="mySlides">
  <q class="text">Right here we have organizations that you can go through and get assistance you need. </q>
  <div class="writer">
    ~ Anonymous
  </div>
</div>

<div class="mySlides">
  <q class="text">It is in your hands now to get help.</q>
  <div class="writer">
    ~ Anonymous
  </div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>
<!-- LINKING THE SCRIPT FOR THE AUTO-SLIDES -->
<script src="gethelp.js"></script>


<!-- </div>  -->
<!-- ADDING THE FOUNDATIONS -->
<!-- </div> -->
    <?php
include 'Binary-Beasts/header.php';
?>

       <!-- FOUNDATION 1 -->
       <!-- each div and button has an ID for styling and positioning purposes -->
     <br>
    <img class="gethelpImages" src="images/cause-epic-foundation.png" alt="" >
    <div id=infoaboutorg><p><?php include 'epicfoundation.txt';?></p></div>
    <a class="gethelplinks" href="http://www.epicfoundation.org.za" target="blank">Read more</a>

         <!-- FOUNDATION 2 EQUINOX TRUST -->
        <br>
        <img class="gethelpImages" src="images/cause-equinox.png" alt="" >
        <div id=infoaboutorg><p><?php include 'equinox.txt';?></p></div>
        <a class="gethelplinks" href="https://www.equinoxtrust.org" target="blank">Read more</a>

       <!-- FOUNDATION 3 LAWYERS AGAINST ABUSE -->
      <br>
      <img class="gethelpImages" src="images/cause-lva.png" alt="" >
        <div id=infoaboutorg><p><?php include 'lav.txt';?></p></div>
        <a class="gethelplinks" href="https://www.lav.org.za" target="blank">Read more</a>

       <!-- FOUNDATION 4 GAY & LESBIAN NETWORK -->
       <br>
       <img class="gethelpImages" src="images/cause-gay-and-lesbian-network.png" alt="" >
       <div id=infoaboutorg><p><?php include 'gln.txt';?></p></div>
        <a class="gethelplinks" href="https://gaylesbian.org.za" target="blank">Read more</a>


       <!-- FOUNDATION 5 HOME OF HOPE ORGANISATION -->
       <br>
       <img class="gethelpImages" src="images/cause-home-of-hope.png" alt="" >
       <div id=infoaboutorg><p><?php include 'homeofhope.txt';?></p></div>
       <a class="gethelplinks" href="https://www.homeofhope.co.za" target="blank">Read more</a>


        <!-- FOUNDATION 6 THE TAFTA ORGANISATION -->
        <br>
       <img class="gethelpImages" src="images/cause-tafta.jpg" alt="" >
       <div id=infoaboutorg><p><?php include 'tafta.txt';?></p></div>
       <a class="gethelplinks" href="https://www.tafta.org.za" target="blank">Read more</a>


        <!-- FOUNDATION 7 THE TEARS FOUNDATION-->
       <br>
        <img class="gethelpImages" src="images/cause-tears-foundation.png" alt="" >
        <div id=infoaboutorg><p><?php include 'tears.txt';?></p></div>
        <a class="gethelplinks" href="https://www.tears.co.za" target="blank">Read more</a>



         <!-- FOUNDATION 8 -->
        <br>
        <img class="gethelpImages" src="images/cause-ccjd.png" alt="" >
       <div id=infoaboutorg><p><?php include 'ccjd.txt';?></p></div>
        <a class="gethelplinks" href="https://www.ccjd.org.za" target="blank">Read more</a>

  <!-- making a form for users to add their own organisation. -->

<p>ADD AN ORGANIZATION BY FILLING THE FORM BELOW</p>
<h3>Contact form</h3>

<div class="container">
  <form action="index.php" method="POST">
    <label for="fname">The name of the organisation</label>
    <input type="text" id="fname" name="orgname" placeholder="Organization name...">

         <label for="subject">Massage</label>
    <textarea id="subject" name="subject" placeholder="A brief description about the organization. e.g what they do?, where they are located?..." style="height:200px"></textarea>

    <button id="submit" onclick="myFunction()">Submit</button>
  </form>
</div>
<!-- JAVASCRIPT -->
<script src="gethelp.js"></script>
<?php include "./footer.php"?>
<style>
@import url(https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;800;900&display=swap);
@import url("https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Exo+2:wght@100&display=swap");
.gethelpImages{
    width: 250px;
    height: 150px;
    }
    #div1, #div2{
      font-family: 'Poppins';
      float: right;
      background-color: white;
      color: black;
      position: absolute;
      left: 20%;
      top: 15%;
      width: 950px;
      height: 100px;
    }
    
    /* decorating of the links organization */
    .gethelplinks{
      color:white;
      text-align:start;
      border-radius: 8px;
      border-width: 1px;
      background-color: #9e1030ff;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      padding: 1px 15px 7px 15px;
      font-weight: normal;
      font-size:15px;
      display:inline-block;
      margin-left:19%;
      }
    
      /* decorating the info each org */
      #infoaboutorg{
        border:solid white;
        width:75%;
        height:50%;
        margin: 1px 125px 1px 255px;
        text-align: start;
        margin-top: -130px;
      }
    /* form decoration */
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #111;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
    
    input[type=submit] {
      background-color: #111;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #9e1030ff;
    }
    
    .container {
      border-radius: 5px;
      background-color: #9e1030ff;
      padding: 20px;
    }
    

body {
  font-family: 'Poppins', sans-serif;
}
* {
    box-sizing: border-box;
  }
  body {
    font-family: '';
  }
  .mySlides {
    background-color: transparent;
  }
  
  /* THE BIG DIV CONTAINING THE AUTO-SLIDES*/
  .slideshow {
    position: relative;
    background: #f1f1;
    background-image: url("images/handsUp.jpeg");
    width: 100%;
    height: 40vh;
    background-repeat: no-repeat;
    background-size: 100%;
    background-size: cover;
    
  }
  
  /* THE GETHELP TEXT AND THE WRITER STYLING AND POSITIONING*/
  .text {
    font-family: 'Poppins', sans-serif;
    color: #9e1030ff;
    display: block;
    font-size: 23px;
    padding: 8px 12px;
    position: absolute;
    bottom: 28px;
    width: 100%;
    text-align: center;
    background-color: #ffffff99;
  }
  .writer{
      color: #9e1030ff;
      font-family: 'Poppins',sans-serif;
      width: 100%;
      font-size: 21px;
      position: absolute;
      text-align: center;
      bottom: 5px;
      width: 100%;
      -moz-window-dragging: 100%;
      text-align: center;
    background-color: #ffffff99;


  }
  
  /* THE DOT UNDER THE AUTO-SLIDES OF THE GETHELP PAGE*/
  .dot {
    height: 15px;
    color: lightcoral;
    width: 15px;
    margin: 0 2px;
    display: none;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.2s ease;
  }
  
  /* .active {
    background-color: rgb(190, 114, 133);
  } */
  
  /* Fading animation */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
  }
  
  @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .text {font-size: 11px}
  }
  /* STYLE THE GETHELP CONTACT US FORM */
  body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #111;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

#submit {
  background-color: #111;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#submit:hover {
  background-color: #9e1030ff;
}

.container {
  border-radius: 5px;
  background-color: #9e1030ff;
  padding: 20px;
}
/* STYLING THE POP-UP VIDEO FROM THE GETHELP PAGE*/
.close_vid{

    font-size:40px;
    color:white;
    transform:translate(-50%,-50%);
    position: fixed;
    top:30%;
    left:25%;
    width:40px ;
    height: 40px;
    z-index: 2;
    cursor: pointer;
  }
  .vid_container{
    position: fixed;
    width: 100%;
    height: 100vh;
    background:rgba(0, 0, 0, 0.8);;
    z-index: 1;
  }
    #vid{
      transform:translate(-50%,-50%);
    position: fixed;
    top:50%;
    left:50%;
    width: 50%;
    height: 100%;
    z-index: 1;
   }</style>