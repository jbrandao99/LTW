<?php function draw_login()
{
    /**
     * Draws the login section.
     */ ?>

<title>Login</title>
  <section class="login">
    
    <header><h2>Welcome Back</h2></header>

    <form method="post" action="../actions/action_login.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="submit" value="Login">
    </form>

    <footer>
      <p>Don't have an account? <a href="signup.php">Signup!</a></p>
    </footer>

  </section>
<?php
} ?>

<?php function draw_signup()
    {
        /**
         * Draws the signup section.
         */ ?>

<title>Sign Up</title>
  <section class="signup">

    <header><h2>New Account</h2></header>

    <form method="post" action="../actions/action_signup.php" enctype="multipart/form-data">
      <img src="../images/site/placeholder.jpg" onclick="pictureClick()" id="profileDisplay"/>
      <label for="profilePicture">Profile Picture</label>
      <input type="file" name="profilePicture" onchange="displayImage(this)" id="profilePicture" style="display:none;">
      <input type="text" name="name" placeholder="full name" required>
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <input type="email" name="email" placeholder="email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
      <input type="submit" value="Signup">
    </form>

    <footer>
      <p>Already have an account? <a href="login.php">Login!</a></p>
    </footer>

  </section>

  <script src="../javascript/pictures.js"></script>
<?php
    } ?>
