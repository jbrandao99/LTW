<?php function draw_profile() { 
/**
 * Draws the signup section.
 */ ?>
  <section class="profile">

    <header><h2>Change Password</h2></header>

    <form method="post" action="../actions/action_profile.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="password" name="newpassword" placeholder="new password" required>
      <input type="submit" value="Change">
    </form>

  </section>
<?php } ?>