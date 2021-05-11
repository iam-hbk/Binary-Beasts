<?php include "header.php"?>
  <div class="signUp-signIn" id="signUp-signIn">
    <!-- Zandz's code -->
    <div id="login_form" class="login-page">
      <div class="box-login">
        <span style="text-align: right" id="quit">X</span>
        <div class="button-box">
          <div id="move_button"></div>

          <button type="button" onclick="login()" class="top_button" id="f1">
            Sign In
          </button>

          <button type="button" onclick="signup()" class="top_button" id="s2">
            Sign Up
          </button>
        </div>

        <div>
          <!--Login Information form-->
          <form id="login" class="login_detail_line">
            <input
              type="text"
              class="user_input"
              placeholder="Email"
              required
            />
            <br />
            <input
              type="password"
              class="user_input"
              placeholder="Password"
              required
            />

            <br />
            <br />
            <br />
            <br />
            <button type="submit" id="BUTTON_">Sign In</button>
          </form>
        </div>

        <div>
          <!--Register Information form-->
          <form id="signup" class="register_detail_line">
            <input
              type="text"
              class="user_input"
              placeholder="Name"
              required
            />
            <input
              type="text"
              class="user_input"
              placeholder="Create a username "
              required
            />
            <input
              type="email"
              class="user_input"
              placeholder="Email"
              required
            />
            <input
              type="password"
              class="user_input"
              placeholder="Password"
              required
            />
            <input
              type="password"
              class="user_input"
              placeholder="Confirm Password"
              required
            />

            <br />
            <br />
            <br />
            <br />
            <button type="submit" id="BUTTON_">SIGN UP</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Zandz's code -->
  </div>

  <section class="section1">
    <div class="info">
      <h1 id="crimeline">crime-line</h1>
      <p>
        We empower people to speak up and make a difference We want to assure
        you that you are not alone and that there are people who want to help,
        just let us know what you need and we will link you to trained
        professionals who are willing to listen and lend you a helping hand.
      </p>
    </div>
    <div class="img">
      <img src="images/logo-removebg-preview.png" alt="" />
    </div>
  </section>
  <section class="section2">
    <div class="img">
      <img src="images/hotline2.jpg" alt="" />
    </div>
    <div class="info">
      <h1>Hot-lines</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias error
        atque ut impedit sit nesciunt quaerat ipsam at. Excepturi, corrupti
        quidem voluptate error id blanditiis repellat asperiores a optio
        laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Officiis consectetur, sed dignissimos expedita corporis ex ratione.
        Velit ipsum pariatur quis porro culpa totam quod repudiandae. Vitae
        nesciunt similique quas maxime!
      </p>
      <span class="button" id="toWhistle"
        ><a href="#whistle">Call Now !</a></span
      >
    </div>
  </section>
  <section class="section2">
    <div class="info">
      <h1>Forum</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias error
        atque ut impedit sit nesciunt quaerat ipsam at. Excepturi, corrupti
        quidem voluptate error id blanditiis repellat asperiores a optio
        laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Officiis consectetur, sed dignissimos expedita corporis ex ratione.
        Velit ipsum pariatur quis porro culpa totam quod repudiandae. Vitae
        nesciunt similique quas maxime!
      </p>
      <span class="button" id="toForum"><a href="#forum">see Forum</a></span>
    </div>
    <div class="img">
      <img src="images/forum.jpg" />
    </div>
  </section>
  <section class="section1">
    <div class="img">
      <img src="images/gethelp.png" alt="" />
    </div>
    <div class="info">
      <h1>Get Help</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias error
        atque ut impedit sit nesciunt quaerat ipsam at. Excepturi, corrupti
        quidem voluptate error id blanditiis repellat asperiores a optio
        laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Officiis consectetur, sed dignissimos expedita corporis ex ratione.
        Velit ipsum pariatur quis porro culpa totam quod repudiandae. Vitae
        nesciunt similique quas maxime!
      </p>
      <span class="button" id="toGetHelp"
        ><a href="#getHelp">Get Help</a></span
      >
    </div>
  </section>
  <section class="section2">
    <div class="info">
      <h1>Statistics</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias error
        atque ut impedit sit nesciunt quaerat ipsam at. Excepturi, corrupti
        quidem voluptate error id blanditiis repellat asperiores a optio
        laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Officiis consectetur, sed dignissimos expedita corporis ex ratione.
        Velit ipsum pariatur quis porro culpa totam quod repudiandae. Vitae
        nesciunt similique quas maxime!
      </p>
      <form action="" me></form>
      <span class="button" id="toStats"
        ><a href="#stats">check out stats</a></span
      >
    </div>
    <div class="img">
      <img
        src="images/statsb.png"
        style="filter: contrast(2); width: 400px; transform: scale(2)"
        alt=""
      />
    </div>
</section>
<?php include "footer.php"?>