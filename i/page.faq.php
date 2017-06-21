<?php

// Packtite instruction manual
$inst	= '<a href="'. u('a/dummy-file.pdf') .'" target="_blank" alt="Packtite Instructions Manual">';
$a	= '</a>';

// Rental contract
$contract	= '<a href="'. u('a/dummy-file.pdf') .'" target="_blank" alt="Rental Contract">';

// BedBuggers forum: What to expect article
$article	= '<a href="http://bedbugger.com/2007/01/20/faq-think-you-have-bed-bugs-some-dos-and-donts/" target="_blank" rel="nofollow">';
?>
<ol>
	<li>
		<a href="#faq1">
			<?php echo __('How does the rental process work?'); ?>
		</a>
	</li>
	<li>
		<a href="#faq2">
			<?php echo __('How do I assemble the Packtite Closet?'); ?>
		</a>
	</li>
	<li>
		<a href="#faq3">
			<?php echo __('How long do I have to run the machine for?'); ?>
		</a>
	</li>
	<li>
		<a href="#faq4">
			<?php echo __('When do I have to return the Packtite Closet?'); ?>
		</a>
	</li>
	<li>
		<a href="#faq5">
			<?php echo __('Can the Packtite Closet treat my infested home?'); ?>
		</a>
	</li>
	<li>
		<a href="#faq6">
			<?php echo __('Where can I learn more about how to deal with bed bugs?'); ?>
		</a>
	</li>
</ol>

<a name="faq1" id="faq1"></a>
<h4>
	1. <?php echo __('How does the rental process work?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo __('Answer to How does the rental process work?'); ?>
<br /><br />

<a name="faq2" id="faq2"></a>
<h4>
	2. <?php echo __('How do I assemble the Packtite Closet?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo __('The Packtite Closet includes:'); ?>
<ul>
	<li><?php echo __('The closet itself'); ?></li>
	<li><?php echo __('An internal metal frame'); ?></li>
	<li><?php echo __('A blower-heater combo'); ?></li>
	<li><?php echo __('A Thermometer'); ?></li>
	<li><?php echo __('A timer'); ?></li>
</ul>
<?php echo __('Answer to How do I assemble the Packtite Closet?'); ?>
<br /><br />
<div class="video">
	<iframe width="560" height="315" src="//www.youtube.com/embed/ipDJiTTwfv0?showinfo=0&hd=1" frameborder="0" allowfullscreen></iframe>
</div>
<!-- <video poster="<?php echo u('a/tite-video.still.png'); ?>" controls class="w">
	<source src="<?php echo u('a/tite-video.webm'); ?>" type='video/webm; codecs="vp8, vorbis"' />
	<source src="<?php echo u('a/tite-video.mp4'); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
	&rarr; <a href="http://www.youtube.com/watch?v=ipDJiTTwfv0">Video</a>.
</video> -->

<br /><br />
<!-- <?php echo sprintf(__('Click here to download the official Packtite Closet instructions manual.'), $inst, $a); ?> -->
<br /><br />

<a name="faq3" id="faq3"></a>
<h4>
	3. <?php echo __('How long do I have to run the machine for?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo __('Answer to How long do I have to run the machine for?'); ?>
<br /><br />

<a name="faq4" id="faq4"></a>
<h4>
	4. <?php echo __('When do I have to return the Packtite Closet?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo sprintf(__('Answer to When do I have to return the Packtite Closet?'), $contract, $a); ?>
<br /><br />

<a name="faq5" id="faq5"></a>
<h4>
	5. <?php echo __('Can the Packtite Closet treat my infested home?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo __('Answer to Can the Packtite Closet treat my infested home?'); ?>
<br /><br />

<a name="faq6" id="faq6"></a>
<h4>
	6. <?php echo __('Where can I learn more about how to deal with bed bugs?'); ?>
	<a href="#faq" title="<?php echo __('Back to FAQ'); ?>">&uarr;</a>
</h4>
<?php echo sprintf(__('Answer to Where can I learn more about how to deal with bed bugs?'), $article, $a); ?>
