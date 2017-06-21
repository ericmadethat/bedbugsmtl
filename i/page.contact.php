<?php

echo __('Please feel free to contact us if you have any questions. It will be our pleasure to help.');
?>

<div class="half details big">
</div>

<form class="contact-form" action="https://formspree.io/malikandpierce@gmail.com"
      method="POST">
    <input type="text" name="name" placeholder="<?php echo __('your name'); ?>" required>
    <input type="email" name="_replyto" placeholder="<?php echo __('your email'); ?>" required>
    <textarea name="msg" placeholder="<?php echo __('your message'); ?>" required></textarea>
    <input type="submit" value="<?php echo __('send'); ?>" class="submit-btn">
</form>
<div class="clr"></div>
