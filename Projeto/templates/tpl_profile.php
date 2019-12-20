<?php function draw_profile()
{
    include_once('../includes/session.php');
    include_once('../database/db_user.php');

    $user = getUser($_SESSION['username']);
    /**
     * Draws the signup section.
     */ ?>
     <title>Edit Profile</title>

  <section class="profile">

    <header><h2>Edit Profile</h2></header>

    <form method="post" action="../actions/action_profile.php" enctype="multipart/form-data">
      <img src="../images/users/<?php echo $user['profilePicture']; ?>" onclick="pictureClick()" id="profileDisplay"/>
      <label for="profilePicture">Profile Picture</label>
      <input type="file" name="profilePicture" onchange="displayImage(this)" id="profilePicture" accept = "image/jpeg" style = "display:none;">
      <input type="password" name="password" placeholder="password" required>
      <input type="text" name="newusername" placeholder="new username">
      <input type="password" name="newpassword" placeholder="new password">
      <input type="submit" value="Change">
    </form>

  </section>

  <script src="../javascript/pictures.js"></script>
<?php
} ?>