<?php function draw_contact() { 
/**
 * Draws the contact section.
 */ ?>
  <section class="contact">
    
    <header><h2>Contact Us</h2></header>

    <form method="post" action="../actions/action_contact.php">
      <input type="text" name="name" placeholder="full name" required>
      <input type="email" name="email" placeholder="email address" required>
      <textarea name="subject" placeholder="write something" required></textarea>
      <input type="submit" value="Submit">
    </form>

  </section>
<?php } ?>