<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotlines</title>
  <link rel="stylesheet" href="StyleSheet.css">
  <link rel="stylesheet" href="headerIndexFooter.css">
  <?php echo file_get_contents("header.php"); ?>
</head>

<body>
  
  <!--Slideshow Container-->
  <div class="slideshow">

    <!--11 official Languages + French Slogan Slideshow -->

    <div class="slogan">
      Crime-Line <q>Say it here</q>
    </div>
    <div class="slogan">
      <q>Isho Lapha</q>
    </div>
    <div class="slogan">
      <q>Yitsho Apha </q>
    </div>
    <div class="slogan">
      <q>Se Dit Hier</q>
    </div>
    <div class="slogan">
      <q>E Bolele Mo</q>
    </div>
    <div class="slogan">
      <kbd></kbd>
      <q>E Bue Mo</q>
    </div>
    <div class="slogan">
      <q>E Bue Mona</q>
    </div>
    <div class="slogan">
      <q>Vula Xi Kwala</q>
    </div>
    <div class="slogan">
      <q>Kusho La</q>
    </div>
    <div class="slogan">
      <q>Kha Vha Ambe Hafha</q>
    </div>
    <div class="slogan">
      <q>Itjho Lana</q>
    </div>
    <div class="slogan">
      <q>Dites Le Ici</q>
    </div>

    <!--Next/Prev buttons-->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <!--dots slide indicators-->
  <div class="dot-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
    <span class="dot" onclick="currentSlide(7)"></span>
    <span class="dot" onclick="currentSlide(8)"></span>
    <span class="dot" onclick="currentSlide(9)"></span>
    <span class="dot" onclick="currentSlide(10)"></span>
    <span class="dot" onclick="currentSlide(11)"></span>
    <span class="dot" onclick="currentSlide(12)"></span>
  </div>

  <!--Javascript -->
  <script src="hotlines.js"> </script>

  <!--Sidebar on why its iportant to report crime-->
  <div class="sidebar">

    <table id="Report">
      <tr>
        <th>Why Report Crime:</th>
      </tr>
      <tr>
        <td>It helps with establishing crime trends</td>
      </tr>
      <tr>
        <td>It helps in understanding motive and modus</td>
      </tr>
      <tr>
        <td>It ensures suspects can be sent to jail once they have been finally apprehended</td>
      </tr>
      <tr>
        <td>It helps the community to better understand and respond to safety issues.</td>
      </tr>
      <tr>
        <td>It can lead to more arrests.</td>
      </tr>
      <tr>
        <th>EMERGENCY LINE:</th>
      </tr>
      <tr>
        <td><a href="tell:10177">Emergency - Ambulance (10177)</a></td>
      </tr>
      <tr>
        <td><a href="tell:112">Emergency - Cell phone (112)</a></td>
      </tr>
      <tr>
        <td><a href="tell:10111">Emergency - National (10111)</a></td>
      </tr>
      <tr>
        <td><a href="tell:10111">Fire Brigade - National (998)/(999)</a></td>
      </tr>
      <tr>
        <td><a href="tell:10111">ER24 - National (084124)</a></td>
      </tr>
    </table>

  </div>


  <!--Main container-->

  <div class="categories">
    <!--Whistleblowers categories container-->
    <div Class="WhistleBlowers">
      <!--Crime stop main container-->
      <div class="hotlinesImages">
        <img src="Crime-stop.jpg" alt="Crime Stop" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27860010111">Crime Stop: 0860010111</a></div>
      </div>
    </div>
    <!-------------------------------------------------------------------------------------------->
    <!--Crime stop main container-->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="fraud.png" alt="Fraud Hotline" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27800601011">Fraud: 0800601011</a></div>
      </div>
    </div>
    <!-------------------------------------------------------------------------------------------->
    <!--Crime stop main container-->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="antiCorruption.jpg" alt="Anti Corruption" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27860010111">Corruption:0860010111</a></div>
      </div>
    </div>
    <!-------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="undue-price-increase.jpg" alt="Undue Price Increase" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27800141880">Undue PriceIncrease:0800141880</a></div>
      </div>
    </div>
    <!-------------------------------------------------------------------------------------------->
    <!--Crime stop main container-->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="deloitte.jpg" alt="Deliotte" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+0800601011">Crime Stop:0800601011</a></div>
      </div>
    </div>
    <!----------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="Hawks.jpg" alt="Hawks" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+0128464590">Hawks:0128464590</a></div>
      </div>
    </div>
    <!----------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <!--Crime stop main container-->
      <div class="hotlinesImages">
        <img src="humanTrafficking.jpeg" alt="Human Trafficking" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27800055555">Traficking:08000555558</a></div>
      </div>
    </div>
    <!------------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="suicide.jpeg" alt="Suicide Support" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27860010111">Suicide Prevention:0860010111</a></div>
      </div>
    </div>
    <!---------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="GBV.jpeg" alt="Gender Based Violence" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:0800150150">GBV:0800150150</a></div>
      </div>
    </div>
    <!------------------------------------------------------------------------------------------------>
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="family-violence.png" alt="Family iolence, Child Protection, and Sexual offences" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+270800150150">Family Violence:0800150150</a></div>
      </div>
    </div>
    <!----------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="POWA.jpg" alt="People Oposing Women" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27116424345">POWA:0116424345</a></div>
      </div>
    </div>
    <!----------------------------------------------------------------------------------------------->
    <div Class="WhistleBlowers">
      <div class="hotlinesImages">
        <img src="GBV-complaints.jpg" alt="Gender Based Violence" width="250" height="150">
        <!--crime stop sub container(contact details)-->
        <div class="tel"><a href="tel:+27800333177">Service Complaints:0800333177</a></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div style="padding:6px;"></div>
 
</body>
<?php echo file_get_contents("footer.php"); ?>

</html>