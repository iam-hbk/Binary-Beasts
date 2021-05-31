<?php
include "connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/e005c8a2fd.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Crimeline | Community</title>
  </head>
  <body>
    <header>
      <div class="leftpart">
      <style>
        div.logo_container:hover{
          transform: scale(2);
          animation: animateLogo 1.5s infinite ease-in-out;
          transition: 1s;
        }
        @keyframes animateLogo {
          0%,100%{
            transform: rotate(0deg);
            transform-origin: 20px;
          }
          50%{
            transform: rotate(180deg);
            transition: 1s;
          }
        }
      </style>
        <div onclick='window.location.replace("http:/Binary-Beasts/index.php")'
          style="cursor: pointer;"
          class="logo_container">
          <img id="logo" src="logo.png" alt="crimeline_logo" srcset="" />
        </div>
        <h2>Community</h2>
        <h3><a href="/Binary-Beasts"><i class="fas fa-arrow-left"></i></a></h3>
      </div>
      <div style = "
        display:flex;
        align-items:center;
        margin-right: -45%;
        position:relative;
      
      " class="search">
      <input placeholder="search..."
       style="
        border:none;
        background:transparent;
        border-bottom:2px solid black;
        padding:5px;
      " type="text" id="search">
	        <div style="
            position:fixed;
            top: 85px;
            right:30%;
            background:#9e1030ff;
            padding:auto;
            width:20vw;
            backdrop-filter:blur(10px);
            border-radius:10px;
            z-index:1000;
          " id="categories"></div>
          <i style = "cursor:pointer;z-index:10;position:absolute;top:25%;right:0" class="fa fa-search" id="searchIcon" aria-hidden="true"></i>
      </div>
      <style>
        div#categories div{
          margin: 5px 10px;
        }
        div#categories div a{
          color: white
        }
        div#categories div a:hover{
          text-align: center;
          font-size: 1.2em;

        }
      </style>
      <script type="text/javascript" src="search.js"></script>
      <ul>
        <li>
          
        </li>
        <li>
          <div class="profileContainer">
            <span id="quitProfileContainer">X</span>
            <div class="usernameInfo">Hi, <?php echo $_SESSION["user_name"] ?></div>
            <div class="signOut Edit"><a href="editProfile.php">Edit Profile <i class="fas fa-user-edit"></i></i></a></div>
            <div class="signOut"><a href="signOut.php">Sign out <i class="fas fa-sign-out-alt"></i></a></div>
          </div>
      </li>
        <!-- if user is not logged in display login button -->
<?php
/* NEED TO SET SESSIONS */
if ($_SESSION["signed_in"]) {
    echo '<li>Profile<i id="profile" class="fa fa-user-circle" aria-hidden="true"></i></li>';
} else {
    echo '<li><a style="text-decoration:none;" href="signInAndUp.php"><div class="login_button">LOGIN<i class="fa fa-user-circle" aria-hidden="true"></i></div></a></li>';
}
?>

        <li>Categories<i id="categoriesMenuIcon" class="fa fa-bars" aria-hidden="true"></i></li>
      </ul>
      <script>
      function got_to_cat(data){

        window.location.replace("http:categories.php?cat_name="+data);
      }
    </script>
      <div class="categoriesMenu">
        <span id="categoriesMenuQuit">X</span>
        <!-- For $i=0 ; $i < numberOfCategories ; $i++ echo Category $i -->
        <?php 
          $query = "SELECT cat_name,cat_id FROM categories ";
          $res = mysqli_query($conn,$query);
          while($data = mysqli_fetch_assoc($res)){
            $innerHTML = $data["cat_name"];
            $id = $data["cat_id"];
            $to = <<<EOF
              <div
                id = '$id'
                onclick='window.location.replace("http:categories.php?cat_name="+this.innerHTML+"&cat_id="+this.id)'
                class='categoriesMenuItems'>
                $innerHTML
                </div>
            EOF;
            echo $to;
          }
        ?>
      </div>
    </header>
    
    <section style = "display:none" class="phpVariablesForJs"><span id="session_signed_in"><?php echo ($_SESSION["signed_in"])? "true":"" ?></span></section>
    <?php
    if($_SESSION["isTopicCreated"]){
      echo '<div class="isTopicCreated">Topic created Successfully</div>';
      unset($_SESSION["isTopicCreated"]);
      echo $_SESSION["isTopicCreated"];
    }
      ?>
      
    <div class="bodyWrapper">
      <section class="titles_and_buttons">
        <div class="titles">
          <div class="title_latest">
            <a href="latest.php">LATEST TOPICS</a>
          </div> <!-- This are links or Buttons that trigger the behaviour-->
          <!-- <div class="title_popular">
            <a href="popular.php">POPULAR</a>
          </div> --><!-- of the category display or links to specific pages where -->
        </div>
        <div class="new_topic_button">
          <i class="fas fa-plus"></i> NEW TOPIC
        </div>
      </section>
      <section class="newTopic">
        <span class="closeNewTopic"><i class="fas fa-angle-double-up"></i></span>
        <p class="info_about_topic"><span class="pin">
        Welcome to Crimeline Forum —
        thanks for starting a new conversation!
<!-- Does the title sound interesting if you read it out loud? Is it a good summary?
Who would be interested in this? Why does it matter? What kind of responses do you want?
Include commonly used words in your topic so others can find it. To group your topic with related topics, select a category. -->
For more, see our <a href="Guideline.html" target="_blank">community guidelines</a>.
</span></p>
        <form action="create_topic.php" method="post">
          <fieldset>
            <input type="text" name="topicName" id="topicName" placeholder="Topic Title . . ." required>
            <!-- For $i=0 ; $i < numberOfCategories ; $i++ echo Category $i -->
            <div id="choseCategory" class="choseCategory">Select a Category <i class="fas fa-angle-down"></i></div>
            <div class="createCategoryCategories">
            <?php
            $indexCounter = 1;
$things = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($things)) {
    echo "<input class='input_radio' type='radio' name='createCategoryCategory' value='".$data["cat_name"]."' id='createCategoryCategory$indexCounter' required >
              <label class='radio_label' for='createCategoryCategory$indexCounter'>" . $data["cat_name"] . "</label>";
    $indexCounter++;}
    

            
            ?>
            
            </div>
          </fieldset>
          <textarea required placeholder="Type your first post on this topic..." name="topicContent" id="#topicContent" cols="30" rows="10"></textarea>
          <div class="createTopicSubmit" style="position: relative;">
          
            <input disabled name="submitCreateTopic" type="submit" value=" Proceed">
            <span class="ifDisabled">Select a category to enable this button</span>
            
          </div>
        </form>

      </section>
