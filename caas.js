

//Login button movement or animation 
function login()
{
    signupButton.style.left='500px';
    loginButton.style.left='90px';
    mainBtn.style.left='1px';
}

//Signup button movement or amination 
function signup()
{
    mainBtn.style.left="120px";
    loginButton.style.left='-320px';
    signupButton.style.left='55px';
}



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