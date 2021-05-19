$(document).ready(() => {
  /* CATEGORY HAMBURGER button functionalities*/

  $(".categoriesMenu").css("display", "none");
  $("#categoriesMenuIcon").click(() => {
    $(".categoriesMenu").toggle();
    console.log("loaded !");
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
  } else {
    

  }
  

});
