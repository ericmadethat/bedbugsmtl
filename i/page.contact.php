<?php

echo __('Please feel free to contact us if you have any questions. It will be our pleasure to help!');
?>

<div class="half details big">
	<span>Tel: <a href="tel:438-388-1026">438-388-1026</a></span>
	<!-- <span><a href="mailto:info@bedbugsmtl.com">info@bedbugsmtl.com</a></span> -->
</div>

<?php
// Email sent
if (App::$mail):
	$success	= __('Your message was received. Thank you for contacting us!');
	$fail		= __('Your message could not be sent. Please use our contact information to get in touch with us.');
?>
<div class="half rlybig">
	<div class="thx"><?php echo (App::$mail == 1) ? $success : $fail; ?></div>
</div>
<?php
// Display form
else:
?>
<form class="half" action="" method="post">
	<input type="text" name="name" placeholder="<?php echo __('your name'); ?>" required />
	<input type="email" name="email" placeholder="<?php echo __('your email'); ?>" required />
	<input type="tel" name="phone" placeholder="<?php echo __('your phone number'); ?>" required />
	<textarea name="msg" placeholder="<?php echo __('your message'); ?>" required></textarea>
	<input type="submit" value="<?php echo __('send'); ?>" />
	<input type="hidden" name="lang" value="<?php echo App::$lang; ?>" />
	<input type="hidden" name="<?php echo App::$id; ?>" value="1" />
	<div class="clr"></div>
</form>
<?php
endif;
?>

<div class="clr"></div>
