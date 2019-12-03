<?php function draw_profile() { 
/**
 * Draws the signup section.
 */ ?>
  <section class="profile">

    <header><h2>Edit Profile</h2></header>

    <!--PLACE PROFILE PHOTO -->

    <form method="post" action="../actions/action_profile.php">
      <input type="file" name="profile_photo" placeholder="Photo" required="" capture>
      <input type="text" name="name" placeholder="full name" required>
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="email" name="email" placeholder="email address" required>
      <input type="submit" value="Save">
    </form>

  </section>
<?php } ?>