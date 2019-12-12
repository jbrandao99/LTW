<?php function draw_profile() { 
    include_once('../includes/session.php');
    include_once('../database/db_user.php');

    $user = getUser($_SESSION['username']);
/**
 * Draws the signup section.
 */ ?>
  <section class="profile">

    <header><h2>Edit Profile</h2></header>

    <form method="post" action="../actions/action_profile.php">
      <img src="../images/users/<?php echo $user['profilePicture']; ?>" onclick="pictureClick()" id="profileDisplay"/>
      <label for="profilePicture">Profile Picture</label>
      <input type="file" name="profilePicture" onchange="displayImage(this)" id="profilePicture" style="display:none;">
      <input type="password" name="password" placeholder="password" required>
      <input type="text" name="username" placeholder="new username" required>
      <input type="password" name="newpassword" placeholder="new password" required>
      <input type="submit" value="Change">
    </form>

  </section>

  <script src="../javascript/profilePicture.js"></script>
<?php } ?>