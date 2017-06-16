<?php

// Link to contract
$contract	= '<a href="'. App::uri('a/dummy-file.pdf') .'" target="_blank" alt="agreement">';
$contract2	= '</a>';

echo __('We offer flexible rental pricing to fit your rental needs. See our table for our rates.');
?>

<div class="table">
	<div>
		<div class="col accent"><?php echo __('Rental duration'); ?></div>
		<div class="col accent"><?php echo __('Price'); ?></div>
		<div class="clr"></div>
	</div>
	
	<div>
		<div class="col"><?php echo sprintf(__('%d Days'), 3); ?></div>
		<div class="col"><?php echo PRICE_1; ?></div>
		<div class="clr"></div>
	</div>
	
	<div>
		<div class="col"><?php echo sprintf(__('%d Days'), 7); ?></div>
		<div class="col"><?php echo PRICE_2; ?></div>
		<div class="clr"></div>
	</div>
	
	<div>
		<div class="col"><?php echo sprintf(__('%d Days'), 14); ?></div>
		<div class="col"><?php echo PRICE_3; ?></div>
		<div class="clr"></div>
	</div>
</div>
* <?php echo sprintf(__('We require a deposit of 200$, or half the full rental amount, whichever is higher.'), MIN_DEPOSIT); ?><br />
* <?php echo sprintf(__('A late fee of %s will be charged per day.'), LATE_FEE); ?><br />
* <?php echo sprintf(__('Note that we define a day as 24 hours.'), $contract, $contract2); ?>
