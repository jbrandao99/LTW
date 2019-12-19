<?php function draw_contact()
{
    /**
     * Draws the contact section.
     */ ?>
     <title>Contact Us</title>
  <section class="contact">
     <title>Contact Us</title>

    <header><h2>Contact Us</h2></header>

    <form method="post" action="../actions/action_contact.php">
      <input type="text" name="name" placeholder="full name" required>
      <input type="email" name="email" placeholder="email address" required>
      <input type="text" name="subject" placeholder="subject" required>
      <textarea name="message" placeholder="write something" required></textarea>
      <input type="submit" value="submit">
    </form>

  </section>
<?php
} ?>
