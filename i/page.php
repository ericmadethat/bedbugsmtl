<?php defined('ETITE') or die;

// Credits
$Eric	= '<a href="http://ericdesigns.ca" target="_blank">EricDesigns</a>';
$Francis	= '<a href="http://francisamankrah.com" target="_blank">Francis Amankrah</a>';

?>
<!DOCTYPE html>
<html lang="<?php echo App::$lang; ?>">
<?php

	// HTML Head
	App::inc('page.head.php');

?>
<body>
<nav>
	<div class="w">
		<div class="logo"></div>
		<ul id="nav">
			<li><a href="#about" class="current"><?php echo __('About'); ?></a></li>
			<li><a href="#rates"><?php echo __('Rates'); ?></a></li>
			<li><a href="#contact"><?php echo __('Contact'); ?></a></li>
			<li><a href="#faq"><?php echo __('FAQ'); ?></a></li>
		</ul>
		<div id="switcher"><?php echo Lang::switcher(); ?></div>
		<div class="clr"></div>
	</div>
</nav>

<section id="about">
<a name="about"></a>
<div class="w">

	<h1><?php echo __('Rent a Packtite. Rid your stuff from the bug.'); ?></h1>

	<div class="w packtite <?php echo App::$lang; ?>"></div>

	<h1 class="center"><?php echo __('Protect your items'); ?></h1>

	<?php echo __('With the Packtite Closet, you can heat-treat and save your items from any hidden bed bugs.'); ?>
	<?php echo __('These monsters can hide anywhere.'); ?>
	<br /><br />

	<?php echo __('The Packtite Closet is a heat-treatment machine.'); ?>
	<br /><br />

	<h1 class="center">Who is this for?</h1>
	
	<div class="for-wrap">

		<?php if(APP::$lang == "en") : ?>
			<ul>
				<li>
					<b>Movers: </b>Make sure the bugs won't follow you to a new place.
				</li>
				<li>
					<b>Landlords: </b>Rent the packtite for your infested building to help with treatments.
				</li>
				<li>
					<b>Exterminators: </b>Help supplement your treatments.
				</li>
			</ul>
		<?php else : ?>
			<ul>
				<li>
					<b>Déménageurs: </b>Assurez vous que les punaises ne vous suivent pas.
				</li>
				<li>
					<b>Propriétaires: </b>Louez la machine pour votre édifice infesté.
				</li>
				<li>
					<b>Exterminateurs: </b>Ajouter la machine à votre plan de traitement.
				</li>
			</ul>
		<?php endif; ?>
	</div>

</div>
</section>

<section id="rates">
<a name="rates"></a>
<div class="w">

	<h1><?php echo __('Rates'); ?></h1>
<?php

	// Rates page
	App::inc('page.rates.php');

?>
</div>
</section>

<section id="contact">
<a name="contact"></a>
<div class="w">
	<h1><?php echo __('Contact'); ?></h1>
<?php

	// Contact page
	App::inc('page.contact.php');

?>
</div>
</section>

<section id="faq">
<a name="faq"></a>
<div class="w">

	<h1><?php echo __('FAQ'); ?></h1>
<?php

	// FAQ page
	App::inc('page.faq.php');

	// Promos
?>
	<h1><?php echo __('Promos'); ?></h1>
	<?php echo sprintf(__('Refer to us a paying customer, and we will give you a %s cashback.'), PROMO); ?>

</div>
</section>

<footer>
<div class="w">
	<?php echo '&copy; '. date('Y') .'. '. __('All Rights Reserved.'); ?><br />
	<?php echo __('Attribution notice'); ?>
</div>
</footer>

<?php
// Only add smoothscroll if not on Windows Phone
if (strpos($_SERVER['HTTP_USER_AGENT'], 'IEMobile') === false || true):
?>

<script type="text/javascript">
/*
 * All credits to Nick Salloum
 * http://www.callmenick.com/labs/single-page-site-with-smooth-scrolling-highlighted-link-and-fixed-navigation
 */
$(document).ready(function()
{
	if (window.location.hash && window.location.hash.length && $(window.location.hash))
		window.scrollBy(0, $(window.location.hash).offset().top - 90);

	$('#nav a, #faq h4 a').click(function(e) {
		e.preventDefault();
		$('html,body').scrollTo(this.hash, this.hash, {offset : -90});
	});

	$('#faq ol a').click(function(e) {
		e.preventDefault();
		$('html,body').scrollTo(this.hash, this.hash, {offset : -75});
	});

	var aChildren = $('#nav li').children();
	var aArray = [];
	for (var i=0; i < aChildren.length; i++) {
		var aChild = aChildren[i];
		var ahref = $(aChild).attr('href');
		aArray.push(ahref);
	}

	$(window).scroll(function() {
		var windowPos = $(window).scrollTop();
		var windowHeight = $(window).height();
		var docHeight = $(document).height();

		for (var i=0; i < aArray.length; i++) {
			var theID = aArray[i];
			var divPos = $(theID).offset().top - 95;
			var divHeight = $(theID).height();
			if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
				$("a[href='" + theID + "']").addClass('current');
			} else {
				$("a[href='" + theID + "']").removeClass('current');
			}
		}

		if (windowPos + windowHeight == docHeight) {
			if (!$('#nav li:last-child a').hasClass('current')) {
				var navActiveCurrent = $('.current').attr("href");
				$("a[href='" + navActiveCurrent + "']").removeClass('current');
				$("nav li:last-child a").addClass('current');
			}
		}
	});
});
</script>

<?php endif; ?>

</body>
</html>
