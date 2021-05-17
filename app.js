// Sticky Header JS
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 5);
    
  });




// login toggle part JS
$("#signUp-signIn").css("display","none");
$(document).ready(() => {
  $("#signUp-signIn").css("border","2px solid black");
  var display = false;
  $("#SignIn_SignUp").click(() => {
    $("#signUp-signIn").toggle();
  });
  $("#quit").click(() => {
    $("#signUp-signIn").toggle();
  });
});




// Login behaviour (colors,page switching...) JS
function login()
{
    signupButton.style.left='500px';
    loginButton.style.left='45px';
    mainBtn.style.left='1px';
    s2.style.color = "#9e1030ff";
    s2.style.fontSize = "15px";
    f1.style.color = "";
    f1.style.fontSize = "";

}

//Signup button movement or animation 
function signup()
{
    mainBtn.style.left="110px";
    loginButton.style.left='-320px';
    signupButton.style.left='55px';
    f1.style.color = "#9e1030ff";
    f1.style.fontSize = "15px";
    s2.style.color = "white";
    s2.style.fontSize = "";

}

var f1 = document.getElementById("f1");
var s2 = document.getElementById("s2");
f1.style.transition="1s";
s2.style.transition="1s";
console.log(f1.style);

//Top buttons for the signup and signin buttons
var mainBtn=document.getElementById('move_button');
//login button ID
var loginButton=document.getElementById('login');
//Signup button ID
var signupButton=document.getElementById('signup');


var Log_ = document.getElementById('login_form');
window.onclick = function(event)
{
    if (event.target == Log_)
    {
        Log_.style.display = "none";
    }
    else{
        Log_.style.display;
    }
}

// End of login behaviour JS

// search command JS
$('.fa-search').click(()=>{
  $('#search').toggle();
})