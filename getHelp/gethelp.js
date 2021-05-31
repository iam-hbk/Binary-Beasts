// SCRIPT FOR THE POP-UP VIDEO ON THE GETHELP PAGE
function hide_vid()
{
    document.getElementById("close_vid").style.display="none";
    document.getElementById("vid").style.display="none";
    document.getElementById("vid_container").style.display="none";

    var x = document.getElementById("vid").autoplay;
  
  }

// SCRIPT FOR THE AUTO-SLIDE ON THE GETHELP PAGE
var slideNumber = 0;
playSlides();

function playSlides() 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) 
  {
    slides[i].style.display = "none";  
  }
  slideNumber++;
  if (slideNumber > slides.length) 
    {
        slideNumber = 1
    }    
  for (i = 0; i < dots.length; i++) 
  {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideNumber-1].style.display = "block";  
  dots[slideNumber-1].className += " active";
  setTimeout(playSlides, 7000);
}
// SCRIPT FOR THE GETHELP FORM
function myFunction() {
    alert ("Form successfully submitted to CrimeLine, we will get back to you ");
  }