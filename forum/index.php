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
    <link rel="stylesheet" href="style.css" />
    <title>Crimeline | Community</title>
  </head>
  <body>
    <header>
      <div class="leftpart">
        <div class="logo_container">
          <img src="logo.png" alt="crimeline_logo" srcset="" />
        </div>
        <h2>Community</h2>
        <h3><a href="/Binary-Beasts"><i class="fas fa-arrow-left"></i></a></h3>
      </div>
      <ul>
        <li><i class="fa fa-search" aria-hidden="true"></i></li>
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
      <div class="categoriesMenu">
        <span id="categoriesMenuQuit">X</span>
        <!-- For $i=0 ; $i < numberOfCategories ; $i++ echo Category $i -->
        <?php 
          $query = "SELECT cat_name FROM categories ";
          $res = mysqli_query($conn,$query);
          
        ?>
      </div>
    </header>
    <div class="bodyWrapper">
      <section class="titles_and_buttons">
        <div class="titles">
          <div class="title_latest">
            <a href="latest.php">LATEST</a>
          </div> <!-- This are links or Buttons that trigger the behaviour-->
          <div class="title_popular">
            <a href="popular.php">POPULAR</a>
          </div><!-- of the category display or links to specific pages where -->
          <div class="title_categories">
            <a href="categories.php">CATEGORIES</a>
          </div><!--  appropriate Sql code is ran to retrieve data -->
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
            while ($data = mysqli_fetch_assoc($res)) {

              echo "<input class='input_radio' type='radio' name='createCategoryCategory' id='createCategoryCategory$indexCounter' required >
              <label class='radio_label' for='createCategoryCategory$indexCounter'>".$data["cat_name"]."</label>";
              $indexCounter++;
            }
            ?>
              <!--
              <input class="input_radio" type="radio" name="createCategoryCategory" id="createCategoryCategory2">
              <label class="radio_label" for="createCategoryCategory2">Temporary Data for Category 2</label>
              <input class="input_radio" type="radio" name="createCategoryCategory" id="createCategoryCategory3">
              <label class="radio_label" for="createCategoryCategory3">Temporary Data for Category 3</label>
              <input class="input_radio" type="radio" name="createCategoryCategory" id="createCategoryCategory4">
              <label class="radio_label" for="createCategoryCategory4">Temporary Data for Category 4</label> -->
            </div>
          </fieldset>
          <textarea required placeholder="Type your first post on this topic..." name="topicContent" id="#topicContent" cols="30" rows="10"></textarea>
          <div class="createTopicSubmit" style="position: relative;">
            <input name="submitCreateTopic" type="submit" value=" + Create Topic">
            <span class="ifDisabled">Select a category to enable this button</span>
          </div>
        </form>

      </section>

<!-- -------------------------------------------------------------POTENTIAL HEADER ------------------------------------------------- -->


      <section class="table">
        <table>
          <thead>
            <tr>
              <th>Topic</th>
              <!-- name of the topic -->
              <th>Category</th>
              <!-- topic's category -->
              <th>Users</th>
              <!-- Number of users having this specific topic ID -->
              <th>Replies</th>
              <!-- NUmber of replies -->
              <th>Last activity</th>
              <!-- Last post or reply under this topic -->
            </tr>
          </thead>
<?php

$evenRows = '<tr class="rowData">';
$oddRows = '<tr class="rowData odd">';
$html = <<<EOF
  <td>Fake data of a topic name</td>
  <td>Fake data of a category</td>
  <td id="tableDataUsers">
    <i class="fa fa-user-circle" aria-hidden="true"></i
    ><i class="fa fa-user-circle" aria-hidden="true"></i
    ><i class="fa fa-user-circle" aria-hidden="true"></i>
    <span id="plusNumbers">+87</span>
  </td>
  <!--3 avatars plus # of users -->
  <td>112</td>
  <!-- # of replies in this specific topic -->
  <td>6h</td>
  <!-- = Date.now() minus Date of last post -->
</tr>
EOF;
for ($i = 0; $i < 10; $i++) {
    if ($i % 2 == 0) {
        echo $oddRows . $html;
    } else {
        echo $evenRows . $html;
    }
}
?>
        </table>
      </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="forum.js"></script>
  </body>
</html>
