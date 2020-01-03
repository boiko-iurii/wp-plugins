<?php
/**
 * 
 */

?>

<?php

	$swf = get_field('ssa_faq_switcher');

	if ($swf) :

?>

	<div class="ssa-faq">
		<div class="ssa-faq__inner">
			<div class="ssa-faq__title">
				<?php the_field('ssa_faq_header'); ?>
			</div>
				<ul class="ssa-faq__questions">
				
					<?php
						while ( have_rows('ssa_faq_questions') ) : the_row();
							?>

									<li class="ssa-faq__item">
										<div class="ssa-faq__question">
												<?php the_sub_field('ssa_faq_question'); ?>
										</div>
										<div class="ssa-faq__answer">
												<?php the_sub_field('ssa_faq_answer'); ?>
										</div>
									</li>

							<?php
						endwhile;
					?>

			</ul>
		</div>
	</div>

	<?php
		$options = get_option( 'ssa_options' );
		$arrow_color = $options['faq_arrow_color'];
	?>
	<style>
		.ssa-faq__question:after {
			border-left-color: <?php echo $arrow_color ?>;
			border-bottom-color: <?php echo $arrow_color ?>;
		}
	</style>

<?php
	endif;
?>