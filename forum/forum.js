$(document).ready(() => {
  /* CATEGORY HAMBURGER button functionalities*/

  $(".categoriesMenu").css("display", "none");
  $("#categoriesMenuIcon").click(() => {
    $(".categoriesMenu").toggle(300, "swing");
  });
  $("#categoriesMenuQuit").click(() => {
    $(".categoriesMenu").toggle(300, "swing");
  });

  /* +NEW TOPIC functionalities */
  $(".newTopic").css("display", "none");
  console.log("loaded !");
  $(".new_topic_button").click(() => {
    console.log("clicked !");
    $(".newTopic").toggle(300, "linear");
  });
  $(".closeNewTopic").click(() => {
    $(".newTopic").toggle(300, "swing");
  });
  /* Select category functionalities */
  $(".createCategoryCategories").css("display", "none");
  var checkButtonLabel = $("label.radio_label");
  // console.log(checkButtonLabel);
  $("#choseCategory").click(() => {
    $(".createCategoryCategories").toggle(200, "linear");
  });
  checkButtonLabel.click(() => {
    console.log($("input[type=radio]:checked").val());
    $(".createCategoryCategories").toggle(300, "swing");
    setTimeout(() => {
      $("#choseCategory").html(
        $("input[type=radio]:checked + label.radio_label").html() +
          " <i class='fas fa-angle-down'>"
      );
      if (!($("#session_signed_in").html() == "true")) {
        console.log("user_not_signed in");
        $(".ifDisabled").html("You need to be signed in to activate this button");
      }else{
        console.log("signed_in");
        $("input[name = submitCreateTopic]").removeAttr("disabled");
      }
      console.log("in setTime");
    }, 2);
    console.log($("input[type=radio]:checked").val());
  });
  /* TOPIC CREATED SUCCESSFULLY */

  $(".isTopicCreated").show();
  setTimeout(() => {
    $(".isTopicCreated").hide();
  }, 2000);

  /* SHOW / HIDE PASSWORD */
  /* 1 for Sign In */
  $("#showPassword").click(() => {
    $("#hidePassword").toggle();
    $("#showPassword").toggle();
    $("#signInPassword").prop({ type: "text" });
  });
  $("#hidePassword").click(() => {
    $("#hidePassword").toggle();
    $("#showPassword").toggle();
    $("#signInPassword").prop({ type: "password" });
  });
  /* 2 for Sign Up */
  $("#signUpPasswordShow").click(() => {
    console.log("in here right !");
    $("#signUpPasswordShow").toggle();
    $("#signUpPasswordHide").toggle();
    $("#signUpPassword").prop({ type: "text" });
  });
  $("#signUpPasswordHide").click(() => {
    $("#signUpPasswordHide").toggle();
    $("#signUpPasswordShow").toggle();
    $("#signUpPassword").prop({ type: "password" });
  });
  /* 3 confirm password */
  $("#confirmPasswordShow").click(() => {
    $("#confirmPasswordShow").toggle();
    $("#confirmPasswordHide").toggle();
    $("#confirmPassword").prop({ type: "text" });
  });
  $("#confirmPasswordHide").click(() => {
    $("#confirmPasswordHide").toggle();
    $("#confirmPasswordShow").toggle();
    $("#confirmPassword").prop({ type: "password" });
  });
  /* Showing users Profile */
  $("div.profileContainer").css("display", "none");
  $("#profile").click(() => {
    $("div.profileContainer").toggle();
  });
  $("#quitProfileContainer").click(() => {
    $("div.profileContainer").toggle();
  });

  /* PASSWORD STRENGTH TESTER */

  function _id(name) {
    return document.getElementById(name);
  }
  function _class(name) {
    return document.getElementsByClassName(name);
  }

  _id("signUpPassword").addEventListener("focus", function () {
    _class("password-policies")[0].classList.add("active");
  });
  _id("signUpPassword").addEventListener("blur", function () {
    _class("password-policies")[0].classList.remove("active");
  });

  _id("signUpPassword").addEventListener("keyup", function () {
    let password = _id("signUpPassword").value;

    if (/[A-Z]/.test(password)) {
      _class("policy-uppercase")[0].classList.add("active");
    } else {
      _class("policy-uppercase")[0].classList.remove("active");
    }

    if (/[0-9]/.test(password)) {
      _class("policy-number")[0].classList.add("active");
    } else {
      _class("policy-number")[0].classList.remove("active");
    }

    if (/[^A-Za-z0-9]/.test(password)) {
      _class("policy-special")[0].classList.add("active");
    } else {
      _class("policy-special")[0].classList.remove("active");
    }

    if (password.length > 7) {
      _class("policy-length")[0].classList.add("active");
    } else {
      _class("policy-length")[0].classList.remove("active");
    }
  });


  /* CREATE TOPIC INPUT VALIDATION & HINTS */
  
});



