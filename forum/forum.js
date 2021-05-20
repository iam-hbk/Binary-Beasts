$(document).ready(() => {
  
  /* CATEGORY HAMBURGER button functionalities*/

  $(".categoriesMenu").css("display", "none");
  $("#categoriesMenuIcon").click(() => {
    $(".categoriesMenu").toggle();

  });
  $("#categoriesMenuQuit").click(() => {
    $(".categoriesMenu").toggle();
  });

  /* +NEW TOPIC functionalities */
  $(".newTopic").css("display", "none");
  console.log("loaded !");
  $(".new_topic_button").click(() => {
    console.log("clicked !");
    $(".newTopic").toggle();
  });
  $(".closeNewTopic").click(() => {
    $(".newTopic").toggle();
  });
  /* Select category functionalities */
  $(".createCategoryCategories").css("display", "none");
  var checkButtonLabel = $("label.radio_label");
  console.log(checkButtonLabel);
  $("#choseCategory").click(() => {
    $(".createCategoryCategories").toggle();
  });
  checkButtonLabel.click(()=>{
    console.log($("input[type=radio]:checked").val());
    $(".createCategoryCategories").toggle();
    setTimeout(() => {
      $("#choseCategory").html($("input[type=radio]:checked + label.radio_label").html()+" <i class='fas fa-angle-down'>");
      $("input[name = submitCreateTopic]").removeAttr("disabled");
      console.log("in setTime");
    }, 2);
    console.log($("input[type=radio]:checked").val());
  })
  /* Functionalities for create topic DISABLED/ENABLED */
  if (!$("input[type=radio]:checked").val()) {
    // $("input[name = submitCreateTopic]").css("color","blue");
    console.log("not checked");
    $("input[name = submitCreateTopic]").attr("disabled",true);
  }

  /* SHOW / HIDE PASSWORD */
  /* 1 for Sign In */
  $("#showPassword").click(()=>{
    $("#hidePassword").toggle();
    $("#showPassword").toggle();
    $("#signInPassword").prop({type:"text"});

  });
  $("#hidePassword").click(()=>{
    $("#hidePassword").toggle();
    $("#showPassword").toggle();
    $("#signInPassword").prop({type:"password"});
  })
  /* 2 for Sign Up */
  $("#signUpPasswordShow").click(()=>{
    console.log("in here right !");
    $("#signUpPasswordShow").toggle();
    $("#signUpPasswordHide").toggle();
    $("#signUpPassword").prop({type:"text"});
  })
  $("#signUpPasswordHide").click(()=>{
    $("#signUpPasswordHide").toggle();
    $("#signUpPasswordShow").toggle();
    $("#signUpPassword").prop({type:"password"});
  })
  /* 3 confirm password */
  $("#confirmPasswordShow").click(()=>{
    $("#confirmPasswordShow").toggle();
    $("#confirmPasswordHide").toggle();
    $("#confirmPassword").prop({type:"text"});
  })
  $("#confirmPasswordHide").click(()=>{
    $("#confirmPasswordHide").toggle();
    $("#confirmPasswordShow").toggle();
    $("#confirmPassword").prop({type:"password"});
  })
  /* Showing users Profile */
  $("div.profileContainer").css("display","none");
  $("#profile").click(()=>{
    $("div.profileContainer").toggle();
  });
  $("#quitProfileContainer").click(()=>{
    $("div.profileContainer").toggle();
  })

});
