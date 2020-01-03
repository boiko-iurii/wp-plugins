<?php
/**
 * 
 */

?>

<?php

	$sw = get_field('site_audit_switcher');

	if ($sw) :

?>

	<div class="site-audit">
		<div class="site-audit__inner">
			<div class="site-audit__text">
				<div class="site-audit__title">
					<?php the_field('site_audit_header'); ?>
				</div>
				<div class="site-audit__description">
					<?php the_field('site_audit_description'); ?>
				</div>
			</div>
			<div class="site-audit__img">
				<img src="<?php the_field('site_audit_img'); ?>" alt="">
			</div>
		</div>
	</div>

	

<?php
	endif;
?>