<?php





/**





 * 





 */











?>











<?php











	$swf = get_field('ssa_faq_switcher');











	if ($swf) :





		$json_ld = [


		  "@context" => "https://schema.org",


		  "@type" => "FAQPage",


		  "mainEntity" => []


		];








?>











	<div class="ssa-faq">





		<div class="ssa-faq__inner">





			<h2 class="ssa-faq__title">





				<?php the_field('ssa_faq_header'); ?>





			</h2>





				<ul class="ssa-faq__questions">





					<?php





						while ( have_rows('ssa_faq_questions') ) : the_row();





				 			$mainEntity = [


						      '@type'=> 'Question',


						      'name'=> get_sub_field('ssa_faq_question'),


						      'acceptedAnswer'=> [


						        '@type'=> "Answer",


						        'text'=> get_sub_field('ssa_faq_answer')


						      ]


						    ];





						    array_push($json_ld['mainEntity'], $mainEntity);





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





	<script type="application/ld+json">


		<?php echo json_encode($json_ld); ?>


	</script>





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