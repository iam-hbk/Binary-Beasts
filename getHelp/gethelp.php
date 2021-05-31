<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="headerIndexFooter.css"> -->
    <link rel="stylesheet" href="gethelp.css">
    <title>GetHelp</title>
</head>
<body>

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
</div>
    <?php
    include 'Binary-Beasts/header.php';
    ?>   

       <!-- FOUNDATION 1 -->
       <!-- each div and button has an ID for styling and positioning purposes -->
     <br>
    <img class="gethelpImages" src="images/cause-epic-foundation.png" alt="" >
    <div id=infoaboutorg><p><?php include('epicfoundation.txt'); ?></p></div>     
    <a class="gethelplinks" href="http://www.epicfoundation.org.za" target="blank">Read more</a>
            
         <!-- FOUNDATION 2 EQUINOX TRUST -->
        <br>
        <img class="gethelpImages" src="images/cause-equinox.png" alt="" >
        <div id=infoaboutorg><p><?php include('equinox.txt'); ?></p></div>     
        <a class="gethelplinks" href="https://www.equinoxtrust.org" target="blank">Read more</a>
       
       <!-- FOUNDATION 3 LAWYERS AGAINST ABUSE -->
      <br>
      <img class="gethelpImages" src="images/cause-lva.png" alt="" >
        <div id=infoaboutorg><p><?php include('lav.txt'); ?></p></div>     
        <a class="gethelplinks" href="https://www.lav.org.za" target="blank">Read more</a>
       
       <!-- FOUNDATION 4 GAY & LESBIAN NETWORK -->
       <br>
       <img class="gethelpImages" src="images/cause-gay-and-lesbian-network.png" alt="" >
       <div id=infoaboutorg><p><?php include('gln.txt'); ?></p></div>     
        <a class="gethelplinks" href="https://gaylesbian.org.za" target="blank">Read more</a>

       
       <!-- FOUNDATION 5 HOME OF HOPE ORGANISATION -->
       <br>
       <img class="gethelpImages" src="images/cause-home-of-hope.png" alt="" >
       <div id=infoaboutorg><p><?php include('homeofhope.txt'); ?></p></div>     
       <a class="gethelplinks" href="https://www.homeofhope.co.za" target="blank">Read more</a>
         
        
        <!-- FOUNDATION 6 THE TAFTA ORGANISATION -->
        <br>
       <img class="gethelpImages" src="images/cause-tafta.jpg" alt="" >
       <div id=infoaboutorg><p><?php include('tafta.txt'); ?></p></div>     
       <a class="gethelplinks" href="https://www.tafta.org.za" target="blank">Read more</a>
        

        <!-- FOUNDATION 7 THE TEARS FOUNDATION-->
       <br>
        <img class="gethelpImages" src="images/cause-tears-foundation.png" alt="" >
        <div id=infoaboutorg><p><?php include('tears.txt'); ?></p></div>     
        <a class="gethelplinks" href="https://www.tears.co.za" target="blank">Read more</a>


         
         <!-- FOUNDATION 8 -->
        <br>
        <img class="gethelpImages" src="images/cause-ccjd.png" alt="" >
       <div id=infoaboutorg><p><?php include('ccjd.txt'); ?></p></div>     
        <a class="gethelplinks" href="https://www.ccjd.org.za" target="blank">Read more</a>

  <!-- making a form for users to add their own organisation. -->

<p>ADD AN ORGANIZATION BY FILLING THE FORM BELOW</p>
<h3>Contact form</h3>

<div class="container">
  <form action="gethelp.php">
    <label for="fname">The name of the organisation</label>
    <input type="text" id="fname" name="orgname" placeholder="Organization name...">

         <label for="subject">Massage</label>
    <textarea id="subject" name="subject" placeholder="A brief description about the organization. e.g what they do?, where they are located?..." style="height:200px"></textarea>

    <button id="submit" onclick="myFunction()">Submit</button>
  </form>
</div>
<!-- JAVASCRIPT -->
<script src="gethelp.js">

</script>
<!-- </body> -->
</html>
   <?php
    include 'Binary-Beasts/footer.php';
    ?>
</body>
</html>